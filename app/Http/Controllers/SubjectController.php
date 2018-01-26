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

use App\Clssub;
use App\Clssec;

use App\Exmtypclssub;
use App\Marksentry;

class SubjectController extends Controller
{
    public function subjects(){
        $ses = Session::whereStatus('CURRENT')->first();
        $subjects = Subject::whereSession_id($ses->id)->get();
        $extypes  = Extype::whereSession_id($ses->id)->get();


        return view('subjects.subjects')
        ->withSubjects($subjects)
        ->withExtypes($extypes)
        ;
    }

    public function subjectsSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        // echo $request->subjectName;
        // echo $request->subjectCode;
        // echo $request->subjectType;
        $subject = new Subject;
        $subject->name = $request->subjectName;
        $subject->code = $request->subjectCode;
        $subject->extype_id = $request->subjectType;
        $subject->session_id = $ses->id;

        $subject->save();

        return back();
    }

    public function subjectsView(){
        $ses = Session::whereStatus('CURRENT')->first();
        $subjects = Subject::whereSession_id($ses->id)->get();
        // echo "hello";
        return view('subjects.subjectsView')
        ->withSubjects($subjects)
        ;
    }

    public function subjectsEditSubmit(Request $request){
        echo $request->subjectEditId;
        echo $request->subjectEditName;
        echo $request->subjectEditCode;
        echo $request->subjectEditType;
        $ses = Session::whereStatus('CURRENT')->first();
        $subject = Subject::find($request->subjectEditId);

        $subject->name = $request->subjectEditName;
        $subject->code = $request->subjectEditCode;
        $subject->extype_id = $request->subjectEditType;
        // $subject->session_id = $ses->id;
        
        $subject->save();
        return back();
    }

    public function subjectsDeltSubmit(Request $request){
        // echo $request->deltclssName;
        // echo $request->deltclssId;
        $ses = Session::whereStatus('CURRENT')->first();
        $exam = Subject::find($request->deltclssId);
        
        $exam->delete();
        return back();
    }
}
