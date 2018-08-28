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

use App\Studentdb;
use App\Studentcr;
use App\Clssub;
use App\Clssec;

use App\Exmtypclssub;
use App\Marksentry;
use App\Gradedescription;
use App\Answerscriptdistribution;

class AnswerScriptController extends Controller
{
    public function answerScriptTaskpane(){
        $ses = Session::whereStatus('CURRENT')->first();
        $exms = Exam::all();
        $clss = Clss::all();
        $clssec = Clssec::all();

        return view('answerscripts.answerscripts')
        ->withExms($exms)
        ->withClss($clss)
        ->withClssec($clssec)
        ;
    }

    public function answerscriptDistribution($exam_id, $clss_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $exm = Exam::find($exam_id);
        $cls = Clss::find($clss_id);
        $clsecns = Clssec::where('Clss_id', $clss_id)->get();
        $clsubjs = Clssub::where('Clss_id', $clss_id)->get();
        $ansscrdists = Answerscriptdistribution::where('session_id', $ses->id)->get();
        $teachers = Teacher::all();

        $subjs = Subject::all();
                
        return view('answerscripts.answerscriptsView')
        ->withExm($exm)
        ->withCls($cls)
        ->withClsecns($clsecns)
        ->withClsubjs($clsubjs)
        ->withSubjs($subjs)
        ->withAnsscrdists($ansscrdists)
        ->withTeachers($teachers)
        ;
        
        
    }



    public function answerscriptDistributionAddSubject(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        // echo "Exam Id: ". Exam::where('name', $request->exTerm)->first()->id;
        // echo "Extp Id: ". Extype::where('name', $request->exTyype)->first()->id;
        // echo "Class Id:". Clss::where('name', $request->exClss)->first()->id;
        // echo "Section Id:". Section::where('name', $request->exSecn)->first()->id;
        // echo "Subject Id:". Subject::where('name', $request->exSubj)->first()->extype_id;
        // echo "Teacher Id: ". $request->exTeach;




        $ansscrdist = Answerscriptdistribution::firstOrNew([
        'session_id'    => $ses->id,
        'exam_id'       => Exam::where('name', $request->exTerm)->first()->id,
        'extype_id'     => Subject::where('name', $request->exSubj)->first()->extype_id,
        'clss_id'       => Clss::where('name', $request->exClss)->first()->id,
        'section_id'    => Section::where('name', $request->exSecn)->first()->id,
        'subject_id'    => Subject::where('name', $request->exSubj)->first()->id,        
        ]);
        $ansscrdist->teacher_id = $request->exTeach;
        $ansscrdist->save();
        // if($ansscrdist->wasRecentlyCreated){
        //     echo 'Created successfully';
        // } else {
        //         echo 'Already exist';
        // }
        // $ansscrdist->noscripted_rec = 
        // $ansscrdist->nostudent_pre =
        // $ansscrdist->issue_dt =
        // $ansscrdist->submt_dt =
        // $ansscrdist->finlz_dt =
        // $ansscrdist->status =
        // $ansscrdist->remark =

        // $ansscrdist->save();
        // return "answerscriptDistributionAddSubject";
        return back();
    }

    public function answerscriptClssSectionAllotment(Request $request, $exam_id, $extype_id){
        $ses = Session::whereStatus('CURRENT')->first();        
        $clss = Clss::all();

        $ansscdists = Answerscriptdistribution::where('session_id', $ses->id)
            ->where('exam_id', $exam_id)
            ->where('extype_id', $extype_id)
            // ->where('clss_id', 1)
            // ->where('section_id', 1)
            ->get()
            ;

        $ansscdists = Answerscriptdistribution::where('session_id', $ses->id)
                        ->where('exam_id', $exam_id)
                        ->where('extype_id', $extype_id)
                        ->get();

        $teacher = Teacher::all();

        $stdcrs = Studentcr::where('session_id', $ses->id)->get();


        return view('answerscripts.answerscriptClssSectionAllotment')
        ->with('clss', $clss)
        ->with('ansscdists', $ansscdists)
        ->with('teacher', $teacher)
        ->with('stdcrs', $stdcrs)
        ;
    }


    public function answerscriptTeacherAllotment(Request $request, $exam_id, $extype_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $teachers = Teacher::all();
        $clss = Clss::all();
        $ansscdist = Answerscriptdistribution::where('session_id', $ses->id)
                        ->where('exam_id', $exam_id)->where('extype_id',$extype_id)->get();
        $stdcrs = Studentcr::where('session_id', $ses->id)->get();
        
        $exam = Exam::find($exam_id);
        $extype = Extype::find($extype_id);


        return view('answerscripts.answerscriptTeacherAllotment')
            ->with('teachers', $teachers)
            ->with('clss', $clss)
            ->with('ansscdist', $ansscdist)
            ->with('stdcrs', $stdcrs)
            ->with('exam', $exam)
            ->with('extype', $extype)
            ;
    }

}
