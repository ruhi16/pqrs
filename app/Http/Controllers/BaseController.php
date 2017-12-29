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

use App\Clssub;
use App\Clssec;


use App\Exmtypclssub;

class BaseController extends Controller
{
    public function clssub(){
        $sessions = Session::all();               
        $clss  = Clss::all();
        $subjs = Subject::all();

        return view('clssub')
        ->with('sessions', $sessions)        
        ->with('clss', $clss)
        ->with('subjs', $subjs)
        ;

    }
    public function clssubSubmit(Request $request){
        print_r($request->clssub);
        $opts = $request->clssub;
        $arrK = [];
        if($opts != Null){
            foreach($opts as $opt){
                $ar = explode('-', $opt);
                array_push($arrK, $ar[0]);
            }
            Clssub::truncate();

            $arrUK = array_unique($arrK);
            $arrFN =[];
            foreach($arrUK as $aUK){
                $temp = [];
                foreach($opts as $opt){
                    $ar = explode('-', $opt);
                    if($aUK == $ar[0]){
                        $temp[$ar[1]] = ['session_id'=>10];
                    }
                }
                $final[$aUK] = $temp;
            }

            foreach($final as $ky => $fn){
                echo "<br>";
                echo "Key:". $ky;
                echo "Value:"; print_r($fn);
                
                $cls = Clss::find($ky);
                $cls->clssubs()->sync($fn);
            }
        }// end of if
        

        return view('clssubView');
    }
    public function clssubView(){
        $sessions = Session::all();
        $clssubs = Clssub::all();
        $clss  = Clss::all();
        $subjects = Subject::all();


        return view('clssubView')
        ->with('sessions', $sessions) 
        ->with('clssubs', $clssubs) 
        ->with('clss', $clss) 
        ->with('subjects', $subjects) 
        ;
    }


    public function clssec(){

        return view ('clssec');
    }

    public function clssecSubmit(Request $request){
        

    }

    public function clssecView(){
        $clssecs = Clssec::all();
        
        return view('clssecView')
        ->with('clssecs', $clssecs)
        ;
    }



    public function exmtypclssub(){
        $exams = Exam::all();
        $extps = Extype::all();
        $clss  = Clss::all();

        return view('exmtypclssub')
        ->with('exams', $exams)
        ->with('extps', $extps)
        ->with('clss', $clss)
        ;
    }


    public function exmtypclssubSubmit(Request $request){
        $sessions = Session::all();
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
        print_r($final);
        Exmtypclssub::truncate();
        for($i=0; $i<count($final['exam']); $i++){
            $etcs = new Exmtypclssub;
            $etcs->exam_id   = $final['exam'][$i];
            $etcs->extype_id = $final['type'][$i];
            $etcs->clss_id   = $final['clss'][$i];
            $etcs->fm        = $final['val'][$i];
            $etcs->session_id= 1;
            $etcs->save();
        }



        return view('exmtypclssubView');
    }

    public function exmtypclssubView(){
        $exams = Exam::all();
        $etcss = Exmtypclssub::all(); 

        return view('exmtypclssubView')
        ->with('etcss', $etcss)
        ->with('exams', $exams)
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
}
