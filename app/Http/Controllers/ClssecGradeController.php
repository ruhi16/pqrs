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

class ClssecGradeController extends Controller
{
    public function clssecGradeStatus(Request $request, $clss_id){
        $school  = School::find(1);
        $session = Session::whereStatus('CURRENT')->first();        
        $clsses  = Clss::where('session_id', $session->id)
                            ->where('id', $clss_id)->get();        /**************** */
        $exams   = Exam::where('session_id', $session->id)->get();

        $grades  = Grade:: where('session_id', $session->id)
                            ->where('extype_id', 1)->get();         /***** 1: 4 pont Grade; 2: 7 point Grade */
            // for 4 point Grade-Count, formative: extype = 1
        $stdcrs = Studentcr::where('session_id', $session->id)->get();

        $clssec_ids = Clssec::where('clss_id', $clsses->first()->id)->pluck('id');
        //dd($clssec_ids);
        $extpmdclsbs = Exmtypmodclssub::where('session_id', $session->id)
                                ->where('clss_id', $clss_id)->get();   /********** */

        $marks = Marksentry::where('session_id', $session->id)
                                ->whereIn('clssec_id', $clssec_ids)
                                ->get();
        // dd($extpmdclsbs);
        $clssubs = Clssub::where('session_id', $session->id)->get();
        $is_pdf = 0;
        if($is_pdf == 1){            
            $pdf = mPDF::loadView('clssecGrade.clssecGradeStatusPDF', 
                [ 
                'school'    =>  $school,
                'session'   => $session,
                'clsses'    =>  $clsses,
                'exams'     =>   $exams,
                'grades'    =>  $grades,
                'stdcrs'    =>  $stdcrs,            
                'extpmdclsbs'=> $extpmdclsbs,
                'marks'     =>   $marks,
                'clssubs'   => $clssubs
                ]);
            
            return $pdf->stream();
            // return $pdf->download();
        }else{            
            return view ('clssecGrade.clssecGradeStatus')
                ->with('school',  $school)
                ->with('session', $session)
                ->with('clsses',  $clsses)
                ->with('exams',   $exams)
                ->with('grades',  $grades)
                ->with('stdcrs',  $stdcrs)            
                ->with('extpmdclsbs', $extpmdclsbs)
                ->with('marks',   $marks)
                ->with('clssubs', $clssubs)
                ;
        }

    }
}
