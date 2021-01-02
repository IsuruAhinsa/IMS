<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\SaveDepartmentRequest;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (request()->status == 'deleted') {
            $departments = Department::onlyTrashed()->get();
        } else {
            $departments = Department::all();
        }
        return view('departments.index')->with(compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('departments.create')->with('department', new Department);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveDepartmentRequest $request)
    {
        $department = new Department;
        $department->department_id = $request->input('department_id');
        $department->department_code = $request->input('department_code');
        $department->description = $request->input('description');
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Department $department)
    {
        return view('departments.view')->with('department', $department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Department $department)
    {
        return view('departments.edit')->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveDepartmentRequest $request, Department $department)
    {
        $department->department_id = $request->input('department_id');
        $department->department_code = $request->input('department_code');
        $department->description = $request->input('description');
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return back()->with('success', 'The Department was deleted successfully.');
    }

    public function restore($department_id = null)
    {
        Department::onlyTrashed()->where('department_id', $department_id)->restore();
        return redirect()->route('departments.index')->with('success', 'Department restored successfully.');
    }

    public function fdelete($department_id = null)
    {
        Department::onlyTrashed()->where('department_id', $department_id)->forceDelete();
        return back()->with('success', 'The Department was permanently deleted successfully.');
    }
}
