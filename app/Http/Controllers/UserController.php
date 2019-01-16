<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Users_subcategories;
use App\User_roles;
use App\Roles;
use Auth;
use DB;

use DateTime;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();

        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User;
        $users->name = $request->validate(['name' => 'required|max:100']);
        //$users->email = $request->validate(['email' => 'required|regex:^([\w\-\.]+)@((\[([0-9]{1,3}\.){3}[0-9]{1,3}\])|(([\w\-]+\.)+)([a-zA-Z]{2,4}))$']);
        $users->password = $request->validate(['password' => 'required|max:191']);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        //$users->email_verified_at = new DateTime();
        $users->save();

        $type = $request->input('type');
        if($type >= 0){
            $role = new User_roles;
            $role->users_id = $users->id;
            $role->roles_id = $type;
            $role->save();
        }

        return redirect()->action('UserController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Roles::all();
        return view('user.update', compact('user', 'roles', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->validate(['name' => 'required|max:100']);
        //$users->email = $request->validate(['email' => 'required|regex:^([\w\-\.]+)@((\[([0-9]{1,3}\.){3}[0-9]{1,3}\])|(([\w\-]+\.)+)([a-zA-Z]{2,4}))$']);
        $users->password = $request->validate(['password' => 'required|max:191']);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->save();

        $type = $request->input('type');

        if($users->user_role){
            if($type < 0)
                DB::delete("delete from User_roles where users_id = $id");
            else{
                DB::update("update User_roles set roles_id = $type where users_id = $id");
            }
        }
        else if($type >= 0){
            $role = new User_roles;
            $role->users_id = $id;
            $role->roles_id = $type;
            $role->save();
        }

        return redirect()->action('UserController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}