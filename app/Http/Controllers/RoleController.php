<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index')->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $allPermissions = Permission::all();
        $permissionGroups = User::getPermissionGroups();
        return view('roles.create')->with(compact('allPermissions', 'permissionGroups'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:roles',
        ],[
            'name.required' => 'Please give a Role name',
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $role->save();

        return redirect()->route('roles.index')->with('success', 'Role Created Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::findById($id);
        $allPermissions = Permission::all();
        $permissionGroups = User::getPermissionGroups();
        return view('roles.edit')->with(compact('role','allPermissions', 'permissionGroups'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'max:50',
                Rule::unique('roles', 'name')->ignore($id),
                ],
        ],[
            'name.required' => 'Please give a Role name',
        ]);

        $role = Role::findById($id);

        $permissions = $request->input('permissions');

        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with('success', 'Role Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $role = Role::findById($id);

        if (!is_null($role)) {
            $role->delete();
        }

        return back()->with('success', 'Role has been deleted !!');
    }
}
