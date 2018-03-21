<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http;
use DB;
use App\Session;
use App\Exam;
use App\Extype;
use App\Clss;
use App\Subject;
use App\Section;
use App\School;
use App\Gradeparticular;
use App\Grade;
use App\Description;

use App\Studentdb;
use App\Studentcr;
use App\Clssub;
use App\Clssec;

use App\Exmtypclssub;
use App\Marksentry;
use App\Gradedescription;

class AnswerScriptController extends Controller
{
    public function answerScriptTaskpane(){
        $ses = Session::whereStatus('CURRENT')->first();
        $exms = Exam::all();
        $clss = Clss::all();

        return view('answerscripts.answerscripts')
        ->withExms($exms)
        ->withClss($clss)
        ;
    }

    public function answerscriptDistribution($exam_id, $clss_id){
        $ses = Session::whereStatus('CURRENT')->first();

        return "hello";
    }
}
