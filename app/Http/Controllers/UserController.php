<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (request()->status == 'deleted') {
            $users = User::onlyTrashed()->get();
        } else {
            $users = User::all();
        }
        return view('users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        $user = new User();
        // email and password need to be handled specially because the need to respect config values on an edit.
        $user->email = e($request->input('email'));
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->website = $request->input('website', null);
        $user->address = $request->input('address', null);
        $user->city = $request->input('city', null);
        $user->state = $request->input('state', null);
        $user->zip = $request->input('zip', null);
        $user->country = $request->input('country', null);
        $user->notes = $request->input('notes', null);

        // we have to invoke the
        app('App\Http\Requests\ImageUploadRequest')->handleImages($user, 600, 'image', 'user/image/', 'image');

        $user->save();
        return redirect()->route('users.index')->with('success', 'User was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     *
     */
    public function show(User $user)
    {
        return view('users.view')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     */
    public function edit(User $user)
    {
        return view('users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     */
    public function update(Request $request, User $user)
    {
        // update user
        $user->email = e($request->input('email'));
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->website = $request->input('website', null);
        $user->address = $request->input('address', null);
        $user->city = $request->input('city', null);
        $user->state = $request->input('state', null);
        $user->zip = $request->input('zip', null);
        $user->country = $request->input('country', null);
        $user->notes = $request->input('notes', null);

        // handle uploaded user image
        app('App\Http\Requests\ImageUploadRequest')->handleImages($user, 600, 'image', 'user/image/', 'image');

        $user->save();
        return redirect()->route('users.index')->with('success', 'User was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     *
     */
    public function destroy(User $user)
    {
        // check if we are not trying to delete ourselves
        if ($user->id === Auth::id()) {
            return back()->withErrors('We would feel really bad if you deleted yourself, please reconsider.');
        }

        // delete the user
        $user->delete();

        // redirect to back with success message
        return back()->with('success','User was successfully deleted!');
    }

    /**
     * Restore a deleted user
     *
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id = null)
    {
        // restore the user
        User::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('users.index')->with('success', 'User was successfully restored!');
    }

    /**
     * Permanently delete a deleted user
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id = null)
    {
        // get user information
        $user = User::onlyTrashed()->findOrFail($id);

        // delete user
        User::withTrashed()->where('id', $user->id)->forceDelete();

        // delete user image if it is exists
        if(Storage::disk('public')->exists('user/image/' . $user->image)) {
            Storage::disk('public')->delete('user/image/' . $user->image);
        }

        return redirect()->route('users.index', ['status' => 'deleted'])->with('success', 'User was successfully permanently deleted!');
    }

}
