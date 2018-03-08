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

use App\Studentdb;
use App\Studentcr;

use App\Teacher;

use App\Clssub;
use App\Clssec;

use App\Exmtypclssub;
use App\Marksentry;

class TeacherController extends Controller
{
    public function teachers(){

    }

    public function teachersSubmit(Request $request){

    }

    public function teachersView(){
        $ses = Session::whereStatus('CURRENT')->first();
        $subjects = Subject::whereSession_id($ses->id)->get();

        return view('teachers.teachersView')
            ->withTeachers($teachers);
    }

    public function teachersEditSubmit(Request $request){

        return back();
    }

    public function teachersDeltSubmit(Request $request){
     
        return back();
    }
}
