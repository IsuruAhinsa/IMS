<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePassword;
use App\Http\Requests\UpdateProfile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function update(UpdateProfile $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            if ($avatar->isValid()) {
                // getting original extension for avatar
                $extension = $avatar->getClientOriginalExtension();
                // creating filename for avatar
                $filename = date("Y_m_d_h_i_s") . "_" . $request->email . "." . $extension;
                // creating avatar path
                $path = 'img/profile/avatar/uploads/' . $filename;
                // resize avatar and saved
                Image::make($avatar)->resize(128, 128)->save($path);
            }
        } elseif($request->current_avatar) {
            $path = $request->input('current_avatar');
        } else {
            $path = 'img/profile/avatar/default.png';
        }

        // update profile data
        User::where('id', Auth::id())->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'avatar' => $path,
            'phone' => $request->input('phone'),
            'website' => $request->input('website'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'zip' => $request->input('zip'),
            'country' => $request->input('country'),
            'notes' => $request->input('notes'),
        ]);

        // return redirect to back with success message
        return back()->with('success', 'Your Profile has been updated!');
    }

    public function showChangePasswordForm()
    {
        return view('profile.password');
    }

    public function changePassword(UpdatePassword $request)
    {
        // check if the hash passwords are match
        if (Hash::check($request->current_password, Auth::user()->password)) {
            // hashing the new password
            $hashed_password = Hash::make($request->password_confirmation);
            // update password
            User::where('id', Auth::id())->update([
                'password' => $hashed_password,
            ]);
            // return redirect to back with success message
            return back()->with('success', 'Your Password has been updated!');
        } else {
            return back()->withErrors('Your current password is not valid. Please enter your valid currrent password.');
        }
    }
}
