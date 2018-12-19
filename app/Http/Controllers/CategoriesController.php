<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use DateTime;

class CategoriesController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $categories = Categories::all();
        return view('categories.index', ['categories' => $categories]);
    }
    
    public function create()
    {
            return view('categories.create');
    }

    public function store(Request $request)
    {
        $categories = new Categories;
        $categories->name = $request->input('name');
        $categories->description = $request->input('description');
        $categories->picture_file_name = $request->input('picture_file_name');
        $categories->save();
            return redirect()->action('CategoriesController@index');
    }

    public function tryDelete($id)
    {
        return view('categories.delete', compact('id'));
    }

    public function delete($id)
    {
        $categories  = Categories::find($id);
        $categories->deleted = new DateTime();
        $categories->save();
            return redirect()->action('CategoriesController@index');
    }
}
