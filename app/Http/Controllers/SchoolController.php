<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use App\Session;
use App\Exam;
use App\Extype;
use App\Clss;
use App\Subject;
use App\Section;
use App\School;

use App\Studentdb;
use App\Studentcr;

use App\Clssub;
use App\Clssec;


use App\Exmtypclssub;
use App\Marksentry;


class SchoolController extends Controller
{
    public function schoolInfo(){
        $ses = Session::whereStatus('CURRENT')->first();
        $sch = School::whereSession_id($ses->id)->first();

        return view('school')->withSch($sch);
    }

    public function schoolInfoSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        echo $request->schname;
        $sch = new School;
        $sch->name = $request->schname;
        $sch->session_id = $ses->id;
        $sch->save();

        // return "Hello";
    }

    public function schoolInfoView(){
        $ses = Session::whereStatus('CURRENT')->first();
        $sch = School::whereSession_id($ses->id)->first();
        
        return view('schoolView')
        ->withSch($sch);
    }
}
