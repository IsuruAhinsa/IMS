<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveLocationRequest;
use App\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (request()->status == 'deleted') {
            $locations = Location::onlyTrashed()->get();
        } else {
            $locations = Location::all();
        }
        return view('locations.index')->with(compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('locations.create')->with('location', new Location);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveLocationRequest $request)
    {
        $location = new Location;
        $location->location_id = $request->input('location_id');
        $location->location_code = $request->input('location_code');
        $location->description = $request->input('description');
        $location->save();

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Location $location)
    {
        return view('locations.view')->with('location', $location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Location $location)
    {
        return view('locations.edit')->with('location', $location);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveLocationRequest $request, Location $location)
    {
        $location->location_id = $request->input('location_id');
        $location->location_code = $request->input('location_code');
        $location->description = $request->input('description');
        $location->save();

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return back()->with('success', 'The Location was deleted successfully.');
    }

    public function restore($location_id = null)
    {
        Location::onlyTrashed()->where('location_id', $location_id)->restore();
        return redirect()->route('locations.index')->with('success', 'Location restored successfully.');
    }

    public function fdelete($location_id = null)
    {
        Location::onlyTrashed()->where('location_id', $location_id)->forceDelete();
        return back()->with('success', 'The Location was permanently deleted successfully.');
    }
}
