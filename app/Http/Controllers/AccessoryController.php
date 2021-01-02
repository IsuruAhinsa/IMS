<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Http\Requests\SaveAccessoryRequest;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (request()->status == 'deleted') {
            $accessories = Accessory::onlyTrashed()->get();
        } else {
            $accessories = Accessory::all();
        }
        return view('accessories.index')->with(compact('accessories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('accessories.create')->with('accessory', new Accessory);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveAccessoryRequest $request)
    {
        $accessory = new Accessory;
        $accessory->asset_tag_id = $request->input('asset_tag_id');
        $accessory->asset_tag = $request->input('asset_tag');
        $accessory->asset_name = $request->input('asset_name');
        $accessory->asset_disacription = $request->input('asset_disacription');
        $accessory->asset_model = $request->input('asset_model');
        $accessory->asset_serial = $request->input('asset_serial');
        $accessory->asset_manufacture = $request->input('asset_manufacture');
        $accessory->save();

        return redirect()->route('accessories.index')->with('success', 'Accessory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Accessory $accessory)
    {
        return view('accessories.view')->with('accessory', $accessory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Accessory $accessory)
    {
        return view('accessories.edit')->with('accessory', $accessory);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveAccessoryRequest $request, Accessory $accessory)
    {
        $accessory->asset_tag_id = $request->input('asset_tag_id');
        $accessory->asset_tag = $request->input('asset_tag');
        $accessory->asset_name = $request->input('asset_name');
        $accessory->asset_disacription = $request->input('asset_disacription');
        $accessory->asset_model = $request->input('asset_model');
        $accessory->asset_serial = $request->input('asset_serial');
        $accessory->asset_manufacture = $request->input('asset_manufacture');
        $accessory->save();

        return redirect()->route('accessories.index')->with('success', 'Accessory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Accessory $accessory)
    {
        $accessory->delete();
        return back()->with('success', 'The Accessory was deleted successfully.');
    }

    public function restore($asset_tag_id = null)
    {
        Accessory::onlyTrashed()->where('asset_tag_id', $asset_tag_id)->restore();
        return redirect()->route('accessories.index')->with('success', 'Accessory restored successfully.');
    }

    public function fdelete($asset_tag_id = null)
    {
        Accessory::onlyTrashed()->where('asset_tag_id', $asset_tag_id)->forceDelete();
        return back()->with('success', 'The Accessory was permanently deleted successfully.');
    }
}
