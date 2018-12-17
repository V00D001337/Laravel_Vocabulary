<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

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
}
