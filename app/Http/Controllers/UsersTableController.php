<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use \Validator;


class UsersTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view ('users.index',  ['users' =>User::all()]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'username' => 'required|unique:users|max:16|min:5',
            'email' => 'required|email',
            'password' => 'required|min:8',
            // 'type' => 'required',
            // 'location' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->all();

        $data['type_id'] = $data['type'];
        $user = User::create($data);
        // UsersLocation::create(['user_id' => $user->id, 'location_id' => $data['location_id']]);

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users_table  $users_table
     * @return \Illuminate\Http\Response
     */
    public function show(Users_table $users_table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users_table  $users_table
     * @return \Illuminate\Http\Response
     */
    public function edit(Users_table $users_table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users_table  $users_table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users_table $users_table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users_table  $users_table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users_table $users_table)
    {
        //
    }
}
