<?php

namespace App\Http\Controllers\User\Auth;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Mail\sendEmail;
use App\Models\AdminNotification;
use App\Models\User;
use App\Models\UserLogin;
use App\Rules\PhoneNumber;
use App\Services\SmService;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; // Assuming SmSHelper is in App\Helpers
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller

{


    protected $smsService;
    use RegistersUsers;

    public function __construct(SmService $smsService)
    {
        parent::__construct();
        $this->middleware('guest');
        $this->middleware('registration.status')->except('registrationNotAllowed');
        $this->smsService = $smsService;
    }




    public function showRegistrationForm()
    {
        $pageTitle = "Register";
        $info = json_decode(json_encode(getIpInfo()), true);
        $mobileCode = @implode(',', $info['code']);
        $countries = json_decode(file_get_contents(resource_path('views/partials/country.json')));
        return view($this->activeTemplate . 'user.auth.register', compact('pageTitle', 'mobileCode', 'countries'));
    }

    protected function validator(array $data)
    {

        $general = gs();
        $passwordValidation = Password::min(6);
        if ($general->secure_password) {
            $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
        }
        $agree = 'nullable';
        if ($general->agree) {
            $agree = 'required';
        }
        $countryData = (array) json_decode(file_get_contents(resource_path('views/partials/country.json')));
        $countryCodes = implode(',', array_keys($countryData));
        $mobileCodes = implode(',', array_column($countryData, 'dial_code'));
        $countries = implode(',', array_column($countryData, 'country'));

        $validate = Validator::make($data, [
            'email' => 'required|string|email|unique:users',
            'verification_method' => 'required|string',
            'mobile' => [
                'required',
                new PhoneNumber($data['country_code']),
                'regex:/^([0-9]*)$/',
                'max:9', // Adjust the max length as needed
            ],
            'password' => ['required', 'confirmed', $passwordValidation],
            'captcha' => 'sometimes|required',
            'mobile_code' => 'required|in:' . $mobileCodes,
            'country_code' => 'required|in:' . $countryCodes,
            'country' => 'required|in:' . $countries,
            'agree' => $agree,

        ]);

        return $validate;
    }

    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        $request->session()->regenerateToken();

        if (!verifyCaptcha()) {
            $notify[] = ['error', 'Invalid captcha provided'];
            return back()->withNotify($notify);
        }

        $exist = User::where('mobile', $request->mobile_code . $request->mobile)->first();
        if ($exist) {
            $notify[] = ['error', 'The mobile number already exists'];
            return back()->withNotify($notify)->withInput();
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
        ?: redirect($this->redirectPath());
    }

    protected function create(array $data)
    {
        //   get the verification method from the form

        $verification_method = $data['verification_method'];

        $general = gs();

        // User Create
        $user = new User();
        $user->email = strtolower($data['email']);
        $user->password = Hash::make($data['password']);
        $user->country_code = $data['country_code'];
        $user->mobile = $data['mobile_code'] . $data['mobile'];
        $user->address = [
            'address' => '',
            'state' => '',
            'zip' => '',
            'country' => isset($data['country']) ? $data['country'] : null,
            'city' => '',
        ];

        /*
        |--------------------------------------------------------------------------
        | Acount verifcation method
        |--------------------------------------------------------------------------
        |
        | Here are each of the account verification of the new user
        | ev = means evail verification if use select email status
        |      set to 0
        | sv = means sms verification if user select mobile verification
        |       sms send to  its mobile phone
         */

        if ($verification_method === 'email') {
            $user->ev = Status::NO; // Email verification enabled
            $user->sv = Status::YES; // Mobile verification disabled
        } else if ($verification_method === 'mobile') {
            $user->ev = Status::YES; // Email verification disabled
            $user->sv = Status::NO; // Mobile verification enabled
        }

        $user->kv = $general->kv ? Status::NO : Status::YES;
        $user->ts = 0;
        $user->tv = 1;
        $user->save();

        // Admin Notification
        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New member registered';
        $adminNotification->click_url = urlPath('admin.users.detail', $user->id);
        $adminNotification->save();

        $ip = getRealIP();
        // Login Log Create

        function getMacAddress($ip)
        {
            // Execute the 'arp' command to get the MAC address associated with the IP address
            exec("arp -a $ip", $output);

            // Iterate through each line of the command output
            foreach ($output as $line) {
                // Search for the IP address in each line
                if (strpos($line, $ip) !== false) {
                    // If the IP address is found, extract the MAC address
                    $parts = preg_split('/\s+/', trim($line));
                    return $parts[1] ?? 'MAC address not found';
                }
            }

            // If MAC address not found, return a default message
            return 'MAC address not found';
        }

        $macAddress = getMacAddress($ip);

        $exist = UserLogin::where('user_ip', $ip)->first();
        $userLogin = new UserLogin();
        // Check exist or not
        if ($exist) {
            $userLogin->longitude = $exist->longitude;
            $userLogin->latitude = $exist->latitude;
            $userLogin->city = $exist->city;
            $userLogin->country_code = $exist->country_code;
            $userLogin->country = $exist->country;
        } else {
            $info = json_decode(json_encode(getIpInfo()), true);
            $userLogin->longitude = @implode(',', $info['long']);
            $userLogin->latitude = @implode(',', $info['lat']);
            $userLogin->city = @implode(',', $info['city']);
            $userLogin->country_code = @implode(',', $info['code']);
            $userLogin->country = @implode(',', $info['country']);
        }

        $userAgent = osBrowser();
        $userLogin->user_id = $user->id;
        $userLogin->user_ip = $ip;
        $userLogin->user_mac = $macAddress;
        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save();

        // Generate verification code for email verifications
        $user->ver_code = $verificationcode = verificationCode(6);
        $user->ver_code_send_at = Carbon::now();
        $user->save();

        // Render email template with data

        if ($verification_method === 'email') {

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
            // If the email is sent successfully, return the user object
            return $user;

        }
        //    SMS Verifications for the mobile phone
        else if ($verification_method === 'mobile') {
            $phoneNumber = $data['mobile_code'] . $data['mobile'];
            $appName = config('app.name');

            $message = "\n\nYour account verification code is: $verificationcode";

            $smsResponse =$this->smsService->sendSms($phoneNumber, $message);

            if (!$smsResponse['success']) {
                $error = isset($smsResponse['error']) ? $smsResponse['error'] : 'Failed to send verification code.';
                $errorDetails = isset($smsResponse['response']) ? ' Response: ' . $smsResponse['response'] : '';
                $httpCode = isset($smsResponse['http_code']) ? ' HTTP Code: ' . $smsResponse['http_code'] : '';
                throw ValidationException::withMessages(['error' => $error . $errorDetails . $httpCode]);
            }

            // if SMS sent successfully return the user
            return $user;

        } 
        else {
            // Handle unexpected verification method
        }

    }

    public function checkUser(Request $request)
    {
        $exist['data'] = false;
        $exist['type'] = null;
        if ($request->email) {
            $exist['data'] = User::where('email', $request->email)->exists();
            $exist['type'] = 'email';
        }
        if ($request->mobile) {
            $exist['data'] = User::where('mobile', $request->mobile)->exists();
            $exist['type'] = 'mobile';
        }
        // if ($request->username) {
        //     $exist['data'] = User::where('username', $request->username)->exists();
        //     $exist['type'] = 'username';
        // }

        return response($exist);
    }

    public function registered()
    {
        return to_route('user.home');
    }
}
