<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http;
use DB;
use PDF;
use mPDF;
// use Charts;
// use App\Charts\SampleChart;
// use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Charts\SampleChart;

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

    public function clssecGradeDStatus(Request $request, $clssec_id){
        $school  = School::find(1);
        $session = Session::whereStatus('CURRENT')->first();

        $clssec  = Clssec::find($clssec_id);
        $clss    = Clss::find($clssec->clss_id);
        $section = Section::find($clssec->section_id);
        
        $clssubs = Clssub::where('clss_id', $clss->id)->get();
        
        $stdcrs = Studentcr::where('session_id', $session->id)
                                ->where('clss_id', $clss->id)
                                ->where('section_id', $section->id)->get();

        $extpmdclsbs = Exmtypmodclssub::where('session_id', $session->id)
                            ->where('clss_id', $clss->id)
                            ->get();

        $marks = Marksentry::where('session_id', $session->id)
                                ->where('clssec_id', $clssec->id)
                                ->get();

        $class_subject_count = Clssub::where('clss_id', $clss->id)->where('extype_id', 2)->where('is_additional', 0)->where('combination_no',0)->count()
                                + count( Clssub::where('clss_id', $clss->id)->where('extype_id', 2)->where('is_additional', 0)->where('combination_no', '>', 0)->groupBy('combination_no')->get() );        

        $class_data = [];
        $class_D = [];
        foreach($stdcrs as  $stdcr){
            $stdcr_marks = $marks->where('studentcr_id', $stdcr->id);

            $extype_GrD_count = 0;
            $clssubs_extype_regular = $clssubs->where('extype_id', 2)->where('combination_no','=', 0);
            foreach($clssubs_extype_regular as $clssub){

                $etmcs_ids = $extpmdclsbs->where('subject_id', $clssub->subject_id)->pluck('id');

                $marks_obt = $stdcr_marks->whereIn('exmtypmodclssub_id', $etmcs_ids)
                                    ->where('marks', '>', 0)
                                    ->sum('marks');                                    

                $clssub_fm = $extpmdclsbs->where('subject_id', $clssub->subject_id)->sum('fm');
                
                // echo $clssub_fm .'<br>';

                $Grade_status = getGrade($clssub->subject->extype_id, $marks_obt, $clssub_fm);
                if( $Grade_status == 'D' ){
                    $extype_GrD_count++;
                }

            }
            



            $clssubs_extype_comb_addl = $clssubs->where('extype_id', 2)
                                            ->where('is_additional', 0)
                                            ->where('combination_no','!=', 0)
                                            ->groupBy(function($query){
                return $query->combination_no < 0 ? -$query->combination_no : $query->combination_no;
            });
            // dd($clssubs_extype_comb_addl);
            foreach($clssubs_extype_comb_addl as $clssub){
                // $clssub->each(function ($item) {                 
                //     echo $item;
                // });
                $comb_subj_ids = $clssub->where('extype_id', 2);    //->where('combination_no','>', 0)->pluck('subject_id');
                $comb_subj_fms = $extpmdclsbs->whereIn('subject_id', $comb_subj_ids->where('combination_no','>', 0)->pluck('subject_id'))->sum('fm');

                $comb_subj_oms = $marks->where('studentcr_id', $stdcr->id)
                                        ->whereIn('exmtypmodclssub_id', $extpmdclsbs->whereIn('subject_id', $comb_subj_ids->pluck('subject_id'))->pluck('id') )
                                        ->where('marks', '>', 0)->sum('marks');

                
                // echo $comb_subj_ids->pluck('subject_id') .'-'. $comb_subj_oms.'-' . $comb_subj_fms .'-'. getGrade(2,$comb_subj_oms, $comb_subj_fms ).'<br>';
                $Grade_status = getGrade(2, $comb_subj_oms, $comb_subj_fms );
                if( $Grade_status == 'D' ){
                    $extype_GrD_count++;
                }
            }           

            // $data['session']    = $session->id;
            // $data['clss']       = $clss->name;
            // $data['section']    = $section->name;
            // $data['stdcr_id']   = $stdcr->id;
            // $data['stdcr_name'] = $stdcr->studentdb->name;
            // $data['total_D']    = $extype_GrD_count;

            // $class_data[$stdcr->id] = new \Illuminate\Support\Collection($data);
            
            array_push($class_D, $extype_GrD_count);
        }

        // Convert array to collection
        // $coll_class_data = new \Illuminate\Support\Collection($class_data);

        // dd($coll_class_data);
        // foreach($class_data as $test){
        //     echo $test['clss'] .'-'.$test['total_D'].'<br>';
        // }
        //echo $class_data[5]['total_D'];
        // print_r( array_count_values($class_D) );
        // $chart = Charts::new('line', 'highcharts');

        $chart = new SampleChart;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
        $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);
        // ->options([
        //     'color' => '#ff0000',
        // ]);

        // $chart = Charts::create('pie', 'highcharts')
        //     ->title('My nice chart')
        //     ->labels(['First', 'Second', 'Third'])
        //     ->values([5,10,20])
        //     ->dimensions(1000,500)
        //     ->responsive(false);


        return view('clssecGrade.clssecGradeDstatus')
            ->with('chart', $chart)

            ->with('clssec', $clssec)
            ->with('class_subject_count', $class_subject_count)
            ->with('class_D',  array_count_values($class_D))
            // ->with('coll_class_data', $coll_class_data)
            ;
    }




}
