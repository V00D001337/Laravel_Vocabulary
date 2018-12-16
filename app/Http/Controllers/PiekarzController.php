<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Piekarz;
use App\Pieczywo;
use DB;

class PiekarzController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        // $piekarz = Piekarz::with('pieczywo')->get();

        $piekarz = DB::select('SELECT p.id, p.imie, p.nazwisko, p.data_zatrudnienia, r.nazwa, p.ubezpieczenie FROM piekarzs p INNER JOIN pieczywos r ON p.specjalnosc = r.id');
        return view('piekarz.index', ['piekarz' => $piekarz]);
    }

    public function create()
    {
        $pieczywo = Pieczywo::all();
        return view('piekarz.create', ['pieczywo' => $pieczywo]);
    }

    public function store(Request $request)
    {
        $piekarz = new Piekarz();
        $piekarz->imie = $request->input('imie');
        $piekarz->nazwisko = $request->input('nazwisko');
        $piekarz->data_zatrudnienia = $request->input('data_zatrudnienia');
        $piekarz->specjalnosc = $request->input('specjalnosc');
        $piekarz->ubezpieczenie = $request->exists('ubezpieczenie') ? 1 : 0;
        $piekarz->save();
        
        return redirect()->action('PiekarzController@index');
    }

    public function edit($id)
    {
        $p = Piekarz::find($id);
        $pieczywo = Pieczywo::all();
        return view('piekarz.update', compact('p','id', 'pieczywo'));
    }

    public function update(Request $request, $id)
    {
        $piekarz = Piekarz::find($id);
        $piekarz->imie = $request->input('imie');
        $piekarz->nazwisko = $request->input('nazwisko');
        $piekarz->data_zatrudnienia = $request->input('data_zatrudnienia');
        $piekarz->specjalnosc = $request->input('specjalnosc');
        $piekarz->ubezpieczenie = $request->exists('ubezpieczenie') ? 1 : 0;
        $piekarz->save();

	    return redirect()->action('PiekarzController@index');
    }

    public function tryDelete($id)
    {
        return view('piekarz.delete', compact('id'));
    }

    public function delete($id)
    {
		$piekarz  = Piekarz::find($id);
		$piekarz->delete();
		return redirect()->action('PiekarzController@index');
    }
}
