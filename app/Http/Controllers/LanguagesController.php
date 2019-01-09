<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Languages;
use DateTime;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Languages::all();
        return view('languages.index', ['languages' => $languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $languages = new Languages;
        $languages->name = $request->validate(['name' => 'required|max:100|unique:languages,name']);
        $languages->symbol = $request->validate(['symbol' => 'required|max:100|unique:languages,symbol']);
        $languages->name = $request->input('name');
        $languages->symbol = $request->input('symbol');
        $languages->save();
            return redirect()->action('LanguagesController@index');
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
        $languages = Languages::find($id);
        return view('languages.update', compact('languages', 'id'));
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
        $languages = Languages::find($id);
        $languages->name = $request->validate(['name' => 'required|max:100']);
        $languages->symbol = $request->validate(['symbol' => 'required|max:100']);
        $languages->name = $request->input('name');
        $languages->symbol = $request->input('symbol');
        $languages->save();
            return redirect()->action('LanguagesController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $languages = Languages::find($id);
        $languages->deleted = new DateTime();
        $languages->save();
            return redirect()->action('LanguagesController@index');
    }
}
