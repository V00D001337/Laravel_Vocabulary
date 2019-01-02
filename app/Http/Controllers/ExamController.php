<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sets;
use App\Languages;

class ExamController extends Controller
{
    public function start($setId, $examId){
        $set = Sets::find($setId);
        $words = $set->getLines();
        shuffle($words);

        $_SESSION['words'] = $words;
        $_SESSION['l1'] = $set->language1->name;
        $_SESSION['l2'] = $set->language2->name;
        $_SESSION['wordId'] = 0;
        $_SESSION['examId'] = $examId;

        return $this->getNewWord().$_GET['amountOfTries'];
    }

    public function getNewWord(){
        $wordId = $_SESSION['wordId'];
        $l1 = $_SESSION['l1'];
        $l2 = $_SESSION['l2'];

        $word =  explode(';', $_SESSION['words'][$wordId])[$_SESSION['examId']];
        $wordId += 1;

        return view('other.exam', compact('word', 'l1', 'l2'));
    }

}
