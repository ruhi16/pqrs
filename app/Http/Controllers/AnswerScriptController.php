<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerScriptController extends Controller
{
    public function answerScriptTaskpane(){


        return view('answerscripts.answerscripts');
    }
}
