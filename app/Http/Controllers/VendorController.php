<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveVendorRequest;
use App\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (request()->status == 'deleted') {
            $vendors = Vendor::onlyTrashed()->get();
        } else {
            $vendors = Vendor::all();
        }
        return view('vendors.index')->with(compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('vendors.create')->with('vendor', new Vendor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveVendorRequest $request)
    {
        $vendor = new Vendor;
        $vendor->vendor_id = $request->input('vendor_id');
        $vendor->vendor_code = $request->input('vendor_code');
        $vendor->supplier_name = $request->input('supplier_name');
        $vendor->contact_person = $request->input('contact_person');
        $vendor->address = $request->input('address');
        $vendor->city = $request->input('city');
        $vendor->state_or_province = $request->input('state_or_province');
        $vendor->country = $request->input('country');
        $vendor->postal_code = $request->input('postal_code');
        $vendor->phone_number = $request->input('phone_number');
        $vendor->fax_number = $request->input('fax_number');
        $vendor->email = $request->input('email');
        $vendor->save();

        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        return view('vendors.view')->with('vendor', $vendor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        return view('vendors.edit')->with('vendor', $vendor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(SaveVendorRequest $request, Vendor $vendor)
    {
        $vendor->vendor_id = $request->input('vendor_id');
        $vendor->vendor_code = $request->input('vendor_code');
        $vendor->supplier_name = $request->input('supplier_name');
        $vendor->contact_person = $request->input('contact_person');
        $vendor->address = $request->input('address');
        $vendor->city = $request->input('city');
        $vendor->state_or_province = $request->input('state_or_province');
        $vendor->country = $request->input('country');
        $vendor->postal_code = $request->input('postal_code');
        $vendor->phone_number = $request->input('phone_number');
        $vendor->fax_number = $request->input('fax_number');
        $vendor->email = $request->input('email');
        $vendor->save();

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return back()->with('success', 'The Vendor was deleted successfully.');
    }

    public function restore($vendor_id = null)
    {
        Vendor::onlyTrashed()->where('vendor_id', $vendor_id)->restore();
        return redirect()->route('vendors.index')->with('success', 'Vendor restored successfully.');
    }

    public function fdelete($vendor_id = null)
    {
        Vendor::onlyTrashed()->where('vendor_id', $vendor_id)->forceDelete();
        return back()->with('success', 'The Vendor was permanently deleted successfully.');
    }
}
