<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http;
use DB;
use PDF;
use mPDF;

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
use App\ClssTeacher;

use App\Studentdb;
use App\Studentcr;
use App\Clssub;
use App\Clssec;

use App\Exmtypclssub;
use App\Exmtypmodclssub;
use App\Marksentry;
use App\Gradedescription;
use App\Answerscriptdistribution;

class AnswerScriptController extends Controller
{
    public function answerScriptTaskpane(){
        $ses = Session::whereStatus('CURRENT')->first();
        $exms = Exam::where('session_id', $ses->id)->get();
        $clss = Clss::where('session_id', $ses->id)->get();
        $clssec = Clssec::where('session_id', $ses->id)->get();

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




    public function answerscriptClssSectionStatus(Request $request, $exam_id, $extype_id, $is_pdf){
        $school = School::all()->first();
        $ses = Session::whereStatus('CURRENT')->first();        
        $clss = Clss::all();
        $exam = Exam::find($exam_id);
        $exams = Exam::where('session_id', $ses->id)->get();
        
        $ansscdists = Answerscriptdistribution::where('session_id', $ses->id)
                        //->where('exam_id', $exam_id)
                        ->where('extype_id', $extype_id)
                        ->get();

        $teacher = Teacher::all();

        $stdcrs = Studentcr::where('session_id', $ses->id)->get();



        if( $is_pdf == 1 ){
            $pdf = mPDF::loadView('answerscripts.answerscriptClssSectionStatusPDF', 
                ['school' =>$school, 'session'=>$ses, 'exam'=>$exam, 'exams'=>$exams, 'clss'=>$clss,
                'ansscdists'=>$ansscdists, 'teacher'=>$teacher, 'stdcrs'=>$stdcrs
                ]);
            // $strBNFont = TCPDF_FONTS::addTTFfont('./fonts/SolaimanLipi.ttf', 'TrueTypeUnicode', '', 32);
            // $pdf->SetFont($strBNFont, '', 8, '', 'false');
            //$pdf->setPaper("a4");        
            return $pdf->stream();


        }



        return view('answerscripts.answerscriptClssSectionStatus')
        ->with('clss', $clss)
        ->with('exam', $exam)
        ->with('exams', $exams)
        ->with('ansscdists', $ansscdists)
        ->with('teacher', $teacher)
        ->with('stdcrs', $stdcrs)
        ;
    }


    public function answerscriptClssSectionStatusForm(Request $request, $exam_id, $extype_id, $is_pdf){
        $school = School::all()->first();
        $ses = Session::whereStatus('CURRENT')->first();        
        $clss = Clss::all();
        $exam = Exam::find($exam_id);
        $exams = Exam::where('session_id', $ses->id)->get();
        
        $ansscdists = Answerscriptdistribution::where('session_id', $ses->id)
                        //->where('exam_id', $exam_id)
                        ->where('extype_id', $extype_id)
                        ->get();

        $teacher = Teacher::all();
        $classteachers = Clssteacher::where('session_id', $ses->id)
                            ->get();

        $stdcrs = Studentcr::where('session_id', $ses->id)->get();

        // NEW ENTRY
        $extpmdclsbs = Exmtypmodclssub::where('session_id', $ses->id)
                        ->where('extype_id', 1) //formative : 1
                        ->pluck('id');
        $formarksdetails = MarksEntry::where('session_id', $ses->id)
                ->whereIn('exmtypmodclssub_id', $extpmdclsbs)
                ->get();
        $formsubjs = Subject::where('session_id', $ses->id)
                ->where('extype_id', 1)->pluck('id');           //formative subjects only
        
        $clssecs = Clssec::where('session_id', $ses->id)->get();
        $clssubjs = Clssub::where('session_id', $ses->id)
                    ->whereIn('subject_id', $formsubjs)
                    ->get();
        // dd($clssubs);
        $formsubjs = Subject::where('session_id', $ses->id)
                ->where('extype_id', 1)->pluck('id');           //formative subjects only
        
        $formarkdetails = [];
        foreach($clssecs as $clssec){
            $formarkstatus = [];
            $clssubs = Clssub::where('session_id', $ses->id)
                    ->where('clss_id', $clssec->clss_id)
                    ->whereIn('subject_id', $formsubjs)
                    ->get();
            foreach($clssubs as $clssub){
                $formarksclsb = [];
                foreach($exams as $exam){
                    $etmcs_id = Exmtypmodclssub::where('session_id', $ses->id)
                                    ->where('exam_id', $exam->id)
                                    //->where('extype_id', 1)     // formative 
                                    //->where('mode_id', 1)       // oral
                                    ->where('clss_id', $clssec->clss_id)
                                    ->where('subject_id', $clssub->subject_id)
                                    ->first()->id;

                    
                    
                    // dd($etmcs_id);
                    $mrksTotal = $formarksdetails->where('exmtypmodclssub_id', $etmcs_id)
                                ->where('clssec_id', $clssec->id)
                                //->where('clssub_id', $clssub->id)
                                ->sum('marks')
                                ;
                    // dd($mrksTotal);
                    //dd( $formarksdetails->where('clssec_id', $clssec->id) );

                    $formarkstatus['clss_id']       = $clssec->clss_id;
                    $formarkstatus['section_id']    = $clssec->section_id;
                    $formarkstatus['exam_id']       = $exam->id;
                    $formarkstatus['extyype_id']    = 1;
                    $formarkstatus['mode_id']       = 1;
                    $formarkstatus['subject_id']    = $clssub->subject_id;

                    $formarkstatus['marks_total']    = $mrksTotal;
                    $str = $clssec->id .'-'. $clssub->id .'-'. $exam->id;

                    $formarkdetails[$str] = $formarkstatus;
                    $str2 = $clssec->clss->name .'-'. $clssec->section->name .'-'. $clssub->subject->code .'-'. $exam->name;
                    //echo $str2 .'='. $mrksTotal. "<br>";
                }
            }
            // $formarkdetails[$clssec->id] = $formarkstatus;
        }

        // dd($formarkdetails);


        if( $is_pdf == 1 ){
            $pdf = PDF::loadView('answerscripts.answerscriptClssSectionStatusFormPDF', 
                ['school' =>$school, 'session'=>$ses, 'exam'=>$exam, 'exams'=>$exams, 'clss'=>$clss,
                'ansscdists'=>$ansscdists, 'teacher'=>$teacher, 'stdcrs'=>$stdcrs
                ]);

            $pdf->setPaper("a4");        
            return $pdf->stream();
        }



        return view('answerscripts.answerscriptClssSectionStatusForm')
        ->with('session', $ses)
        ->with('clss', $clss)
        ->with('exam', $exam)
        ->with('exams', $exams)
        ->with('ansscdists', $ansscdists)
        ->with('teacher', $teacher)
        ->with('classteachers', $classteachers)
        ->with('stdcrs', $stdcrs)
        ->with('formarkdetails', $formarkdetails)
        ->with('clssubs', $clssubjs)
        ;
    }
}
