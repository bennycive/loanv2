<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Mail\sendEmail;
use App\Services\SmService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthorizationController extends Controller
{
    protected function checkCodeValidity($user, $addMin = 2)
    {
        if (!$user->ver_code_send_at) {
            return false;
        }

        if ($user->ver_code_send_at->addMinutes($addMin) < Carbon::now()) {
            return false;
        }

        return true;
    }

    public function authorizeForm()
    {
        $user = auth()->user();

        if (!$user->status) {
            $pageTitle = 'Banned';
            $type = 'ban';
        } elseif (!$user->ev) {
            $type = 'email';
            $pageTitle = 'Verify Account';
            $notifyTemplate = 'EVER_CODE';
        } elseif (!$user->sv) {
            $type = 'mobile';
            $pageTitle = 'Verify Account';
            $notifyTemplate = 'SVER_CODE';
        } elseif (!$user->tv) {
            $pageTitle = '2FA Verification';
            $type = '2fa';
        } else {
            return redirect()->route('user.home');
        }

        if (!$this->checkCodeValidity($user) && ($type != '2fa') && ($type != 'ban')) {
            $user->ver_code = verificationCode(6);
            $user->ver_code_send_at = Carbon::now();
            $user->save();

            notify($user, $notifyTemplate, [
                'code' => $user->ver_code,
            ], [$type]);
        }

        return view($this->activeTemplate . 'user.auth.authorization.' . $type, compact('user', 'pageTitle'));
    }

    public function sendVerifyCode($type)
    {
        $user = auth()->user();

        // Check if the code is still valid
        if ($this->checkCodeValidity($user)) {
            $targetTime = $user->ver_code_send_at->addMinutes(2)->timestamp;
            $delay = $targetTime - time();
            throw ValidationException::withMessages(['resend' => 'Please try after ' . $delay . ' seconds']);
        }

        DB::beginTransaction();

        try {
            // Generate a new verification code
            $user->ver_code = verificationCode(6);
            $user->ver_code_send_at = Carbon::now();
            $user->save();

            // Reload the user instance to ensure the latest data is used
            $user->refresh();

            if ($type == 'email')
             {

                $notifyTemplate = 'EVER_CODE';

                $details = [
                    'code' => $user->ver_code,
                ];

                $subject = 'Account Verification';
                $viewName = 'email.verification';

                try {
                    Mail::to($user->email)->send(new sendEmail($user, $details, $subject, $viewName));
                } catch (\Exception $e) {
                    throw ValidationException::withMessages(['error' => 'Failed to send verification email.']);
                }

            } 
            else if ($type == 'mobile') {
                // Handle mobile verification
                $phoneNumber = $user->mobile_code . $user->mobile;

                $message = "\n\nYour account verification code is: {$user->ver_code}";

                $smsResponse =$this->smsService->sendSms($phoneNumber, $message);
    
                if (!$smsResponse['success']) {
                    $error = isset($smsResponse['error']) ? $smsResponse['error'] : 'Failed to send verification code.';
                    $errorDetails = isset($smsResponse['response']) ? ' Response: ' . $smsResponse['response'] : '';
                    $httpCode = isset($smsResponse['http_code']) ? ' HTTP Code: ' . $smsResponse['http_code'] : '';
                    throw ValidationException::withMessages(['error' => $error . $errorDetails . $httpCode]);
                }

                
            }

            // elseif ($type =='mobile') {

                
            //     $phoneNumber = $user->mobile;
            //     $appName = config('app.name');
    
            //     $message = "\n\nYour account verification code is: $verificationcode";
    
            //     $smsResponse =$this->smsService->sendSms($phoneNumber, $message);
    
            //     if (!$smsResponse['success']) {
            //         $error = isset($smsResponse['error']) ? $smsResponse['error'] : 'Failed to send verification code.';
            //         $errorDetails = isset($smsResponse['response']) ? ' Response: ' . $smsResponse['response'] : '';
            //         $httpCode = isset($smsResponse['http_code']) ? ' HTTP Code: ' . $smsResponse['http_code'] : '';
            //         throw ValidationException::withMessages(['error' => $error . $errorDetails . $httpCode]);
            //     }
    
            //     // if SMS sent successfully return the user
            //     return $user;
    
            // }

            // Commit the transaction
            DB::commit();

            $notify[] = ['success', 'Verification code sent successfully'];
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
            // Log the error for debugging purposes
            Log::error('Failed to send verification code', ['error' => $e->getMessage()]);
            throw ValidationException::withMessages(['error' => 'Failed to send the verification code.']);
        }

        return back()->withNotify($notify);
    }

    public function emailVerification(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $user = auth()->user();

        if ($user->ver_code == $request->code) {
            $user->ev = Status::VERIFIED;
            $user->ver_code = null;
            $user->ver_code_send_at = null;
            $user->save();
            return redirect()->route('user.home');
        }

        throw ValidationException::withMessages(['code' => 'Verification code didn\'t match!']);
    }

    public function mobileVerification(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $user = auth()->user();

        if ($user->ver_code == $request->code) {
            $user->sv = Status::VERIFIED;
            $user->ver_code = null;
            $user->ver_code_send_at = null;
            $user->save();
            return redirect()->route('user.home');
        }

        throw ValidationException::withMessages(['code' => 'Verification code didn\'t match!']);
    }

    public function g2faVerification(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'code' => 'required',
        ]);

        $response = verifyG2fa($user, $request->code);

        if ($response) {
            $notify[] = ['success', 'Verification successful'];
        } else {
            $notify[] = ['error', 'Wrong verification code'];
        }

        return back()->withNotify($notify);
    }
}
