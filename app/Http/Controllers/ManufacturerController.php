<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveManufacturerRequest;
use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (request()->status == 'deleted') {
            $manufacturers = Manufacturer::onlyTrashed()->get();
        } else {
            $manufacturers = Manufacturer::all();
        }
        return view('manufacturers.index')->with(compact('manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('manufacturers.create')->with('manufacturer', new Manufacturer);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveManufacturerRequest $request)
    {
        $manufacturer = new Manufacturer;
        $manufacturer->manufacturer_id = $request->input('manufacturer_id');
        $manufacturer->manufacturer_code = $request->input('manufacturer_code');
        $manufacturer->manufacturer_name = $request->input('manufacturer_name');
        $manufacturer->contact_person = $request->input('contact_person');
        $manufacturer->address = $request->input('address');
        $manufacturer->city = $request->input('city');
        $manufacturer->state_or_province = $request->input('state_or_province');
        $manufacturer->country = $request->input('country');
        $manufacturer->postal_code = $request->input('postal_code');
        $manufacturer->phone_number = $request->input('phone_number');
        $manufacturer->fax_number = $request->input('fax_number');
        $manufacturer->email = $request->input('email');
        $manufacturer->save();

        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer created successfully.');
    }

    /**
     * Display the specified resource.
     * @param Manufacturer $manufacturer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Manufacturer $manufacturer)
    {
        return view('manufacturers.view')->with('manufacturer', $manufacturer);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Manufacturer $manufacturer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('manufacturers.edit')->with('manufacturer', $manufacturer);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Manufacturer $manufacturer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer->manufacturer_id = $request->input('manufacturer_id');
        $manufacturer->manufacturer_code = $request->input('manufacturer_code');
        $manufacturer->manufacturer_name = $request->input('manufacturer_name');
        $manufacturer->contact_person = $request->input('contact_person');
        $manufacturer->address = $request->input('address');
        $manufacturer->city = $request->input('city');
        $manufacturer->state_or_province = $request->input('state_or_province');
        $manufacturer->country = $request->input('country');
        $manufacturer->postal_code = $request->input('postal_code');
        $manufacturer->phone_number = $request->input('phone_number');
        $manufacturer->fax_number = $request->input('fax_number');
        $manufacturer->email = $request->input('email');
        $manufacturer->save();

        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param Manufacturer $manufacturer
     * @throws \Exception
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();
        return back()->with('success', 'The Manufacturer was deleted successfully.');
    }

    /**
     * @param null $manufacturer_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($manufacturer_id = null)
    {
        Manufacturer::onlyTrashed()->where('manufacturer_id', $manufacturer_id)->restore();
        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer restored successfully.');
    }

    /**
     * @param null $manufacturer_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function fdelete($manufacturer_id = null)
    {
        Manufacturer::onlyTrashed()->where('manufacturer_id', $manufacturer_id)->forceDelete();
        return back()->with('success', 'The Manufacturer was permanently deleted successfully.');
    }
}
