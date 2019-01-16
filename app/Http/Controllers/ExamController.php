<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Sets;
use App\Languages;
use App\Results;
use App\Http\Controllers\ResultsController;
use DateTime;
use Session;
use Auth;

class ExamController extends Controller
{
    public function start($setId, $examId, $algorithmId){
        $set = Sets::find($setId);
        $words = $set->getLines();
        if($algorithmId != 2)
            shuffle($words);

        Session::put('words', $words);
        Session::put('l1', $set->language1->name);
        Session::put('l2', $set->language2->name);
        Session::put('wordId', 0);
        Session::put('examId', $examId);
        Session::put('setId', $setId);
        Session::put('algorithmId', $algorithmId);
        Session::put('score', 0);
        Session::put('incorrect', 0);
        Session::put('subcategoryId', $set->subcategories_id);

        return $this->getNewWord(new Request());
    }

    public function getNewWord(Request $request){
        $wordId = Session::get('wordId');
        $l1 =  Session::get('l1');
        $l2 =  Session::get('l2');

        $words = $this->getWords($wordId);
        if(Input::has('word')){
            if($this->strip($words[(Session::get('examId') + 1) % 2]) == $this->strip(Input::get('word'))){
                Session::put('score', Session::get('score') + 1);
            }
            else if(Session::get('algorithmId') == 1){
                $word = $words[Session::get('examId')];
                Session::put('incorrect', Session::get('incorrect') + 1);
                return view('other.exam', compact('word', 'l1', 'l2'));
            }

            Session::put('wordId', ++$wordId);
            if($wordId == count(Session::get('words')))
                return redirect('/exam/result');
            $words = $this->getWords($wordId);
        }
        $word = $words[Session::get('examId')];


        return view('other.exam', compact('word', 'l1', 'l2'));
    }

    public function end(){
        $algorithmId = Session::get('algorithmId');
        $score = Session::get('score');
        $bestScore = count(Session::get('words'));
        $rate = ($score / $bestScore) * 100;
        $incorrect = Session::get('incorrect');

        if(Auth::user()){

            $sets_id = Session::get('setId');
            $user_id = Auth::id();
            $date = new DateTime();
            $percent = $rate;

            $this->store_results($sets_id, $user_id, $date, $percent);
        }

        return view('other.result', compact('score', 'bestScore', 'rate', 'incorrect', 'algorithmId'));
    }

    private function getWords($wordId){
        return explode(';', Session::get('words')[$wordId]);
    }

    private function strip($string){
        return preg_replace('/\s+/', '', $string);
    }

    public function store_results($sets_id, $user_id, $date, $percent)
    {
        $results = new Results;
        $results->sets_id = $sets_id;
        $results->users_id = $user_id;
        $results->date = $date;
        $results->percent = $percent;
        $results->timestamps = false;
        $results->save();
    }

}
