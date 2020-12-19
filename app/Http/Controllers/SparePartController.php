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
        $spare_parts = SparePart::all();
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
     * @param  \App\SparePart  $sparePart
     * @return \Illuminate\Http\Response
     */
    public function show(SparePart $sparePart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SparePart  $sparePart
     * @return \Illuminate\Http\Response
     */
    public function edit(SparePart $sparePart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SparePart  $sparePart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SparePart $sparePart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SparePart  $sparePart
     * @return \Illuminate\Http\Response
     */
    public function destroy(SparePart $sparePart)
    {
        //
    }
}
