<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

use DateTime;
use Session;
use Auth;

class CategoriesController extends Controller
{
  

    public function index()
    {
        Session::forget('subcategoryId');
        
        if (!Auth::guest() && Auth::user()->admin)
            $categories = Categories::all();
        else
            $categories = Categories::where('hidden', 1)->get();
        return view('categories.index', ['categories' => $categories]);
    }
    
    public function create()
    {
            return view('categories.create');
    }

    public function store(Request $request)
    {
        $categories = new Categories;
        $categories->name = $request->validate(['name' => 'required|max:100|unique:categories,name']);
        $categories->description = $request->validate(['description' => 'required|max:255']);
        $categories->picture_file_name = $request->validate(['picture_file_name' => 'required|max:100|exists:categories,picture_file_name']);
        $categories->name = $request->input('name');
        $categories->description = $request->input('description');
        $categories->picture_file_name = $request->input('picture_file_name');
        $categories->save();
            return redirect()->action('CategoriesController@index');
    }

    public function edit($id)
    {
        $categories = Categories::find($id);
        return view('categories.update', compact('categories','id'));
    }

    public function update(Request $request, $id)
    {
        $categories = Categories::find($id);
        $categories->name = $request->validate(['name' => 'required|max:100']);
        $categories->description = $request->validate(['description' => 'required|max:255']);
        $categories->picture_file_name = $request->validate(['picture_file_name' => 'required|max:100|exists:categories,picture_file_name']);
        $categories->name = $request->input('name');
        $categories->description = $request->input('description');
        $categories->picture_file_name = $request->input('picture_file_name');

        $categories->hidden = !$request->has('hidden');

        $categories->save();
        return redirect()->action('CategoriesController@index');
    }

    public function delete($id)
    {
        $categories  = Categories::find($id);
        $categories->deleted = new DateTime();
        $categories->save();
            return redirect()->action('CategoriesController@index');
    }


}


