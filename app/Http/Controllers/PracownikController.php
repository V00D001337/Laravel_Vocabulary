<?php

namespace App\Http\Controllers;
use App\workers;
use Illuminate\Http\Request;

class PracownikController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workersList = workers::all();
            return view('pracownicy.list', ['workers' => $workersList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pracownicy.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $pracownik = new workers;
                $pracownik->imie = $request->input('imie');
                $pracownik->nazwisko = $request->input('nazwisko');
                $pracownik->data_ur = $request->input('data_ur');
                $pracownik->nr_tel = $request->input('nr_tel');
                $pracownik->pensja = $request->input('pensja');
                $pracownik->save();
                return redirect()->action('PracownikController@index');
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
        $prac = workers::find($id);
            return view('pracownicy.edit', compact('prac','id'));
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
            $pracownik  = workers::find($id);
          	$pracownik->imie =  $request->input('imie');
        	$pracownik->nazwisko =  $request->input('nazwisko');
        	$pracownik->data_ur =  $request->input('data_ur');
            $pracownik->nr_tel =  $request->input('nr_tel');
            $pracownik->pensja =  $request->input('pensja');
       	 $pracownik->save();		
	return redirect()->action('PracownikController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$pracownik  = workers::find($id);
		$pracownik->delete();
		return redirect()->action('PracownikController@index');
    }
}
