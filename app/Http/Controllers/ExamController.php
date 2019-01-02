<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Sets;
use App\Languages;

class ExamController extends Controller
{
    public function start($setId, $examId, $algorithmId){
        $set = Sets::find($setId);
        $words = $set->getLines();
        shuffle($words);

        $_SESSION['words'] = $words;
        $_SESSION['l1'] = $set->language1->name;
        $_SESSION['l2'] = $set->language2->name;
        $_SESSION['wordId'] = 0;
        $_SESSION['examId'] = $examId;
        $_SESSION['algorithmId'] = $algorithmId;

        return $this->getNewWord();
    }

    public function getNewWord(){
        $wordId = $_SESSION['wordId'];
        $l1 = $_SESSION['l1'];
        $l2 = $_SESSION['l2'];

        $words = explode(';', $_SESSION['words'][$wordId]);
        $word = $words[$_SESSION['examId']];
        if(Input::has('word')){
            if(strip($words[($_SESSION['examId'] + 1) % 2]) == strip(Input::get('word'))){

            }
            else if($_SESSION['algorithmId'] == 1){

            }
            else{
                
            }
        }
        else
            $wordId += 1;

        return view('other.exam', compact('word', 'l1', 'l2'));
    }

    private function strip($string){
        return preg_replace('/\s+/', '', $string);
    }

}
