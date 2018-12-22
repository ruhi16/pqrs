<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http;
use DB;
use PDF;
use mPDF;
use Charts;
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
use App\Promotionalrule;

use App\Studentdb;
use App\Studentcr;
use App\Clssub;
use App\Clssec;

use App\Exmtypclssub;
use App\Exmtypmodclssub;
use App\Marksentry;
use App\Resultcr;
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


        $colors = array_keys( array_count_values($class_D) ); //array_keys(array('a'=>'red','b'=>'green','c'=>'blue'));;//array_keys($class_D);
            
        array_walk($colors, function (&$value, $key) {
            $value="$value-D";
        });
        // print_r($colors);
    
        $chart = Charts::create('donut', 'chartjs')
            ->title('My nice chart')            
            ->labels( $colors )            
            ->values(array_values(array_count_values($class_D) ) )
            ->dimensions(1000,500)
            ->responsive(false);

        // $chart = Charts::create('pie', 'morris')
            // ->title('My nice chart')
            // ->dimensions(0, 400) // Width x Height
            // This defines a preset of colors already done:)
            // ->template("material")
            // You could always set them manually
            // ->colors(['#2196F3', '#F44336', '#FFC107'])
            // Setup the diferent datasets (this is a multi chart)
            //->dataset('Element 1', [5,20,100])
            //->dataset('Element 2', [15,30,80])
            //->dataset('Element 3', [25,10,40])
            // Setup what the values mean
            // ->labels(['One', 'Two', 'Three'])
            // ->labels(['First', 'Second', 'Third'])
            // ->values([5,10,20])
            // ->dimensions(1000,500)
            // ->responsive(false)
        ;

        

        return view('clssecGrade.clssecGradeDstatus')
            ->with('chart', $chart)

            ->with('clssec', $clssec)
            ->with('class_subject_count', $class_subject_count)
            ->with('class_D',  array_count_values($class_D))
            // ->with('coll_class_data', $coll_class_data)
            ;
    }
    
    public function resultCrStatusRefresh(Request $request, $clssec_id){
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
        
        
        $extypes = Extype::where('session_id', $session->id)->get();
        foreach($extypes as  $extype){
            $class_regr_subjects = $clssubs->where('extype_id', $extype->id)->where('is_additional', 0)->where('combination_no', '=' , 0);

            $class_addl_subjects = $clssubs->where('extype_id', $extype->id)->where('is_additional', 0)->where('combination_no', '!=', 0);        
            $class_addl_subjects_groupBy = $class_addl_subjects->groupBy(function($q){ return $q->combination_no < 0 ? -$q->combination_no : $q->combination_no; });
            
            $class_total_subject_count = count($class_regr_subjects) + count($class_addl_subjects_groupBy);            
            // echo 'Extype:'. $extype->id.', Total Subj:'. $class_total_subject_count .'<br>';
        

            if( $class_total_subject_count > 0 ){
                    $clss_extp_subjs    = $clssubs->where('extype_id', $extype->id)->where('is_additional', 0)->where('combination_no','>=', 0)->pluck('subject_id'); // reg & comb subjects
                    $clss_extp_clsbs    = Clssub::whereIn('subject_id', $clss_extp_subjs)->pluck('id'); // clssub->id of reg & comb subjects
                    
                    $extp_promote_rule_ds = Promotionalrule::where('session_id', $session->id)->where('clss_id', $clss->id)->where('extype_id', $extype->id)->first()->allowableds;
                    // echo $extp_promote_rule_ds;



                    $clss_extp_subjs_fm = $extpmdclsbs->whereIn('subject_id', $clss_extp_subjs)->sum('fm');

                    $clss_extp_subjs_fm = $clss->id >= 5 ? $clss_extp_subjs_fm/2 : $clss_extp_subjs_fm; //for class IX
                    // $clss_extp_subjs_om = 0;
                    // echo 'FM: '.$clss_extp_subjs_fm.'<br>'; 

                    // $class_student_obt_D =[];   //**************************************** */
                    foreach($stdcrs as $stdcr){
                        // echo $stdcr->id.': ';
                        $marks_stdcr = $marks->where('studentcr_id', $stdcr->id);
                        $stdcr_subj_total_gr_count = 0;

                        $clss_extp_subjs_om = $marks_stdcr->where('marks', '>', 0)->whereIn('clssub_id', $clss_extp_clsbs)->sum('marks');
                        // echo $clss_extp_clsbs;
                        // echo 'Total OM: '. $clss_extp_subjs_om. '= ';
                        
                        
                        $clss_extp_subjs_om_manual = 0;
                        //for regular subjects
                        foreach($class_regr_subjects as $regr_subject){
                            // echo ' == '.$regr_subject->subject->name . ': ';
                            // echo ' == '.$regr_subject->subject->id . ': ';
                            $stdcr_subj_total_om = $marks_stdcr->where('clssub_id', $regr_subject->id)->where('marks', '>', 0)->sum('marks');
                            $stdcr_subj_total_fm = $extpmdclsbs->where('subject_id', $regr_subject->subject_id)->sum('fm');
                            $stdcr_subj_total_gr = getGrade(2, $stdcr_subj_total_om, $stdcr_subj_total_fm);
                            
                            // echo $stdcr_subj_total_om. '+ ';

                            //for class IX & Greater & other
                            $clss_extp_subjs_om_manual += $clss->id >= 5 ? round( (($stdcr_subj_total_om / $stdcr_subj_total_fm) * 100), 0) : $stdcr_subj_total_om;
                            
                            if($stdcr_subj_total_gr == 'D'){
                                $stdcr_subj_total_gr_count++;
                            }
                            // echo $stdcr_subj_total_om;                
                            // echo '/'. $stdcr_subj_total_fm;
                            // echo '>'. $stdcr_subj_total_gr;                
                        }
                        
                        //for additional & combined subjects
                        foreach($class_addl_subjects_groupBy as $addl_subject){
                            // $addl_subject->each(function($q){ 
                                //echo $q->subject->name.' '; 
                            // });
                            
                            $stdcr_subj_total_om = $marks_stdcr->whereIn('clssub_id' , $addl_subject->pluck('id'))->where('marks', '>', 0)->sum('marks');
                            $stdcr_subj_total_fm = $extpmdclsbs->whereIn('subject_id', $addl_subject->where('combination_no', '>', 0)->pluck('subject_id'))->sum('fm');
                            $stdcr_subj_total_gr = getGrade(2, $stdcr_subj_total_om, $stdcr_subj_total_fm);
                            
                            // echo $stdcr_subj_total_om. '(+) ';
                            
                            //for class IX & Greater & other
                            $clss_extp_subjs_om_manual += $clss->id >= 5 ? round( (($stdcr_subj_total_om / $stdcr_subj_total_fm) * 100), 0) : $stdcr_subj_total_om;

                            if($stdcr_subj_total_gr == 'D'){
                                $stdcr_subj_total_gr_count++;
                            }
                            // echo $stdcr_subj_total_om;                
                            // echo '/'. $stdcr_subj_total_fm;
                            // echo '>'. $stdcr_subj_total_gr;                
                        }

                    

                        // echo ': '. $stdcr_subj_total_gr_count;
                    
                        
                        // array_push($class_student_obt_D, $stdcr_subj_total_gr_count);
 
                        // echo " OM(manual): ".$clss_extp_subjs_om_manual;
                        // echo "<br>";


                        $stdcr_resultcr_update = Resultcr::firstOrNew(['studentcr_id'=>$stdcr->id, 'extype_id'=>$extype->id]);
                        
                        $stdcr_resultcr_update->session_id      = $session->id;
                        $stdcr_resultcr_update->clss_id         = $clss->id;
                        $stdcr_resultcr_update->section_id      = $section->id;
                        $stdcr_resultcr_update->studentcr_id    = $stdcr->id;
                        $stdcr_resultcr_update->extype_id       = $extype->id;
                        $stdcr_resultcr_update->fullmarks       = $clss_extp_subjs_fm;
                        $stdcr_resultcr_update->obtnmarks       = $clss_extp_subjs_om_manual; // clss_extp_subjs_om; //for IX & Others                        
                        $stdcr_resultcr_update->noofds          = $stdcr_subj_total_gr_count;
                        
                        // echo $stdcr_subj_total_gr_count ." <= ". $extp_promote_rule_ds; 

                        $stdcr_resultcr_update->results = $stdcr_subj_total_gr_count <= $extp_promote_rule_ds ? "Qualified" : "Not Qualified" ;
                        $stdcr_resultcr_update->save();
                        
                        
                        
                        $stdcr_indi = Studentcr::findOrFail($stdcr->id);                        
                        $stdcr_indi->result = "Promoted";
                        $stdcr_indi->save();

                        // echo "====>";
                        // echo $session->id;                  echo ', ';
                        // echo $clss->id;                     echo ', ';
                        // echo $section->id;                  echo ', ';
                        // echo $stdcr->id;                    echo ', ';
                        // echo $extype->id;                   echo ', ';
                        // echo $clss_extp_subjs_fm;           echo ', ';
                        // echo $clss_extp_subjs_om;           echo ', ';
                        // echo $stdcr_subj_total_gr_count;    echo ', ';
                        // echo "<=====<br>";
                        
                        
                    }   // end of studentcr

            }   // end of if, class_total_subject_count: existingness of summ or form

            // print_r(array_count_values($class_student_obt_D));

        }   // end of extypes



        return redirect()->back();    
    }



    public function clsGradeDStatus(Request $request, $clss_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $clss = Clss::find($clss_id);
        $resultcrs = Resultcr::where('clss_id', $clss->id)->get();
        // dd($resultcrs);
        foreach($resultcrs->groupBy('section_id') as $resultcrSections){
            foreach($resultcrSections as $resultcrSection){
                // echo $resultcrSection->noofds .'<br>';
            }
            $data = $resultcrSections->pluck('noofds');
            print_r(array_count_values($data));
            
            // echo $resultcr.'<br>';
        }
        
        echo 'testtest';

    }

    
}
