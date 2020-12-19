<?php

namespace App\Http\Controllers;

use App\Accessory;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $accessories = Accessory::all();
        return view('accessories.index')->with(compact('accessories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('accessories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function show(Accessory $accessory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function edit(Accessory $accessory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accessory $accessory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accessory $accessory)
    {
        //
    }
}
