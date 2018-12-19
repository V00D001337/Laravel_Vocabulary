<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sets;
use App\Languages;

class SetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subcategoryId)
    {
        // $sets = Sets::all()->where('subcategories_id', $subcategoryId);
        $sets = Sets::all();
        // $sets = Sets::select("SELECT s.name, l1.name as language1, l2.name as language2 FROM sets s LEFT JOIN languages l1 on l.id = s.languages1_id LEFT JOIN languages l2 on l2.id = s.languages2_id");
        return view('sets.index', compact('sets', 'subcategoryId'));
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subcategoryId, $id)
    {
        $sets  = Sets::find($id);
        $sets->deleted = new DateTime();
        $sets->save();

        return redirect()->action('SetsController@index', compact('subcategoryId'));
    }
}
