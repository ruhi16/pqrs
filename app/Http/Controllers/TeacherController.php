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
use App\Miscoption;

class TeacherController extends Controller
{
    public function teachers(){
        $ses = Session::whereStatus('CURRENT')->first();
        $teachers = Teacher::whereSession_id($ses->id)->get();
        
        $teachDesigs = Miscoption::where('TabName', 'teachers')->where('FieldName','desig')->get();
        $teachHQuals = Miscoption::where('TabName', 'teachers')->where('FieldName','hqual')->get();
        $teachSubjs  = Subject::whereExtype_id(1)->get();

        return view('teachers.teachers')
        ->withTeachers($teachers)
        ->withTeachDesigs($teachDesigs)
        ->withTeachHQuals($teachHQuals)
        ->withTeachSubjs($teachSubjs)
        ;

    }

    public function teachersSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();

        // echo "Name: ".$request->teacherMob . "<br>";
        // echo "Name: ".$request->teacherName . "<br>";
        // echo "Name: ".$request->teacherDesig . "<br>";
        // echo "Name: ".$request->teacherHQual . "<br>";
        // echo "Name: ".$request->teacherMSubj . "<br>";
        // print_r($request->teacherSubj);

        $temp = [];
        foreach($request->teacherSubj as $tSb){
            $prop = [];
            $prop['session_id'] = $ses->id;
            $prop['status'] = 'OKey';
            $temp[$tSb] = $prop;
        }

        // print_r($temp);
        $teacher = new Teacher;
        
        $teacher->name  = $request->teacherName; 
        $teacher->mobno   = $request->teacherMob;        
        $teacher->desig = $request->teacherDesig;
        $teacher->hqual = $request->teacherHQual;
        $teacher->mnsub_id = $request->teacherMSubj;
        $teacher->session_id = $ses->id;
        $teacher->status = 'OKey';
        $teacher->notes  = 'NA';
        $teacher->save();

        $teacher->subjects()->sync($temp);


    }

    public function teachersView(){
        $ses = Session::whereStatus('CURRENT')->first();
        $teachers = Teacher::whereSession_id($ses->id)->get();
        

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
