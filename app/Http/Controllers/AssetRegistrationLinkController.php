<?php

namespace App\Http\Controllers;

use App\AssetRegistrationLink;
use App\AssetRegistrationLinkLocation;
use Illuminate\Http\Request;

use \Validator;
use \Auth;

class AssetRegistrationLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['asset_registration_links'] = AssetRegistrationLink::with(['locations', 'type'])->get();
        
        return view('asset_registration_links.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('asset_registration_links.create', $data);
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
                'caption' => 'required',
                'type_id' =>'required|numeric',
                'description' => 'required',
                'expiry_date' => 'required|date',
                'location_id'=>'required|numeric',
            ]);

        if ($validator->fails()) {
            // return $request;
            return redirect(route('asset_registration_links.create'))
                        ->withErrors($validator)
                        ->withInput();
        }

       $data = $request->all();
       $data['token'] = str_random(40);
       $data['added_by_id'] = Auth::user()->id;

       $arl = AssetRegistrationLink::create($data);

       AssetRegistrationLinkLocation::create(['asset_registration_link_id' => $arl->id, 'location_id' => $data['location_id'], 'added_by_id' => Auth::user()->id]);

       // return $arl->locations;

       return redirect(route('asset_registration_links.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AssetRegistrationLink  $assetRegistrationLink
     * @return \Illuminate\Http\Response
     */
    public function show($asset_registration_link_id)
    {
        // User::find(6)->impliedLocations();
        $data['asset_registration_link'] = AssetRegistrationLink::with('locations')->where('id', $asset_registration_link_id)->first();
        
        return view('asset_registration_links.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AssetRegistrationLink  $assetRegistrationLink
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetRegistrationLink $assetRegistrationLink)
    {
        $data['asset_registration_link'] = $assetRegistrationLink;
        return view('asset_registration_links.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AssetRegistrationLink  $assetRegistrationLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetRegistrationLink $assetRegistrationLink)
    {
        $input_data = $request->all();

        $validator=Validator::make($input_data, [
                'caption' => 'required',
                'type_id' =>'required|numeric',
                'description' => 'required',
                'expiry_date' => 'required|date',
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

      $assetRegistrationLink->update($input_data);

      return redirect(route('asset_registration_links.show'))->with('success', 'Asset Registration Link updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AssetRegistrationLink  $assetRegistrationLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetRegistrationLink $assetRegistrationLink)
    {
        //
    }
}
