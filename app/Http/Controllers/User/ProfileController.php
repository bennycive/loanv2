<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Rules\FileTypeValidate;
use App\Models\Attachment;

class ProfileController extends Controller
{
    public function profile()
    {
        $pageTitle = "Profile Setting";
        $user = auth()->user();
         // Fetch attachments related to the user
         $attachment = Attachment::where('user_id', $user->id)->first();

        return view($this->activeTemplate . 'user.profile_setting', compact('pageTitle', 'user','attachment'));
    }
    public function submitProfile(Request $request)
    {
        $request->validate([
            'firstname'   => 'required|string',
            'lastname'    => 'required|string',
            'address'     => 'nullable|string',
            'state'       => 'nullable|string',
            'zip'         => 'nullable|string',
            'city'        => 'nullable|string',
            'image'       => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])]
        ], [
            'firstname.required' => 'First name field is required',
            'lastname.required'  => 'Last name field is required'
        ]);

        $user = auth()->user();

        if ($request->hasFile('image')) {
            try {
                $old = $user->image;
                $user->image = fileUploader($request->image, getFilePath('userProfile'), getFileSize('userProfile'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;

        $user->address = [
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => @$user->address->country,
            'city' => $request->city,
        ];

        $user->save();
        $notify[] = ['success', 'Profile updated successfully'];
        return back()->withNotify($notify);
    }

    public function changePassword()
    {
        $pageTitle = 'Change Password';
        return view($this->activeTemplate . 'user.password', compact('pageTitle'));
    }

    
    public function submitPassword(Request $request)
    {
        $passwordValidation = Password::min(6);
        if (gs('secure_password')) {
            $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        // Validate the request
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', $passwordValidation]
        ]);

        $user = auth()->user();

        // Check if the current password matches
        if (Hash::check($request->current_password, $user->password)) {
            // Hash and update the new password
            $user->password = Hash::make($request->password);
            $user->save();

            // Notify the user of the success
            $notify[] = ['success', 'Password changed successfully'];
            return back()->withNotify($notify);
        } else {
            // Notify the user of the error
            $notify[] = ['error', 'The current password does not match our records'];
            return back()->withNotify($notify);
        }
    }
}
