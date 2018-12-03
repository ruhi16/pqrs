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
            // ini_set("pcre.backtrack_limit", "5000000");         
            $pdf = mPDF::loadView('clssecGrade.clssecGradeStatusPDF', 
                [ 
                'school'    =>  $school,
                'session'   => $session,
                'clsses'    =>  $clsses,
                'exams'     =>   $exams,
                'grades'    =>  $grades,
                'stdcrs'    =>  $stdcrs,            
                'extpmdclsbs' => $extpmdclsbs,
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

    public function clssecGradeStatusPDF(Request $request, $clss_id){
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


        return view ('clssecGrade.clssecGradeStatusPDF')
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

    public function clssecGradeDStatus(Request $request, $clss_id, $section_id){
        $school  = School::find(1);
        $session = Session::whereStatus('CURRENT')->first();        
        $clss    = Clss::find($clss_id);
        $section = Section::find($section_id);
        $clssec = Clssec::where('clss_id', $clss->id)->where('section_id', $section->id)->first();
        $clssubs = Clssub::where('clss_id', $clss->id)->get();
        
        $stdcrs = Studentcr::where('session_id', $session->id)
                                ->where('clss_id', $clss_id)
                                ->where('section_id', $section_id)->get();
        $extpmdclsbs = Exmtypmodclssub::where('session_id', $session->id)
                            ->where('clss_id', $clss_id)
                            ->get();

        $marks = Marksentry::where('session_id', $session->id)
                                ->where('clssec_id', $clssec->id)
                                ->get();

        
        // calculate total obtained marks
        foreach($stdcrs as  $stdcr){
            echo $stdcr->studentdb->name ."<br>";


            $clssubs_extype_regular = $clssubs->where('extype_id', 2)->where('combination_no','=', 0);
            foreach($clssubs_extype_regular as $clssub){                
                echo $clssub->subject->code;
                $etmcs_ids = $extpmdclsbs->where('subject_id', $clssub->subject_id)->pluck('id');
                // echo $etmcs_ids;               

                $marks_obt = $marks->where('studentcr_id', $stdcr->id)
                                    ->whereIn('exmtypmodclssub_id', $etmcs_ids)
                                    ->where('marks', '>', 0)
                                    ->sum('marks');
                                    //->pluck('marks');
                echo '('.$marks_obt;

                $clssub_fm = $extpmdclsbs->where('subject_id', $clssub->subject_id)->sum('fm');

                echo ' / '. $clssub_fm .')- ';
                echo getGrade($clssub->subject->extype_id, $marks_obt, $clssub_fm);                        
                echo "<br>";                        
            }

            echo '<br>-----------------';
            $test_clssubs = $clssubs->where('extype_id', 2)->where('combination_no','!=', 0)->groupBy(function($query){
                return $query->combination_no < 0 ? -$query->combination_no : $query->combination_no;
            });
            foreach($test_clssubs as $clssub){  
                $clssub->each(function ($item) {    
                    echo $item->subject->code .'+'; 
                });

                $comb_subj_ids = $clssub->where('extype_id', 2)->where('combination_no','>', 0)->pluck('subject_id');
                $comb_subj_fms = $extpmdclsbs->whereIn('subject_id', $comb_subj_ids)->sum('fm');

                $comb_subj_oms = $marks->where('studentcr_id', $stdcr->id)
                                        ->whereIn('exmtypmodclssub_id', $extpmdclsbs->whereIn('subject_id', $comb_subj_ids)->pluck('id') )
                                        ->where('marks', '>', 0)->sum('marks');

                
                echo '<br>'.$comb_subj_ids .'-'. $comb_subj_oms.'-' . $comb_subj_fms .'-'. getGrade(2,$comb_subj_oms, $comb_subj_fms ).'<br>';
            }
            echo '-----------------<br>';
            // $clssubs_extype_cmad = $clssubs->where('extype_id', 2)->where('combination_no','!=', 0);
            // $clssubs_extype_cmad_subj_ids = $clssubs->where('extype_id', 2);//->where('combination_no','!=', 0)->pluck('subject_id');

            // $etmcs_cmad_ids = $extpmdclsbs->whereIn('subject_id', $clssubs_extype_cmad_subj_ids->where('combination_no','!=', 0)->pluck('subject_id') )
            //                             ->pluck('id');

            
            // $clssub_cmad_fm = $extpmdclsbs->where('session_id', $session->id)
            //                             ->where('clss_id', $clss_id)
            //                             ->whereIn('subject_id', $clssubs_extype_cmad_subj_ids->where('combination_no','>', 0)->pluck('subject_id') )
            //                             ->sum('fm');

            // foreach($clssubs_extype_cmad as $clssub){
                // echo $clssub->subject->code;
                // if( ! $loop->last ){
                    // echo '+';
                // }
            // }
            // $marks_cmad_obt = $marks->where('studentcr_id', $stdcr->id)
            //                                 ->whereIn('exmtypmodclssub_id', $etmcs_cmad_ids)
            //                                 ->where('marks', '>', 0)
            //                                 ->sum('marks');
            //echo $clssubs_extype_cmad_subj_ids;
            // echo $marks_cmad_obt . ' / ' . $clssub_cmad_fm;
            // echo getGrade(2, $marks_cmad_obt, $clssub_cmad_fm);  

            echo "<br>";
        }

        return view('clssecGrade.clssecGradeDstatus')

        ;

    }




}
