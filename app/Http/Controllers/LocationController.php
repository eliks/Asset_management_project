<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use\Validator;
use Illuminate\Validation\Rule;

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
                'name' => 'required|unique:Locations', 
                'organization_id' =>'required|numeric',
                'tag' => 'required',
                'address' => 'required',
             
               
            ]);

  
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
    public function show( $location_id)
    {
          $array['Locations'] = Location::find($location_id);
          $data['Locations'] = Location::with('assets')->where('id', $location_id)->first();
        $data['next_location_id'] = $data['Locations']->next_location_id;
        $data['previous_location_id'] = $data['Locations']->previous_location_id;
        return view('Locations.show', $data);
        
       // return view('Locations.show')->with($array);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['location'] = Location::find($id);
        return view('Locations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $input_data = $request->all();

        $validator=Validator::make($input_data, [
                'name' => 'required',
                'tag' => 'required',
                'address' => 'required',
            ]);

        $location = Location::find($id);

        $validator->after(function() use ($location,$input_data,$validator){
            if($location->tag != $input_data['tag'] && count(Location::where('tag',$input_data['tag'])->get()) > 0){
                $validator->errors()->add('tag','The tag specified has already been taken.');
            }
        });

        if ($validator->fails()) {
            // return $request;
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // return "Hello";

      $data = $request->all();
      $location->update($data);

      return redirect(route('location.index'))->with('success', 'Location has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return 'sdsd';
        
     $Location = Location::find($id);
     $Location->delete();

     return redirect(route('location.index'))->with('success', 'Location has been deleted Successfully');

    }
}
