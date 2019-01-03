<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use App\Charts\TestAmount;
use DB;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = collect([]);

        for ($days_backwards = 2; $days_backwards >= 0; $days_backwards--) {
            $data->push(Results::whereDate('date', today()->subDays($days_backwards))->count());
        }

        $chart = new TestAmount();
        $chart->labels(['2 days ago', 'Yesterday', 'Today']);
        $chart->dataset('My dataset', 'line', $data);

        return view('results.index', compact('chart'));
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


    public function store($sets_id, $user_id, $date, $percent)
    {
        $results = new Results;
        $results->sets_id = $sets_id;
        $results->users_id = $user_id;
        $results->date = $date;
        $results->percent = $percent;
        $results->save();
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
