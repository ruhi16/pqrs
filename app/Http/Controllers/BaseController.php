<?php

namespace App\Http\Controllers;

use DB;

use App\Exam;
use App\Mode;
use App\Clss; 
use App\Clssec;
use App\Clssub;
use App\Extype;
use App\Section;
use App\Session;

use App\Subject;
use App\Teacher;
use App\Subjteacher;
use App\Resultcr;
use App\Studentcr;

use App\Studentdb;
use App\Marksentry;

use App\Miscoption;
use App\Clssteacher;

use App\Grade;
use App\Gradeparticular;
use App\Gradedescription;


use App\Exmtypclssub;
use App\Exmtypmodcls;
use App\Exmtypmodclssub;
use App\Promotionalrule;
use Illuminate\Http\Request;

use App\Answerscriptdistribution;
use Illuminate\Database\Eloquent\Collection;

class BaseController extends Controller
{
    public function exmtypclssubTaskpane(){
        $ses = Session::whereStatus('CURRENT')->first();
        $clss  = Clss::whereSession_id($ses->id)->get();       


        return view('exmtypclssubs.exmtypclssubTaskpane')
            ->withClss($clss)            
            ;
    }



    public function exmtypclssubfmEntry($clss_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $cls   = Clss::find($clss_id);
        $etcss = Exmtypclssub::all(); 
        $clsbs = Clssub::all();
        $exams = Exam::all();
        $etcss = Exmtypclssub::whereClss_id($clss_id)->get();

        $flmrs = Subjfullmark::all();
        // dd($etcss);

        return view('exmtypclssubs.exmtypclssubfmEntry')
        ->withCls($cls)
        ->withExams($exams)
        ->withEtcss($etcss)
        ->withClsbs($clsbs)
        ->withFlmrs($flmrs)
        ;
    }



    public function exmtypclssubfmEntrySubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $exams = Exam::all();
        $extps = Extype::all();
        // ============================================================
        // $extps = Exmtypclssub::where('clss_id', $request->clsId)->groupBy('extype_id')->pluck('extype_id');
        // $extps = Extype::whereIn('id', $extps->toArray())->get();
        // ============================================================
        $clsbs = Clssub::whereClss_id($request->clsId)->get();
        
        //delete existing records of that class
        // Exmtypclssub::where('clss_id', $request->clsId)->delete();
        foreach($exams as $exm){
            foreach($extps  as $ext){
                $strSubs = "sb".$exm->id.$ext->id.$request->clsId;
                foreach($request->$strSubs as $sbId){
                    $strFms = "fm".$exm->id.$ext->id.$request->clsId.$sbId;                    
                    //$etcs = new Exmtypclssub;
                    $etcs = Exmtypclssub::firstOrNew([
                        'session_id'=>$ses->id,
                        'exam_id'   =>$exm->id,
                        'extype_id' =>$ext->id,
                        'clss_id'   =>$request->clsId,
                        'subject_id'=>$sbId,                       
                    ]);
                    
                    $etcs->fm   = ($request->$strFms[0] != NULL ? $request->$strFms[0] : 0);
                    $etcs->pm   = 0;
                    $etcs->save();
                    
                }
            }
        }
        return "Sucessfully Submitted!!!";
    }



    public function exmtypclssubfmView($clss_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $cls   = Clss::find($clss_id);
        $etcss = Exmtypclssub::all(); 
        $clsbs = Clssub::all();
        $exams = Exam::all();
        $etcss = Exmtypclssub::whereClss_id($clss_id)->get();

        $flmrs = Subjfullmark::all();
        // dd($etcss);

        return view('exmtypclssubs.exmtypclssubfmView')
        ->withCls($cls)
        ->withExams($exams)
        ->withEtcss($etcss)
        ->withClsbs($clsbs)
        ->withFlmrs($flmrs)
        ;
    }

    public function test(){        
        $data2 = Teacher::where('session_id', Session::where('status', 'CURRENT')->first()->id)
                            ->exclude(['id','created_at','updated_at'])
                            ->get();

        $data2->each(function ($item, $key) {
            $item['session_id'] = Session::where('status', 'CURRENT')->first()->next_session_id;           
        });
        
        foreach($data2 as $d){
            $subject = Teacher::firstOrNew($d->toArray());
            $subject->save();
            
        }

        $data = Teacher::where('session_id', Session::where('status', 'CURRENT')->first()->next_session_id)->get();
        
        return view('test')
            ->with('data', $data)
        // ->with('stdcrs', $stdcrs)
        // ->with('mrks', $mrks)
        // ->with('subjs', $subjs)
        ;
    }    

    public function testRoute($etmcs_id, $csec_id, $teacher_id){
        $ses = Session::whereStatus('CURRENT')->first();
        
        $etmcs = Exmtypmodclssub::find($etmcs_id);
        $clsc  = Clssec::find($csec_id);
        $teacher = Teacher::find($teacher_id);
        
        $anscdistTeacher = Answerscriptdistribution::where('session_id', $ses->id)
            ->where('clss_id',    $clsc->clss_id)
            ->where('section_id', $clsc->section_id)
            ->where('exam_id',    $etmcs->exam_id)
            ->where('extype_id',  $etmcs->extype_id)
            ->where('subject_id', $etmcs->subject_id)
            ->where('teacher_id', $teacher_id)
            ->first()
            ;


            $anscdistTeacher->finlz_dt = date('Y-m-d');
            $anscdistTeacher->save();
        // dd($anscdistTeacher);
        // return back();
        // echo "session_id:".  $anscdistTeacher ->session_id   ."<br>";
        // echo "clss_id   :".     $anscdistTeacher ->clss_id  ."<br>";
        // echo "section_id:".  $anscdistTeacher ->section_id."<br>";
        // echo "exam_id   :".     $anscdistTeacher ->exam_id."<br>";
        // echo "extype_id :".   $anscdistTeacher ->extype_id."<br>";
        // echo "teacher_id:".  $anscdistTeacher ->teacher_id."<br>";
        // echo "fnlz_dt:".  $anscdistTeacher ->finlz_dt."<br>";
        return back();
        // return $teacher_id."=".$etmcs."<br>".$clsc->clss->id."<br>".$teacher."<br>".$anscdistTeacher;
    }


    public function classPromotionalRulesEntry(Request $request, $clss_id){
        $ses = Session::whereStatus('CURRENT')->first();        
        $clss  = Clss::find($clss_id);

        $extps = Extype::where('session_id', $ses->id)->get();


        $clssubs = Clssub::whereClss_id($clss_id)->get();
        //echo $clssubs->first()->clss_id;
        $clssubexts = Clssub::where('clssubs.session_id', $ses->id)
                        ->where('clss_id', $clss_id)
                        ->join('subjects', 'clssubs.subject_id','=','subjects.id')
                        ->select('clssubs.id','clssubs.clss_id',
                        'clssubs.subject_id','clssubs.combination_no',
                        'subjects.extype_id')                       
                        ->get();
        
        $extpmdclsbs = Exmtypmodclssub::where('exmtypmodclssubs.session_id', $ses->id)
                            ->where('exmtypmodclssubs.clss_id', $clss_id)
                            ->join('clssubs', 'exmtypmodclssubs.subject_id', '=', 'clssubs.subject_id')
                            ->where('clssubs.clss_id', '=', $clss_id)
                            ->get();
       

        $extpmdcls = Exmtypmodcls::whereSession_id($ses->id)
                   ->whereClss_id($clss_id)->get();

        $clspromdetails = Promotionalrule::where('session_id', $ses->id)
                            ->where('clss_id', $clss_id)->get();

        return view('exmtypclssubs.classPromotionalRulesEntry')
            ->with('clss', $clss)
            ->with('extps', $extps)
            ->with('clssubs', $clssubs)            
            ->with('clssubexts', $clssubexts)
            ->with('extpmdclsbs', $extpmdclsbs)
            ->with('clspromdetails', $clspromdetails)
        ;
    }

    public function classPromotionalRulesEntrySubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();   
        $extps = Extype::where('session_id', $ses->id)->get();

        $clss = Clss::find($request->clss_id);
        foreach($extps as $extp){
            $clspromrule = Promotionalrule::firstOrNew(['session_id' => $ses->id,
                                    'clss_id' => $clss->id,
                                    'extype_id' => $extp->id]);
            $clspromrule->extype_id = $extp->id;
            
            $strS = $extp->name.'sno';
            $clspromrule->noofsubjs = $request->$strS;

            $strF = $extp->name.'sfm';
            $clspromrule->fullmarks = $request->$strF;

            $strD = $extp->name.'Ds';
            $clspromrule->allowableds = $request->$strD;            
            
            $clspromrule->description = '';
            $clspromrule->status = '';
            $clspromrule->remarks = '';

            //echo $clspromrule;
            $clspromrule->save();
       
        }


       return back();
    }   







// old methods
    // public function exmtypclssub(){
    //     $exams = Exam::all();
    //     $extps = Extype::all();
    //     $clss  = Clss::all();
    //     $etcss = Exmtypclssub::all();

    //     return view('exmtypclssubs.exmtypclssub')
    //     ->with('exams', $exams)
    //     ->with('extps', $extps)
    //     ->with('clss', $clss)
    //     ->with('etcss', $etcss)
    //     ;
    // }


    // public function exmtypclssubSubmit(Request $request){
    //     $ses = Session::whereStatus('CURRENT')->first();
    //     $exams = Exam::all();
    //     $extps = Extype::all();
    //     $clss  = Clss::all();
    //     $subjs = Subject::all();

        
    //     // print_r($request->ab111);//exam-id, extype-id, cls-id
    //     $final = [];
    //     foreach($exams as $exam){
    //         foreach($extps as $extp){
    //             // $exmtyp = Exmtyp::where('exam_id', $exam->id)
    //             //                 ->where('extype_id', $extp->id)->first();
    //             // echo $exmtyp->id."<br>";
    //             foreach($clss as $cls){
    //                 // $exmtypcls = Exmtypcls::where('exmtyp_id', $exmtyp->id)
    //                 //                     ->where('clss_id', $cls->id)->first();
    //                 // echo "CLS:".$exmtypcls->id."<br>";
    //                 $name = "ab".$exam->id.$extp->id.$cls->id;
    //                 // echo "<br>";
    //                 // var_dump($request->$name);
                    
    //                 if($request->$name[0]){                        
    //                     if(array_key_exists('exam', $final)){
    //                         // echo "abcd";                        
    //                         // print_r($final);
    //                         $tempex = [];
    //                         $tempet = [];
    //                         $tempcl = [];
    //                         $tempvl = [];

    //                         $tempex = $final['exam'];
    //                         $tempet = $final['type'];
    //                         $tempcl = $final['clss'];
    //                         $tempvl = $final['val'];
                            
    //                         array_push($tempex, $exam->id);
    //                         array_push($tempet, $extp->id);
    //                         array_push($tempcl, $cls->id);
    //                         array_push($tempvl, $request->$name[0]);

    //                         $final['exam'] = $tempex;
    //                         $final['type'] = $tempet;
    //                         $final['clss'] = $tempcl;
    //                         $final['val']  = $tempvl;
    //                     }else{
    //                         // echo "pqrs";
    //                         $final['exam'] = [$exam->id];
    //                         $final['type'] = [$extp->id];
    //                         $final['clss'] = [$cls->id]; 
    //                         $final['val']  = [$request->$name[0]];
    //                         // print_r($final);
    //                     }
    //                     // echo "ex";
    //                 }else{
    //                     // echo "nex";
    //                 }//end of if                    
                    
    //             }
    //         }

    //     }// end of for
    //     // print_r($final);
    //     //Exmtypclssub::truncate();
    //     for($i=0; $i<count($final['exam']); $i++){
    //         echo "xxx:". $final['exam'][$i];
    //         // $etcs = Exmtypclssub::firstOrNew([
    //         //     'exam_id'=>$final['exam'][$i],
    //         //     'extype_id'=>$final['type'][$i],
    //         //     'clss_id'=>$final['clss'][$i],
    //         //     'fm'=>$final['val'][$i],
    //         //     'session_id'=>$ses->id,
    //         // ]);
    //         //new Exmtypclssub;
    //         // $etcs->exam_id   = $final['exam'][$i];
    //         // $etcs->extype_id = $final['type'][$i];
    //         // $etcs->clss_id   = $final['clss'][$i];
    //         // $etcs->fm        = $final['val'][$i];
    //         // $etcs->session_id= $ses->id;
    //         // $etcs->save();
    //     }



    //     return redirect()->to('exmtypclssub-view');
    // }

    // public function exmtypclssubView(){
    //     $exams = Exam::all();
    //     $extps = Extype::all();
    //     $clss  = Clss::all();
    //     $etcss = Exmtypclssub::all(); 

    //     return view('exmtypclssubs.exmtypclssubView')
    //     ->with('etcss', $etcss)
    //     ->with('exams', $exams)
    //     ->with('extps', $extps)
    //     ->with('clss', $clss)
    //     ;
    // }

    // public function test(){
    //     $sessions = Session::all();
    //     $extypes = Extype::all();
    //     $exams = Exam::all();
    //     $clss  = Clss::al();


    //     return view('test')
    //     ->with('sessions', $sessions) 
    //     ->with('extypes', $extypes)
    //     ->with('exams', $exams)
    //     ->with('clss', $clss)
    //     ;
    // }
}
