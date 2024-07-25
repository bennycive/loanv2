<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Lib\FormProcessor;
use App\Models\AdminNotification;
use App\Models\Category;
use App\Models\Loan;
use App\Models\Installment;
use App\Models\LoanPlan;
use App\Models\Transaction;
use App\Models\GatewayCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Rules\PhoneValidator;


class LoanController extends Controller
{
    public function list()
    {
        $pageTitle = 'My Loans';
        $loans     = Loan::where('user_id', auth()->id())->with('nextInstallment')->with('plan')->searchable(['loan_number'])->filter(['status'])->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.loan.list', compact('pageTitle', 'loans'));
    }

    public function plans()
    {
        $pageTitle = 'Loan Plans';
        $categories = Category::where('Status', Status::ENABLE)->with('plans')->whereHas('plans', function ($query) {
            $query->where('status', Status::ENABLE);
        })->latest()->get();
        return view($this->activeTemplate . 'user.loan.plans', compact('pageTitle', 'categories'));
    }

    public function applyLoan(Request $request, $id)
    {
        $plan = LoanPlan::active()->findOrFail($id);
        $request->validate(['amount' => "required|numeric|min:$plan->minimum_amount|max:$plan->maximum_amount"]);
        session()->put('loan', ['plan' => $plan, 'amount' => $request->amount]);
        return to_route('user.loan.apply.form');
    }

    public function loanPreview()
    {
        $loan = session('loan');
        if (!$loan) {
            return to_route('user.loan.plans');
        }
        $plan      = $loan['plan'];
        $amount    = $loan['amount'];
        $pageTitle = 'Apply For Loan';
        return view($this->activeTemplate . 'user.loan.form', compact('pageTitle', 'plan', 'amount'));
    }

    
    public function confirm(Request $request)
    {
        $loan = session('loan');
        if (!$loan) {
            return to_route('user.loan.plans');
        }
        $plan = $loan['plan'];
        $amount = $loan['amount'];
        $user = auth()->user();

        $percentCharge = $amount * $plan->application_percent_charge / 100;
        $applicationFee = $plan->application_fixed_charge + $percentCharge;

        if ($applicationFee > $user->balance) {
            $notify[] = ['error', 'Insufficient balance. You have to pay the application fee.'];
            return back()->withNotify($notify)->withInput($request->all());
        }

        $plan = LoanPlan::active()->with('category')->where('id', $plan->id)->firstOrFail();

        $formData = $plan->form->form_data;
        $formProcessor = new FormProcessor();
        $validationRule = $formProcessor->valueValidation($formData);
        $request->validate($validationRule);
        $applicationForm = $formProcessor->processFormData($request, $formData);

        $perInstallment = $amount * $plan->per_installment / 100;

        $percentCharge = $plan->per_installment * $plan->percent_charge / 100;
        $charge = $plan->fixed_charge + $percentCharge;

        $user->balance -= $applicationFee;
        $user->save();

        $applicationTrx = getTrx();

        $loan = new Loan();
        $loan->loan_number = $applicationTrx;
        $loan->user_id = $user->id;
        $loan->plan_id = $plan->id;
        $loan->amount = $amount;
        $loan->per_installment = $perInstallment;
        $loan->installment_interval = $plan->installment_interval;
        $loan->delay_value = $plan->delay_value;
        $loan->charge_per_installment = $charge;
        $loan->total_installment = $plan->total_installment; // Set total_installment before calculating payable_amount
        $loan->payable_amount = $loan->per_installment * $loan->total_installment; // Now this will work correctly
        $loan->application_form = $applicationForm;
        $loan->save();

        //transaction
        $general = gs();
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = $applicationFee;
        $transaction->post_balance = $user->balance;
        $transaction->charge = 0;
        $transaction->trx_type = '-';
        $transaction->details = $general->cur_sym . showAmount($amount) . ' ' . 'Charged for application fee ' . $plan->name;
        $transaction->trx = $applicationTrx;
        $transaction->remark = 'application_fee';
        $transaction->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New loan request';
        $adminNotification->click_url = urlPath('admin.loan.index') . '?search=' . $loan->loan_number;
        $adminNotification->save();

        session()->forget('loan');

        $notify[] = ['success', 'Loan application submitted successfully'];
        return to_route('user.loan.list')->withNotify($notify);
    }





    public function installments($loanNumber)
    {
        $loan = Loan::where('loan_number', $loanNumber)->where('user_id', auth()->id())->firstOrFail();
        $installments = $loan->installments()->get();

        // Fetch charge_per_installment from the loan
        $chargePerInstallment = $loan->charge_per_installment;

        foreach ($installments as $installment) {

            $today = now();
            $installmentDate = \Carbon\Carbon::parse($installment->installment_date);
            $daysDiff = $installmentDate->diffInDays($today, false);

            if ($daysDiff > $loan->delay_value) {
                $multiplier = (int) floor($daysDiff / $loan->delay_value);
                $installment->delay_charge = $chargePerInstallment * $multiplier;
                $installment->save();
            }
        }

        $installments = $loan->installments()->paginate(getPaginate());
        $pageTitle = "Loan Installments";

        return view($this->activeTemplate . 'user.loan.installments', compact('pageTitle', 'installments', 'loan'));
    }


    //   FUNCTIONS TO RETURN THE INSTALLMENTS
    public function showReturnInstallmentsPage($installment_id)
    {
        $pageTitle = 'Return Installments';

        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', Status::ENABLE);
        })->with('method')->orderby('method_code')->get();

        // Retrieve the installment
        $installment = Installment::findOrFail($installment_id);
        // Check if the installment_date is valid for return (current date or previously)
        $currentDate = now()->format('Y-m-d');
        $installmentDate = $installment->installment_date;

        if ($installmentDate <= $currentDate) {
            // Valid return date, retrieve the loan
            $loan = Loan::findOrFail($installment->loan_id);

            // Calculate totalAmount
            $totalAmount = $loan->per_installment + $installment->delay_charge;


            // Return the view with the calculated totalAmount
            return view($this->activeTemplate . 'user.loan.return_installments', compact('pageTitle', 'gatewayCurrency', 'totalAmount', 'installment_id'));
        } else {
            // Invalid return date, handle accordingly (optional)
            return redirect()->back()->with('error', 'Installment cannot be returned as it is not due yet.', compact('pageTitle'));
        }
    }





    // public function returnInstallment(Request $request)
    // {
    //     // Retrieve the installment based on form input
    //     $installment_id = $request->input('installment_id');
    //     $installment = Installment::findOrFail($installment_id);

    //     // Retrieve associated loan
    //     $loan = Loan::findOrFail($installment->loan_id);

    //     // Define validation rules
    //     $validator = Validator::make($request->all(), [
    //         'amount' => 'required|numeric',
    //         'phone_number' => ['required', 'string', new PhoneValidator], // Assuming PhoneValidator is handled elsewhere
    //         'gateway' => 'required',
    //     ]);

    //     // Validate the form input
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $validatedData = $validator->validated();
    //     // Calculate the expected amount
    //     $expectedAmount = $loan->per_installment + $installment->delay_charge;

    //     // Check if the amount matches the expected amount
    //     if ($request->input('amount') != $expectedAmount) {
    //         return redirect()->back()->with('error', 'The amount does not match the required payment.');
    //     }

    //     // Check if the installment_date is valid for return (current date or previously)
    //     $currentDate = now()->format('Y-m-d');
    //     $installmentDate = $installment->installment_date;

    //     if ($installmentDate <= $currentDate) {
    //         // Valid return date, update the loan
    //         $loan->given_installment += $loan->installment_interval;
    //         $loan->delay_charge += $installment->delay_charge;
    //         $loan->paid_amount += $loan->per_installment;
    //         $loan->payable_amount -= $loan->per_installment;
    //         if (($loan->paid_amount == $loan->per_installment * $loan->total_installment) && ($loan->total_installment == $loan->given_installment)) {
    //             $loan->status = 2;
    //             $loan->save();
    //         } else {
    //             $loan->save();
    //         }

    //         // Update given_at field in the installment
    //         $installment->given_at = now();
    //         $installment->status = 'payed';
    //         $installment->save();

    //         // Transaction
    //         $user = auth()->user(); // Assuming the user is authenticated
    //         $user->save();

    //         $general = gs();
    //         $transaction = new Transaction();
    //         $transaction->user_id      = $user->id;
    //         $transaction->amount       = $loan->per_installment;
    //         $transaction->post_balance = $loan->paid_amount; // Post balance after deduction
    //         $transaction->charge       = 0;
    //         $transaction->trx_type     = '+';
    //         $transaction->details      = $general->cur_sym . showAmount($request->input('amount')) . ' ' . 'Installments ' . $loan->loan_number;
    //         // $transaction->trx          = uniqid(16); // Generate a unique transaction ID
    //         $transaction->trx = bin2hex(random_bytes(8)); // Generate a unique 16-character transaction ID
    //         $transaction->phone_number = $validatedData['phone_number'];
    //         $transaction->remark       = 'installments';
    //         $transaction->save();

    //         $adminNotification            = new AdminNotification();
    //         $adminNotification->user_id   = $user->id;
    //         $adminNotification->title     = 'New installments';
    //         $adminNotification->click_url = urlPath('admin.loan.index') . '?search=' . $loan->loan_number;
    //         $adminNotification->save();

    //         session()->forget('loan');

    //         $notify[] = ['success', 'Installment returned successfully'];
    //         // Redirect to the logs route with loan_number
    //         return redirect()->route('user.loan.instalment.logs', ['loan_number' => $loan->loan_number])->with('success', 'Installment returned successfully.');
    //     } else {
    //         // Invalid return date, handle accordingly (optional)
    //         return redirect()->back()->with('error', 'Installment cannot be returned as it is not due yet.');
    //     }
    // }



    public function returnInstallment(Request $request)
    {
        // Retrieve the installment based on form input
        $installment_id = $request->input('installment_id');
        $installment = Installment::findOrFail($installment_id);

        // Retrieve associated loan
        $loan = Loan::findOrFail($installment->loan_id);

        // Define validation rules
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'phone_number' => ['required', 'string', new PhoneValidator], // Assuming PhoneValidator is handled elsewhere
            'gateway' => 'required',
        ]);

        // Validate the form input
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        // Calculate the expected amount
        $expectedAmount = $loan->per_installment + $installment->delay_charge;

        // Check if the amount matches the expected amount
        if ($request->input('amount') != $expectedAmount) {
            return redirect()->back()->with('error', 'The amount does not match the required payment.');
        }

        // Check if the installment_date is valid for return (current date or previously)
        $currentDate = now()->format('Y-m-d');
        $installmentDate = $installment->installment_date;

        if ($installmentDate <= $currentDate) {
            // Valid return date, update the loan
            $loan->given_installment += $loan->installment_interval;
            $loan->delay_charge += $installment->delay_charge;
            $loan->paid_amount += $loan->per_installment;
            $loan->payable_amount -= $loan->per_installment;
            if (($loan->paid_amount == $loan->per_installment * $loan->total_installment) && ($loan->total_installment == $loan->given_installment)) {
                $loan->status = 2;
            }
            $loan->save();

            // Update given_at field in the installment
            $installment->given_at = now();
            $installment->status = 'payed';
            $installment->save();

            // Transaction for the installment
            $user = auth()->user(); // Assuming the user is authenticated
            $general = gs();

            // If there is a delay charge, create a separate transaction for it
            if ($installment->delay_charge > 0) 
            {
                 
                $delayChargeTransaction = new Transaction();
                $delayChargeTransaction->user_id = $user->id;
                $delayChargeTransaction->amount = $installment->delay_charge;
                $delayChargeTransaction->post_balance = $installment->delay_charge; // Assuming this is correct
                $delayChargeTransaction->charge = 0;
                $delayChargeTransaction->trx_type = '+';
                $delayChargeTransaction->details = $general->cur_sym . showAmount($installment->delay_charge) . ' ' . 'Installment penalty for loan ' . $loan->loan_number;
                $delayChargeTransaction->trx = bin2hex(random_bytes(8)); // Generate a unique 16-character transaction ID
                $delayChargeTransaction->phone_number = $validatedData['phone_number'];
                $delayChargeTransaction->remark = 'installment_penalty';
                $delayChargeTransaction->save();

            }

            // Main transaction for the installment payment
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $loan->per_installment;
            $transaction->post_balance = $loan->paid_amount; // Post balance after deduction
            $transaction->charge = 0;
            $transaction->trx_type = '+';
            $transaction->details = $general->cur_sym . showAmount($request->input('amount')) . ' ' . 'Installment payment for loan ' . $loan->loan_number;
            $transaction->trx = bin2hex(random_bytes(8)); // Generate a unique 16-character transaction ID
            $transaction->phone_number = $validatedData['phone_number'];
            $transaction->remark = 'installment_payment';
            $transaction->save();

            $adminNotification = new AdminNotification();
            $adminNotification->user_id = $user->id;
            $adminNotification->title = 'New installment payment';
            $adminNotification->click_url = urlPath('admin.loan.index') . '?search=' . $loan->loan_number;
            $adminNotification->save();

            session()->forget('loan');

            $notify[] = ['success', 'Installment returned successfully'];
            // Redirect to the logs route with loan_number
            return redirect()->route('user.loan.instalment.logs', ['loan_number' => $loan->loan_number])->with('success', 'Installment returned successfully.');
        } else {
            // Invalid return date, handle accordingly (optional)
            return redirect()->back()->with('error', 'Installment cannot be returned as it is not due yet.');
        }
    }


    
}
