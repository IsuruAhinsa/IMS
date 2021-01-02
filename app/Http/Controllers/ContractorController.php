<?php

namespace App\Http\Controllers;

use App\Contractor;
use App\Http\Requests\SaveContractorRequest;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (request()->status == 'deleted') {
            $contractors = Contractor::onlyTrashed()->get();
        } else {
            $contractors = Contractor::all();
        }
        return view('contractors.index')->with(compact('contractors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('contractors.create')->with('contractor', new Contractor);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveContractorRequest $request)
    {
        $contractor = new Contractor;
        $contractor->reference_id = $request->input('reference_id');
        $contractor->reference_code = $request->input('reference_code');
        $contractor->contract_status = $request->input('contract_status');
        $contractor->contractor_no = $request->input('contractor_no');
        $contractor->contractor_name = $request->input('contractor_name');
        $contractor->start_date = $request->input('start_date');
        $contractor->end_date = $request->input('end_date');
        $contractor->type = $request->input('type');
        $contractor->contractor_value = $request->input('contractor_value');
        $contractor->save();

        return redirect()->route('contractors.index')->with('success', 'Contractor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Contractor $contractor)
    {
        return view('contractors.view')->with('contractor', $contractor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Contractor $contractor)
    {
        return view('contractors.edit')->with('contractor', $contractor);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveContractorRequest $request, Contractor $contractor)
    {
        $contractor->reference_id = $request->input('reference_id');
        $contractor->reference_code = $request->input('reference_code');
        $contractor->contract_status = $request->input('contract_status');
        $contractor->contractor_no = $request->input('contractor_no');
        $contractor->contractor_name = $request->input('contractor_name');
        $contractor->start_date = $request->input('start_date');
        $contractor->end_date = $request->input('end_date');
        $contractor->type = $request->input('type');
        $contractor->contractor_value = $request->input('contractor_value');
        $contractor->save();

        return redirect()->route('contractors.index')->with('success', 'Contractor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Contractor $contractor)
    {
        $contractor->delete();
        return back()->with('success', 'The Contractor was deleted successfully.');
    }

    public function restore($reference_id = null)
    {
        Contractor::onlyTrashed()->where('reference_id', $reference_id)->restore();
        return redirect()->route('contractors.index')->with('success', 'Contractor restored successfully.');
    }

    public function fdelete($reference_id = null)
    {
        Contractor::onlyTrashed()->where('reference_id', $reference_id)->forceDelete();
        return back()->with('success', 'The Contractor was permanently deleted successfully.');
    }
}
