<?php

namespace App\Http\Controllers;

use App\SparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (request()->status == 'deleted') {
            $spare_parts = SparePart::onlyTrashed()->get();
        } else {
            $spare_parts = SparePart::all();
        }
        return view('spare_parts.index')->with(compact('spare_parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('spare_parts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $sparePart = new SparePart;
        $sparePart->spare_id = $request->input('spare_id');
        $sparePart->spare_code = $request->input('spare_code');
        $sparePart->part_number = $request->input('part_number');
        $sparePart->part_description = $request->input('part_description');
        $sparePart->qty = $request->input('qty');
        $sparePart->unit_price = $request->input('unit_price');
        $sparePart->save();

        return redirect()->route('spare_parts.index')->with('success', 'SparePart created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(SparePart $sparePart)
    {
        return view('spare_parts.view')->with('sparePart', $sparePart);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(SparePart $sparePart)
    {
        return view('spare_parts.edit')->with('sparePart', $sparePart);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param SparePart $sparePart
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, SparePart $sparePart)
    {
        $sparePart->spare_id = $request->input('spare_id');
        $sparePart->spare_code = $request->input('spare_code');
        $sparePart->part_number = $request->input('part_number');
        $sparePart->part_description = $request->input('part_description');
        $sparePart->qty = $request->input('qty');
        $sparePart->unit_price = $request->input('unit_price');
        $sparePart->save();

        return redirect()->route('spare_parts.index')->with('success', 'SparePart updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param SparePart $sparePart
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(SparePart $sparePart)
    {
        $sparePart->delete();
        return back()->with('success', 'The Vendor was deleted successfully.');
    }

    public function restore($spare_id = null)
    {
        SparePart::onlyTrashed()->where('spare_id', $spare_id)->restore();
        return redirect()->route('spare-parts.index')->with('success', 'SparePart restored successfully.');
    }

    public function fdelete($spare_id = null)
    {
        SparePart::onlyTrashed()->where('spare_id', $spare_id)->forceDelete();
        return back()->with('success', 'The SparePart was permanently deleted successfully.');
    }
}
