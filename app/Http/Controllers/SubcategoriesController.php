<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategories;
use App\Categories;
use DateTime;
use Session;
use App\User;
use App\Users_subcategories;
use App\User_roles;
use App\Roles;
use DB;
use Auth;


class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoryId)
    {
        Session::put('categoryId', $categoryId);
        Session::forget('subcategoryId');

        if (!Auth::guest() && Auth::user()->admin)
            $subcategories = Subcategories::all()->where('categories_id', $categoryId);
        else
            $subcategories = Subcategories::where('hidden', 1)->where('categories_id', $categoryId)->get();

        return view('subcategories.index', compact('subcategories', 'categoryId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($categoryId)
    {
        $users = User::all();
        return view('subcategories.create', compact('categoryId', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $categoryId)
    {
        $subcategories = new Subcategories;
        $subcategories->categories_id = $categoryId;
        $subcategories->name = $request->validate(['name' => 'required|max:100|unique:subcategories,name']);
        $subcategories->description = $request->validate(['description' => 'required|max:255']);
        $subcategories->picture_file_name = $request->validate(['picture_file_name' => 'required|max:100']);
        $subcategories->name = $request->input('name');
        $subcategories->description = $request->input('description');
        $subcategories->picture_file_name = $request->input('picture_file_name');

        $subcategories->hidden = !$request->has('hidden');

        $subcategories->save();
        /* 
        $ID = $request->input('userId');
        $SUBID = $subcategories->id;
        
        foreach($ID as $id){
            $users_subcategories = new Users_subcategories;
            $users_subcategories->users_id = $id;
            $users_subcategories->subcategories_id = $SUBID;
            $users_subcategories->timestamps = false;
            $users_subcategories->save();
        }
        */
        return redirect()->action("SubcategoriesController@index", compact('categoryId'));
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
    public function edit($categoryId, $id)
    {
        $users = User::all();
        $subcategories = Subcategories::find($id);
        $categories = Categories::where('deleted', null)->get();
        return view('subcategories.update', compact('subcategories', 'id', 'categoryId', 'categories', 'users'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryId, $id)
    {
        $subcategories = Subcategories::find($id);
        $subcategories->name = $request->validate(['name' => 'required|max:100']);
        $subcategories->name = $request->validate(['description' => 'required|max:255']);
        $subcategories->name = $request->validate(['picture_file_name' => 'required|max:100']);
        $subcategories->name = $request->input('name');
        $subcategories->description = $request->input('description');
        $subcategories->picture_file_name = $request->input('picture_file_name');
        $subcategories->categories_id = $request->input('categoryId');
        $subcategories->save();
        $ID = $request->input('userId');
        $SUBID = $subcategories->id;
        DB::table('users_subcategories')->where('subcategories_id', '=', $SUBID)->delete();
        foreach($ID as $id){
            $users_subcategories = new Users_subcategories;
            $users_subcategories->users_id = $id;
            $users_subcategories->subcategories_id = $SUBID;
            $users_subcategories->timestamps = false;
            $users_subcategories->save();
        }
        return redirect()->action("SubcategoriesController@index", compact('categoryId'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryId, $id)
    {
        $subcategories  = Subcategories::find($id);
        $subcategories->deleted = new DateTime();
        $subcategories->save();
        return redirect()->action("SubcategoriesController@index", compact('categoryId'));
    }
}
