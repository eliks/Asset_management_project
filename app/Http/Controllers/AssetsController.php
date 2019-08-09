<?php

namespace App\Http\Controllers;

use App\Asset;
use App\User;
use App\Location;
use Illuminate\Http\Request;
use\Validator;

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
        // $message = [];
        // return fgdgfgdg;
        return view('assets.create', $data)
            // ->with('message', $message)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(), [
                'name' => 'required',
                'type_id' =>'required|numeric',
                'tag' => 'required',
                'date_commenced' => 'required',
                'date_acquired' => 'required|date',
                'location_id'=>'required',
            ], 
        );

        if ($validator->fails()) {
            // return $request;
            return redirect(route('assets.create'))
                        ->withErrors($validator)
                        ->withInput();
        }

       $data = $request->all();

       Asset::create($data);

       return redirect(route('assets.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assets_Table  $assets_Table
     * @return \Illuminate\Http\Response
     */
    public function show($asset_id)
    {
         User::find(6)->impliedLocations();
        $data['asset'] = Asset::with('maintenanceActivities')->where('id', $asset_id)->first();
        $data['next_asset_id'] = $data['asset']->next_asset_id;
        $data['previous_asset_id'] = $data['asset']->previous_asset_id;
        return view('assets.show', $data);
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
