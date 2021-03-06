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

class ExamController extends Controller
{
    public function exams(){
        $ses = Session::whereStatus('CURRENT')->first();
        $exams = Exam::whereSession_id($ses->id)->get();

        return view('exams.exams')
        ->withExams($exams)
        ;
    }

    public function examsSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        // echo $request->examName;
        $exam = new Exam;
        $exam->name = $request->examName;
        $exam->session_id = $ses->id;
        $exam->save();

        return back();
    }

    public function examsView(){
        $ses = Session::whereStatus('CURRENT')->first();
        $exams = Exam::whereSession_id($ses->id)->get();
        // echo "hello";
        return view('exams.examsView')
        ->withExams($exams)
        ;
    }

    public function examsEditSubmit(Request $request){
        // echo $request->editclssName;
        // echo $request->editclssId;
        $ses = Session::whereStatus('CURRENT')->first();
        $exam = Exam::find($request->editclssId);
        $exam->name = $request->editclssName;
        $exam->save();
        return back();
    }

    public function examsDeltSubmit(Request $request){
        // echo $request->deltclssName;
        // echo $request->deltclssId;
        $ses = Session::whereStatus('CURRENT')->first();
        $exam = Exam::find($request->deltclssId);
        
        $exam->delete();
        return back();
    }
}
