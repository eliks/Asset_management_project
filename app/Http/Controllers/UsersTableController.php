<?php

namespace App\Http\Controllers;

use App\User;
use App\UsersLocation;
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
        // return User::find(19)->locations;
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
            'username' => 'required|unique:users|max:32|min:5',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'type' => 'required',
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
        UsersLocation::create(['user_id' => $user->id, 'location_id' => $data['location']]);

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
    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users_table  $users_table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
        $input_data = $request->all();

        $validator=Validator::make($input_data, [
                'username' => 'required|max:32|min:5',
                'email' => 'required|email',
                'type' => 'required',
            ],
        );

        $user = User::find($id);

        // $validator->after(function() use ($user,$input_data,$validator){
        //     if($user->tag != $input_data['tag'] && count(user::where('tag',$input_data['tag'])->get()) > 0){
        //         $validator->errors()->add('tag','The tag specified has already been taken.');
        //     }
        // });

        if ($validator->fails()) {
            // return $request;
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

      $data = $request->all();
      $user->update($data);

      return redirect(route('users.index'))->with('success', 'User has been updated');

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users_table  $users_table
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = User::find($id);
         $user->delete();

             return redirect(route('users.index'))->with('success', 'User has been deleted Successfully');
    }
}
