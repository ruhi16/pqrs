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
use App\Teacher;
use App\Mode;

use App\Studentdb;
use App\Studentcr;
use App\Clssub;
use App\Clssec;

use App\Exmtypclssub;
use App\Marksentry;
use App\Gradedescription;
use App\Answerscriptdistribution;

class ModeController extends Controller
{
    public function Taskpane(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $exms = Exam::where('session_id', $ses->id)->get();
        $clss = Clss::where('session_id', $ses->id)->get();
        $exts = Extype::where('session_id', $ses->id)->get();
        $mods = Mode::where('session_id', $ses->id)->get();

        return view('modes.exmtypmodclsTaskpane')
            ->with('exms', $exms)
            ->with('clss', $clss)
            ->with('exts', $exts)
            ->with('mods', $mods)
        ;
    }


    public function taskpaneSubmit(Request $request){




        echo "Hello";
    }
}
