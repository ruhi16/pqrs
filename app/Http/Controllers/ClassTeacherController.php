<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http;
use DB;
use PDF;

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

use App\Studentdb;
use App\Studentcr;
use App\Clssub;
use App\Clssec;
use App\Clssteacher;

use App\Exmtypclssub;
use App\Marksentry;
use App\Gradedescription;
use App\Answerscriptdistribution;

class ClassTeacherController extends Controller
{
    public function ClassTeacherInfo(Request $requst){
        $ses = Session::whereStatus('CURRENT')->first();
        $clssteachers = Clssteacher::where('session_id', $ses->id)
            ->orderBy('clss_id')->get();

        return view('classteacher.classTeacherInfo')
            ->with('session', $ses)
            ->with('clssteachers', $clssteachers)
        ;

    }
}
