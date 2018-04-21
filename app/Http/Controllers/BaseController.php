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

use App\Subjfullmark;
use App\Exmtypclssub;
use App\Marksentry;

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
                    
                    $etcs->fm           = ($request->$strFms[0] != NULL?$request->$strFms[0]:0);
                    $etcs->pm           = 0;
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
