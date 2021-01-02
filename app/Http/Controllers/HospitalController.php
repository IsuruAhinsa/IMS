<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Http\Requests\SaveHospitalRequest;
use Illuminate\Http\Request;

final class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->status == 'deleted') {
            $hospitals = Hospital::onlyTrashed()->get();
        } else {
            $hospitals = Hospital::all();
        }
        return view('hospitals.index')->with(compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('hospitals.create')->with('hospital', new Hospital);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveHospitalRequest $request)
    {
        $hospital = new Hospital;
        $hospital->hospital_id = $request->input('hospital_id');
        $hospital->hospital_code = $request->input('hospital_code');
        $hospital->hospital_name = $request->input('hospital_name');
        $hospital->region = $request->input('region');
        $hospital->address = $request->input('address');
        $hospital->telephone = $request->input('telephone');
        $hospital->fax = $request->input('fax');
        $hospital->email = $request->input('email');
        $hospital->wo_prefix = $request->input('wo_prefix');
        $hospital->wocm_slno = $request->input('wocm_slno');
        $hospital->wopm_slno = $request->input('wopm_slno');
        $hospital->hospital_code_prefix = $request->input('hospital_code_prefix');
        $hospital->save();

        return redirect()->route('hospitals.index')->with('success', 'Hospital created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Hospital $hospital)
    {
        return view('hospitals.view')->with('hospital', $hospital);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Hospital $hospital)
    {
        return view('hospitals.edit')->with('hospital', $hospital);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveHospitalRequest $request, Hospital $hospital)
    {
        $hospital->hospital_id = $request->input('hospital_id');
        $hospital->hospital_code = $request->input('hospital_code');
        $hospital->hospital_name = $request->input('hospital_name');
        $hospital->region = $request->input('region');
        $hospital->address = $request->input('address');
        $hospital->telephone = $request->input('telephone');
        $hospital->fax = $request->input('fax');
        $hospital->email = $request->input('email');
        $hospital->wo_prefix = $request->input('wo_prefix');
        $hospital->wocm_slno = $request->input('wocm_slno');
        $hospital->wopm_slno = $request->input('wopm_slno');
        $hospital->hospital_code_prefix = $request->input('hospital_code_prefix');
        $hospital->save();

        return redirect()->route('hospitals.index')->with('success', 'Hospital updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return back()->with('success', 'The Hospital was deleted successfully.');
    }

    public function restore($hospital_id = null)
    {
        Hospital::onlyTrashed()->where('hospital_id', $hospital_id)->restore();
        return redirect()->route('hospitals.index')->with('success', 'Hospital restored successfully.');
    }

    public function fdelete($hospital_id = null)
    {
        Hospital::onlyTrashed()->where('hospital_id', $hospital_id)->forceDelete();
        return back()->with('success', 'The Hospital was permanently deleted successfully.');
    }
}
