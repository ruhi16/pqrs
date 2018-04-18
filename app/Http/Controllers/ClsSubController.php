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

class ClsSubController extends Controller
{
    public function clssub(){
        $sessions = Session::all();               
        $clss  = Clss::all();
        $subjs = Subject::all();
        $clssubs = Clssub::all();
        $extps = Extype::all();

        return view('clssub')
        ->with('sessions', $sessions)        
        ->with('clss', $clss)
        ->with('subjs', $subjs)
        ->with('clssubs', $clssubs)
        ->with('extps', $extps)
        ;

    }
    public function clssubSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        //each array index(key) holds clss_id - subject_id
        // print_r($request->clssub);
        // echo "===><br>";
        

        $opts = $request->clssub;
        $arrK = []; //to store clss_id in each index
        if($opts != Null){
            foreach($opts as $opt){
                $ar = explode('-', $opt);
                array_push($arrK, $ar[0]);
            }
            // echo "<br>:::";
            // print_r($arrK);
            // echo ":::<br>";

            Clssub::truncate();
            
            //to store unique class_id only
            $arrUK = array_unique($arrK);
            
            $arrFN =[];
            foreach($arrUK as $aUK){//for each clss_id
                $temp = [];
                foreach($opts as $opt){//for each clss_id & subject_id combination
                    $ar = explode('-', $opt);
                    if($aUK == $ar[0]){
                        $temp[$ar[1]] = ['session_id'=>$ses->id];
                    }
                }
                $final[$aUK] = $temp;
            }

            foreach($final as $ky => $fn){
                // echo "<br>";
                // echo "Key:". $ky;
                // echo "Value:"; 
                
                // print_r($fn);
                // echo "<br>";
                $cls = Clss::find($ky);                
                // echo "<br>:::";
                // print_r($fn);
                // echo ":::<br>";

                $cls->subjects()->sync($fn);
            }
        }// end of if
        

        return redirect()->to('clssubs-view');
    }
    public function clssubView(){
        $sessions = Session::all();//$ses = Session::whereStatus('CURRENT')->first();
        $clssubs = Clssub::all();
        $clss  = Clss::all();
        $subjects = Subject::all();
        $extps = Extype::all();


        return view('clssubView')
        ->with('sessions', $sessions) 
        ->with('clssubs', $clssubs) 
        ->with('clss', $clss) 
        ->with('extps', $extps)
        ->with('subjects', $subjects) 
        ;
    }

    public function viewModalSubmit(Request $request){
        $clsbids = explode('-', $request->clss);
        // $xx = Clssub::find($clsbids)->update(['combination_no', 0]);
        //print_r($clsbids);
        foreach($clsbids as $clsbid){
            $clsb = Clssub::find($clsbid);
            $clsb->combination_no = 0;
            $clsb->save();
        }

        if($request->subj){
            
            $maxCombNo = Clssub::max('combination_no');//orderBy('combination_no', 'DESC')->first()->combination_no;
            //echo "MAX ID:". $max;
            foreach($request->subj as $reqSubj){                
                $subject = Clssub::find($reqSubj);
                $subject->combination_no = ( $maxCombNo == 0 ? 1 : ($maxCombNo+1) );
                $subject->save();
            }
        }   
        return back();
    }

    public function viewModalSubmitAjax(Request $request){
        //$subj = Subject::find($request['sid']);
        $subject = Subject::find($request['sid']);
        $subjects = Subject::where('extype_id', $subject->extype_id)
            ->select('id')->get();


        $clssub = Clssub::where('clss_id', $request['cid'])
            ->where('subject_id', $request['sid'])
            ->first();
        $clssubs = Clssub::where('clss_id', $request['cid'])
            ->where('combination_no', $clssub->combination_no)            
            ->whereIn('subject_id', $subjects)
            ->get();

                
        $status = False;
        if($clssub->combination_no != 0){
            $status = True;
        }
        foreach($clssubs as &$clssub){
            $clssub['name'] = $clssub->subject->name;
        
            if($clssub->combination_no != 0){
                $clssub['status'] = 'checked';
            }else{
                $clssub['status'] = '';
            }
            
        }
                
        $jsonclssubs = json_encode($clssubs);
        return response()->json($jsonclssubs);
        
        //return response()->json( ['sid'=> 'Ex:'. $str ]);
    }
}
