<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sets;
use App\Languages;
use Auth;
use DateTime;

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
    public function create($subcategoryId)
    {
        $languages = Languages::all();
        return view('sets.create', compact('subcategoryId', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $subcategoryId)
    {
        $sets = new Sets();
        $sets->name = $request->validate(['name' => 'required|max:100']);
        $sets->words = $request->validate(['words' => 'required']);
        $sets->number_of_words = $request->validate(['numberOfWords' => 'required']);
        $sets->name = $request->input('name');
        $sets->words = $request->input('words');
        $sets->number_of_words = $request->input('numberOfWords');

        $sets->languages1_id = $request->input('language1');
        $sets->languages2_id = $request->input('language2');
        $sets->users_id = Auth::id();

        $sets->subcategories_id = $subcategoryId;
        $sets->private = false;

        $sets->save();
        
        return redirect()->action('SetsController@index', compact('subcategoryId'));
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
    public function edit($subcategoryId, $id)
    {
        $languages = Languages::all();
        $set = Sets::find($id);
        return view('sets.update', compact('subcategoryId', 'languages', 'set', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subcategoryId, $id)
    {
        $sets = Sets::find($id);
        $sets->name = $request->validate(['name' => 'required|max:100']);
        $sets->words = $request->validate(['words' => 'required']);
        $sets->number_of_words = $request->validate(['numberOfWords' => 'required']);

        $sets->name = $request->input('name');
        $sets->words = $request->input('words');
        $sets->number_of_words = $request->input('numberOfWords');

        $sets->languages1_id = $request->input('language1');
        $sets->languages2_id = $request->input('language2');

        $sets->save();
        
        return redirect()->action('SetsController@index', compact('subcategoryId'));
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
