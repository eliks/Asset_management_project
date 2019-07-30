<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    /**
     * Display a listi'sdiwoe aoskdoiw'ng of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['assets'] = Asset::with(['location', 'type', 'maintenanceActivities'])->get();
        
        return view('assets.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('assets.create', $data);
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
     * @param  \App\Assets_Table  $assets_Table
     * @return \Illuminate\Http\Response
     */
    public function show(Assets_Table $assets_Table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assets_Table  $assets_Table
     * @return \Illuminate\Http\Response
     */
    public function edit(Assets_Table $assets_Table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assets_Table  $assets_Table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assets_Table $assets_Table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assets_Table  $assets_Table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assets_Table $assets_Table)
    {
        //
    }
}
