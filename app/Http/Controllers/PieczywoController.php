<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pieczywo;

class PieczywoController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $pieczywo = Pieczywo::all();
        return view('pieczywo.index', ['pieczywo' => $pieczywo]);
    }

    public function create()
    {
        return view('pieczywo.create');
    }

    public function store(Request $request)
    {
        $pieczywo = new Pieczywo();
        $pieczywo->nazwa = $request->input('nazwa');
        $pieczywo->skladniki = $request->input('skladniki');
        $pieczywo->save();
        
        return redirect()->action('PieczywoController@index');
    }

    public function edit($id)
    {
        $p = Pieczywo::find($id);
        return view('pieczywo.update', compact('p','id'));
    }

    public function update(Request $request, $id)
    {
        $pieczywo = Pieczywo::find($id);
        $pieczywo->nazwa =  $request->input('nazwa');
        $pieczywo->skladniki =  $request->input('skladniki');
        $pieczywo->save();

	    return redirect()->action('PieczywoController@index');
    }

    public function tryDelete($id)
    {
        return view('pieczywo.delete', compact('id'));
    }

    public function delete($id)
    {
		$pieczywo  = Pieczywo::find($id);
		$pieczywo->delete();
		return redirect()->action('PieczywoController@index');
    }
}
