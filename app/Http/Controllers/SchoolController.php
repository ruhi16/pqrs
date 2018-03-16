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
use App\Gradeparticular;
use App\Grade;
use App\Description;

use App\Studentdb;
use App\Studentcr;
use App\Clssub;
use App\Clssec;


use App\Exmtypclssub;
use App\Marksentry;


class SchoolController extends Controller
{
    public function school(){
        $ses = Session::whereStatus('CURRENT')->first();
        $sch = School::whereSession_id($ses->id)->first();

        return view('schools.school')->withSch($sch);
    }

    public function schoolSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        // echo $request->schname;
        $sch = new School;
        $sch->name = $request->schname;
        $sch->session_id = $ses->id;
        $sch->vill = $request->vill;
        $sch->po = $request->poff;
        $sch->ps = $request->pstn;
        $sch->pin = $request->pcode;
        $sch->dist = $request->dist;
        $sch->save();

        return back();
    }

    public function schoolView(){
        $ses = Session::whereStatus('CURRENT')->first();
        $schools = School::whereSession_id($ses->id)->get();
        
        return view('schools.schoolView')
        ->withSchools($schools);
    }
}
