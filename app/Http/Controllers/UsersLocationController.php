<?php

namespace App\Http\Controllers;

use App\UsersLocation;
use Illuminate\Http\Request;
use \Validator;

class UsersLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('userslocation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|integer',
            'location_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->all();

        $cnt = count(UsersLocation::where('user_id', $data['name'])->where('location_id', $data['location_id'])->get());

        if($cnt > 0)
        {
            return redirect('users');
        }
        
        $data['user_id'] = $data['name'];
        // return $data;
        $user = UsersLocation::create($data);
       

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UsersLocation  $usersLocation
     * @return \Illuminate\Http\Response
     */
    public function show(UsersLocation $usersLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UsersLocation  $usersLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersLocation $usersLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UsersLocation  $usersLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersLocation $usersLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UsersLocation  $usersLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersLocation $usersLocation)
    {
        //
    }
}
