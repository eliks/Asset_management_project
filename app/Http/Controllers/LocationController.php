<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use\Validator;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        return view ('Locations.index',  ['locations' => Location::all()]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('Locations.create', $data);
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
                'organization_id' =>'required|numeric',
                'tag' => 'required',
                'parent_id' => 'required|numeric',
                'address' => 'required',
                'added_by_id' => 'required|numeric',
               
            ], 
        );

  
        if ($validator->fails()) {
            // return $request;
            return redirect(route('location.create'))
                        ->withErrors($validator)
                        ->withInput();
        }

       $data = $request->all();

       Location::create($data);

       return redirect(route('location.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
          $array['Locations'] = Location::findOrFail($id);
        
       return view('Locations.more')->with($array);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
