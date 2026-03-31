<?php

namespace App\Http\Controllers\User\Auth;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\UserLogin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $username;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    public function showLoginForm()
    {
        $pageTitle = "Login";
        return view($this->activeTemplate . 'user.auth.login', compact('pageTitle'));
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $request->session()->regenerateToken();

        if (!verifyCaptcha()) {
            $notify[] = ['error', 'Invalid captcha provided'];
            return back()->withNotify($notify);
        }

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function findUsername()
    {
        $login = request()->input('username');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldType => $login]);
        return $fieldType;
    }

    public function username()
    {
        return $this->username;
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function logout()
    {
        $this->guard()->logout();
        request()->session()->invalidate();

        $notify[] = ['success', 'You have been logged out.'];
        return to_route('user.login')->withNotify($notify);
    }

    public function authenticated(Request $request, $user)
    {
        $user->tv = $user->ts == Status::VERIFIED ? Status::UNVERIFIED : Status::VERIFIED;
        $user->save();

        $ip = getRealIP();
        $exist = UserLogin::where('user_ip', $ip)->first();
        $userLogin = new UserLogin();

        if ($exist) {
            $userLogin->longitude = $exist->longitude;
            $userLogin->latitude = $exist->latitude;
            $userLogin->city = $exist->city;
            $userLogin->country_code = $exist->country_code;
            $userLogin->country = $exist->country;
        } else {
            $info = json_decode(json_encode(getIpInfo()), true);
            $userLogin->longitude = $info['long'] ?? null;
            $userLogin->latitude = $info['lat'] ?? null;
            $userLogin->city = $info['city'] ?? null;
            $userLogin->country_code = $info['code'] ?? null;
            $userLogin->country = $info['country'] ?? null;
        }

        $userAgent = osBrowser();
        $userLogin->user_id = $user->id;
        $userLogin->browser = $userAgent['browser'] ?? null;
        $userLogin->os = $userAgent['os_platform'] ?? null;
        $userLogin->user_ip = $ip;
        $userLogin->user_mac = "null";

        // Log the userLogin details before saving
        Log::info('UserLogin details: ', $userLogin->toArray());

        // Verify attributes
        foreach ($userLogin->getAttributes() as $key => $value) {
            Log::info("UserLogin attribute $key: " . (is_array($value) ? json_encode($value) : $value));
        }

        $userLogin->save();

        return to_route('user.home');
    }

    // private function getMacAddress($ip)
    // {
    //     exec("arp -a $ip", $output);
    //     foreach ($output as $line) {
    //         if (strpos($line, $ip) !== false) {
    //             $parts = preg_split('/\s+/', trim($line));
    //             return $parts[1] ?? 'MAC address not found';
    //         }
    //     }
    //     return 'MAC address not found';
    // }
}
