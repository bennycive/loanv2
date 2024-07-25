<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NotificationLog;
use App\Models\Transaction;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Config;


class ReportController extends Controller
{
    // public function transaction(Request $request)
    // {
    //     $pageTitle = 'Transaction Logs';

    //     $remarks = Transaction::distinct('remark')->orderBy('remark')->get('remark');

    //     $transactions = Transaction::searchable(['trx', 'user:username'])->filter(['trx_type', 'remark'])->dateFilter()->orderBy('id', 'desc')->with('user')->paginate(getPaginate());

    //     return view('admin.reports.transactions', compact('pageTitle', 'transactions', 'remarks'));
    // }


    // FUNCTIONS TO FILTER THE REPORT 
    public function transaction(Request $request)
    {
        $pageTitle = 'Transaction Logs';

        // Start building query
        $query = Transaction::query();

        // Apply search filter (if username or trx is provided)
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->whereHas('user', function ($userQuery) use ($request) {
                    $userQuery->where('username', 'like', '%' . $request->input('search') . '%');
                })
                    ->orWhere('trx', 'like', '%' . $request->input('search') . '%');
            });
        }

        // Apply trx_type filter
        if ($request->filled('trx_type')) {
            $query->where('trx_type', $request->input('trx_type'));
        }

        // Apply remark filter
        if ($request->filled('remark')) {
            $query->where('remark', $request->input('remark'));
        }

        // Apply date range filter
        if ($request->filled('date')) {
            $dates = explode(' - ', $request->input('date'));
            $startDate = date('Y-m-d H:i:s', strtotime($dates[0]));
            $endDate = date('Y-m-d H:i:s', strtotime($dates[1] . ' 23:59:59'));
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Fetch transactions and paginate results
        $transactions = $query->with('user')->orderBy('id', 'desc')->paginate(10);

        // Calculate totals using the filtered transactions
        $totalDeposit = $query->where('trx_type', '+')->sum('amount');
        $totalWithdraw = $query->where('trx_type', '-')->sum('amount');
        $totalTransactionFees = $query->sum('charge');
        $totalTransactions = $transactions->total(); // Total number of transactions

        // Fetch distinct remarks as objects
        $remarks = Transaction::distinct('remark')->orderBy('remark')->get(['remark']);

        return view('admin.reports.transactions', compact('pageTitle', 'remarks', 'transactions', 'totalDeposit', 'totalWithdraw', 'totalTransactionFees', 'totalTransactions'));
    }



    //  GENERATE THE REPORT

    public function generateReport(Request $request)
    {
        // Get the application name
        $appName = config('app.name');

        // Fetch and filter the transactions based on the request inputs
        $query = Transaction::query();

        if ($request->filled('search')) {
            $query->where(function ($query) use ($request) {
                $query->where('trx', 'like', '%' . $request->input('search') . '%')
                    ->orWhereHas('user', function ($userQuery) use ($request) {
                        $userQuery->where('username', 'like', '%' . $request->input('search') . '%');
                    });
            });
        }

        if ($request->filled('trx_type')) {
            $query->where('trx_type', $request->input('trx_type'));
        }

        if ($request->filled('remark')) {
            $query->where('remark', $request->input('remark'));
        }

        if ($request->filled('date')) {
            $dates = explode(' - ', $request->input('date'));
            $startDate = Carbon::createFromFormat('Y-m-d', $dates[0])->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $dates[1])->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $transactions = $query->with('user')->get();

        // Calculate totals
        $totalDeposit = $transactions->where('remark', 'deposit')->sum('amount');
        $totalWithdraw = $transactions->where('remark', 'withdraw')->sum('amount');
        $totalTransactionFees = $transactions->where('remark', 'application_fee')->sum('amount');
        $totalInstallmentPenality = $transactions->where('remark', 'installment_penalty')->sum('amount');
        $totalInstallment = $transactions->where('remark', 'installment_payment')->sum('amount');
        $totalTransactions = $transactions->count();
        $totalLoan = $transactions->where('remark', 'loan_taken')->sum('amount');

        $printedBy = 'Guest'; // Default to Guest if not authenticated
        // if (Auth::guard('admin')->check()) {
        //     $printedBy = Auth::guard('admin')->user()->name;
        // }
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $printedBy = $user->name;
            $email = $user->email;
            $role = $user->role;
        } else {
            // Handle if user is not authenticated
            return redirect()->route('login');
        }

        // Generate the report title
        $reportTitle = strtoupper($appName) . ' TRANSACTION REPORT';
        $logoPath = Config::get('app.logo_path');


        if ($request->filled('remark')) {
            $reportTitle .= ' - ' . strtoupper($request->input('remark'));
        }

        if ($request->filled('date')) {
            $reportTitle .= ' FROM ' . $request->input('date');
        }

        // Function to generate a random alphanumeric string of specified length
        function generateRandomString($length = 6)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $signature = generateRandomString(6);

        // Prepare user information for QR code
        $qrCodeData = "id:{$signature}\nName: {$user->name}\nEmail: {$email}\nRole: {$role}\nSigned-Date: " . now()->format('Y-m-d H:i:s');
        $qrCodePath = public_path('qrcodes/qrcode.png');
        QrCode::size(200)
            ->backgroundColor(255, 255, 255) // White background
            ->color(0, 0, 0) // Navy QR code
            ->generate($qrCodeData, $qrCodePath);

        $data = [
            'transactions' => $transactions,
            'totalDeposit' => $totalDeposit,
            'totalLoan' => $totalLoan,
            'signature' =>$signature,
            'totalWithdraw' => $totalWithdraw,
            'totalTransactionFees' => $totalTransactionFees,
            'totalTransactions' => $totalTransactions,
            'totalInstallment' => $totalInstallment,
            'totalInstallmentPenality' => $totalInstallmentPenality,
            'printedBy' => $printedBy,
            'logoUrl' => public_path($logoPath),
            'appName' => $appName,
            'reportTitle' => $reportTitle,
            'qrCodePath' => $qrCodePath,
        ];



        // Generate the PDF with A4 landscape orientation
        $pdf = PDF::loadView('admin.reports.transactions_pdf', $data)->setPaper('a4', 'landscape')->set_option("enable_php", true);;

        // Download the generated PDF
        return $pdf->download("{$reportTitle}.pdf");
    }



    //  LOGIN HISTORY FUNCTIONS
    public function loginHistory(Request $request)
    {
        $pageTitle = 'User Login History';
        $loginLogs = UserLogin::orderBy('id', 'desc')->searchable(['user:username'])->with('user')->paginate(getPaginate());
        return view('admin.reports.logins', compact('pageTitle', 'loginLogs'));
    }

    public function loginIpHistory($ip)
    {
        $pageTitle = 'Login by - ' . $ip;
        $loginLogs = UserLogin::where('user_ip', $ip)->orderBy('id', 'desc')->with('user')->paginate(getPaginate());
        return view('admin.reports.logins', compact('pageTitle', 'loginLogs', 'ip'));
    }

    public function notificationHistory(Request $request)
    {
        $pageTitle = 'Notification History';
        $logs = NotificationLog::orderBy('id', 'desc')->searchable(['user:username'])->with('user')->paginate(getPaginate());
        return view('admin.reports.notification_history', compact('pageTitle', 'logs'));
    }

    public function emailDetails($id)
    {
        $pageTitle = 'Email Details';
        $email = NotificationLog::findOrFail($id);
        return view('admin.reports.email_details', compact('pageTitle', 'email'));
        
    }
    
}
