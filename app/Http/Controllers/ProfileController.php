<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePassword;
use App\Http\Requests\UpdateProfile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function update(UpdateProfile $request)
    {
        $user = User::findOrFail(Auth::id());

        app('App\Http\Requests\ImageUploadRequest')->handleImages($user, 128, 'image', 'user/image/', 'image');

        $user->first_name   = $request->input('first_name');
        $user->last_name    = $request->input('last_name');
        $user->email        = $request->input('email');
        $user->phone        = $request->input('phone');
        $user->website      = $request->input('website');
        $user->address      = $request->input('address');
        $user->city         = $request->input('city');
        $user->state        = $request->input('state');
        $user->zip          = $request->input('zip');
        $user->country      = $request->input('country');
        $user->notes        = $request->input('notes');
        $user->save();

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
