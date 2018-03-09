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

class BaseController extends Controller
{
    public function exmtypclssub(){
        $exams = Exam::all();
        $extps = Extype::all();
        $clss  = Clss::all();
        $etcss = Exmtypclssub::all();

        return view('exmtypclssub')
        ->with('exams', $exams)
        ->with('extps', $extps)
        ->with('clss', $clss)
        ->with('etcss', $etcss)
        ;
    }


    public function exmtypclssubSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $exams = Exam::all();
        $extps = Extype::all();
        $clss  = Clss::all();
        $subjs = Subject::all();

        
        // print_r($request->ab111);//exam-id, extype-id, cls-id
        $final = [];
        foreach($exams as $exam){
            foreach($extps as $extp){
                // $exmtyp = Exmtyp::where('exam_id', $exam->id)
                //                 ->where('extype_id', $extp->id)->first();
                // echo $exmtyp->id."<br>";
                foreach($clss as $cls){
                    // $exmtypcls = Exmtypcls::where('exmtyp_id', $exmtyp->id)
                    //                     ->where('clss_id', $cls->id)->first();
                    // echo "CLS:".$exmtypcls->id."<br>";
                    $name = "ab".$exam->id.$extp->id.$cls->id;
                    // echo "<br>";
                    // var_dump($request->$name);
                    
                    if($request->$name[0]){                        
                        if(array_key_exists('exam', $final)){
                            // echo "abcd";                        
                            // print_r($final);
                            $tempex = [];
                            $tempet = [];
                            $tempcl = [];
                            $tempvl = [];

                            $tempex = $final['exam'];
                            $tempet = $final['type'];
                            $tempcl = $final['clss'];
                            $tempvl = $final['val'];
                            
                            array_push($tempex, $exam->id);
                            array_push($tempet, $extp->id);
                            array_push($tempcl, $cls->id);
                            array_push($tempvl, $request->$name[0]);

                            $final['exam'] = $tempex;
                            $final['type'] = $tempet;
                            $final['clss'] = $tempcl;
                            $final['val']  = $tempvl;
                        }else{
                            // echo "pqrs";
                            $final['exam'] = [$exam->id];
                            $final['type'] = [$extp->id];
                            $final['clss'] = [$cls->id]; 
                            $final['val']  = [$request->$name[0]];
                            // print_r($final);
                        }
                        // echo "ex";
                    }else{
                        // echo "nex";
                    }//end of if                    
                    
                }
            }

        }// end of for
        // print_r($final);
        Exmtypclssub::truncate();
        for($i=0; $i<count($final['exam']); $i++){
            $etcs = new Exmtypclssub;
            $etcs->exam_id   = $final['exam'][$i];
            $etcs->extype_id = $final['type'][$i];
            $etcs->clss_id   = $final['clss'][$i];
            $etcs->fm        = $final['val'][$i];
            $etcs->session_id= $ses->id;
            $etcs->save();
        }



        return redirect()->to('exmtypclssub-view');
    }

    public function exmtypclssubView(){
        $exams = Exam::all();
        $extps = Extype::all();
        $clss  = Clss::all();
        $etcss = Exmtypclssub::all(); 

        return view('exmtypclssubView')
        ->with('etcss', $etcss)
        ->with('exams', $exams)
        ->with('extps', $extps)
        ->with('clss', $clss)
        ;
    }

    public function test(){
        $sessions = Session::all();
        $extypes = Extype::all();
        $exams = Exam::all();
        $clss  = Clss::al();


        return view('test')
        ->with('sessions', $sessions) 
        ->with('extypes', $extypes)
        ->with('exams', $exams)
        ->with('clss', $clss)
        ;
    }

    public function clssubjfm($clss_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $cls   = Clss::find($clss_id);
        $etcss = Exmtypclssub::all(); 
        $clsbs = Clssub::all();
        $exams = Exam::all();
        $etcss = Exmtypclssub::whereClss_id($clss_id)->get();

        // echo $clss->name;
        // foreach($clss as $c){
        //     echo $c->id;
        // }
        // var_dump($clss);

        return view('clssubjfm')
        ->withCls($cls)
        ->withExams($exams)
        ->withEtcss($etcss)
        ->withClsbs($clsbs)
        ->withEtcss($etcss)
        ;
    }    
    public function clssubjfmSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $exams = Exam::all();
        $extps = Extype::all();
        $clss  = Clss::all();

        $etcss = Exmtypclssub::whereClss_id($request->clsId)->get();
        $clsbs = Clssub::whereClss_id($request->clsId)->get();

        $etcss = Exmtypclssub::all();
        // echo "Cls Id:".$request->clsId;
        foreach($exams as $exm){
            foreach($extps as $ext){
                print_r($request->fm.$exm->id.$ext->id.$request->clsId);
                echo "<br>";
            }
        }
        
        print_r($request->fm111); //exam_id, extp_id, cls_id, subject_id
        // foreach($request->fm111 as $abc){
        //     echo $abc;
        // }
    }


}
