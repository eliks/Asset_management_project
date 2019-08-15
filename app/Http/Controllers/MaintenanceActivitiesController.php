<?php

namespace App\Http\Controllers;

use App\MaintenanceActivities;
use Illuminate\Http\Request;
use\Validator;

class MaintenanceActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('maintenance.index',['maintenance'=>MaintenanceActivities::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view ('maintenance.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'asset_id'=> 'required',
            'description'=>'required',
            'maintained_by'=>'required',
            'maintained_at'=>'required',
            'supervised_by'=>'required',
            'location'=>'required',
        ],
    );

        if ($validator->fails()){
            return redirect(route('maintenance.create'))
                        ->withErrors($validator)
                        ->withInput();
        }
        $data=$request->all();
        MaintenanceActivities::create($data);
        return redirect (route('maintenance.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaintenanceActivities  $maintenanceActivities
     * @return \Illuminate\Http\Response
     */
    public function show(MaintenanceActivities $maintenanceActivities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaintenanceActivities  $maintenanceActivities
     * @return \Illuminate\Http\Response
     */
    public function edit(MaintenanceActivities $maintenanceActivities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaintenanceActivities  $maintenanceActivities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaintenanceActivities $maintenanceActivities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaintenanceActivities  $maintenanceActivities
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaintenanceActivities $maintenanceActivities)
    {
        //
    }

    public function apiMaintenanceTrend()
    {
        $days_ago = 30;
        $data_date = date('Y-m-d', strtotime('now -'.$days_ago.' days'));
        $maintenanceActivities = MaintenanceActivities::where('created_at', '>=', $data_date)
                        ->groupBy('date')
                        ->orderBy('date', 'DESC')
                        ->get(array(
                            \DB::raw('DATE_FORMAT(Date(created_at), "%Y-%m-%d") as date'),
                            \DB::raw('COUNT(*) as "mcount"')
                        ));

        $retData = [];

        for($i = $days_ago - 1; $i >= 0; $i--)
        {
            $temp_time = strtotime(date('Y-m-d', strtotime('now -'.$i.' days')));
            $retData[$temp_time] = [$temp_time, 0];
        }

        foreach($maintenanceActivities as $maintenanceActivity)
        {
            $temp_time = strtotime($maintenanceActivity->date);
            $retData[$temp_time] = [$temp_time, $maintenanceActivity->mcount];
        }


        $ret = [];

        foreach($retData as $rt)
        {
            // $temp_time = strtotime(date('Y-m-d', strtotime('now -'.$i.' days')));
            $ret[] = [$rt[0], $rt[1]];
        }

        return $ret;
    }
}
