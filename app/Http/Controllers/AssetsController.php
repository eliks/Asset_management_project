<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetRegistrationLink;
use App\AssetAssetRegistrationLink;
use App\User;
use App\Location;
use Illuminate\Http\Request;
use \Validator;
use Illuminate\Validation\Rule;
use \Auth;

class AssetsController extends Controller
{
    /**
     * Display a listi'sdiwoe aoskdoiw'ng of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['assets'] = Asset::with(['location', 'type', 'maintenanceActivities'])->orderBy('created_at', 'DESC')->get();
        
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
                'serial_number' => 'required',
                'name' => 'required',
                'type_id' =>'required|numeric',
                'tag' => 'required',
                'date_commenced' => 'required|date',
                // 'date_acquired' => 'required|date',
                'location_id'=>'required',
            ]);

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

    public function createViaLink($token)
    {
        $links = AssetRegistrationLink::where('token',$token);

        if(count($links->get()) > 0)
        {
            $link = $links->first();
        } else {
            return redirect('home');
        }

        $data['locations'] = $link->locations;
        $data['token'] = $token;

        return view('assets.create_via_closed_link', $data);
    }

    public function storeViaClosedLink(Request $request, $token)
    {
        $links = AssetRegistrationLink::where('token',$token);

        if(count($links->get()) > 0)
        {
            $link = $links->first();
        } else {
            return redirect('home');
        }

        $validator=Validator::make($request->all(), [
            'name' => 'required',
            'type_id' =>'required|numeric',
            'tag' => 'required',
            'date_commenced' => 'required|date',
            'date_acquired' => 'required',
            'location_id'=>'required',
        ]);


        if ($validator->fails()) {
            return redirect(route('assets.create'))
                        ->withErrors($validator)
                        ->withInput();
        }

       $data = $request->all();

       $asset = Asset::create($data);
       AssetAssetRegistrationLink::create(['asset_registration_link_id' => $link->id, 'asset_id' => $asset->id, 'added_by_id' => Auth::user()->id]);

       return redirect(route('assets.register_via_closed_link', ['token' => $token]));
    }

     public function scheduleMaintenance(Request $request, $asset_id)
        {
            $validator=Validator::make($request->all(), [
                'next_maintenance_date' => 'required|date',
            ]);

         if ($validator->fails()) {
            // return $request;
            return redirect(route('assets.schedule', ['id'=>$asset_id]))
                        ->withErrors($validator)
                        ->withInput();
        }

        $asset = Asset::find($asset_id);
            // return $request;


       $data = $request->all();

       $asset->update(['next_maintenance_date'=>$data['next_maintenance_date']]);

       return redirect(route('assets.show', ['id'=>$asset->id]));

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
    public function edit($id)
    {
           // $array['assets'] = Asset::find($assets_Table);
           // return view('assets.edit')->with($array);
         // return view('assets.edit',$data);
        $data['asset'] = Asset::find($id);
        return view('assets.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assets_Table  $assets_Table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $input_data = $request->all();

        $validator=Validator::make($input_data, [
                'name' => 'required',
                'type_id' =>'required|numeric',
                'tag' => 'required',
                'date_commenced' => 'required',
                'date_acquired' => 'required|date',
                'location_id'=>'required',
            ]);

        $asset = Asset::find($id);

        $validator->after(function() use ($asset,$input_data,$validator){
            if($asset->tag != $input_data['tag'] && count(Asset::where('tag',$input_data['tag'])->get()) > 0){
                $validator->errors()->add('tag','The tag specified has already been taken.');
            }
        });

        if ($validator->fails()) {
            // return $request;
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

      $data = $request->all();
      $asset->update($data);

      return redirect(route('assets.index'))->with('success', 'Asset has been updated');

    }
    



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assets_Table  $assets_Table
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return 'sdsd';
        
     $asset = Asset::find($id);
     $asset->delete();

     return redirect(route('assets.index'))->with('success', 'Asset has been deleted Successfully');

    }

    public function createMaintenance($asset_id)
    {
        $data['asset_id'] = $asset_id;

        return view('assets.create_maintenance', $data)
            // ->with('message', $message)
            ;
    }

    public function schedule($asset_id)
    {
        $data['asset_id'] = $asset_id;
        $data['asset'] = Asset::find($asset_id);
       

        return view('assets.schedule', $data)
            // ->with('message', $message)
            ;
    }
}
