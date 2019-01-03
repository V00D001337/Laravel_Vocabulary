<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Sets;
use App\Languages;
use Session;

class ExamController extends Controller
{
    public function start($setId, $examId, $algorithmId){
        $set = Sets::find($setId);
        $words = $set->getLines();
        shuffle($words);

        Session::put('words', $words);
        Session::put('l1', $set->language1->name);
        Session::put('l2', $set->language2->name);
        Session::put('wordId', 0);
        Session::put('examId', $examId);
        Session::put('algorithmId', $algorithmId);
        Session::put('score', 0);

        return $this->getNewWord(new Request());
    }

    public function getNewWord(Request $request){
        $wordId = Session::get('wordId');
        $l1 =  Session::get('l1');
        $l2 =  Session::get('l2');

        $words = explode(';', Session::get('words')[$wordId]);
        if(Input::has('word')){
            if($this->strip($words[(Session::get('examId') + 1) % 2]) == $this->strip(Input::get('word'))){
                Session::put('score', Session::get('score') + 1);
            }
            else if(Session::get('algorithmId') == 1){
                $word = $words[Session::get('examId')];
                return view('other.exam', compact('word', 'l1', 'l2'));
            }

            Session::put('wordId', ++$wordId);
            $words = $this->getWords($wordId);
        }
        $word = $words[Session::get('examId')];


        return view('other.exam', compact('word', 'l1', 'l2'));
    }

    private function getWords($wordId){
        return explode(';', Session::get('words')[$wordId]);
    }

    private function strip($string){
        return preg_replace('/\s+/', '', $string);
    }

}
