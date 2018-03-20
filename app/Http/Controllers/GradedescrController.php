<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http;
use DB;
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

use App\Studentdb;
use App\Studentcr;
use App\Clssub;
use App\Clssec;

use App\Exmtypclssub;
use App\Marksentry;
use App\Gradedescription;

class GradedescrController extends Controller
{
    public function gradedescr($extype_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $extps = Extype::all();
        $subjs = Subject::all();
        $grads = Grade::all();

        // echo "Hello";
        return view('gradedescriptions.gradedescription')
        ->with('extype_id',$extype_id)
        ->withExtps($extps)
        ->withSubjs($subjs)
        ->withGrads($grads)
        ;
    }

    public function gradedescriptionSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $extype_id = $request->extype;
        echo "extype_id:".$extype_id."<br>";
        
        Gradedescription::where('filename', $filename)->delete();
        $subjs = Subject::where('extype_id',$request->extype)->get();
        foreach($subjs as $sub){

            $temp = "descr".$extype_id.$sub->id;
            foreach($request->$temp as $k => $abc){
                echo $k ." : ".$abc ."<br>";
                $subj = Subject::find($sub->id);
                $grde = Grade::find($k);
                
                
                $grdsc = new Gradedescription;
                $grdsc->subject()->associate($subj);
                $grdsc->grade()->associate($grde);
                $grdsc->desc = $abc;

                $grdsc->save();
            }
            echo "--------------<br>";
        }


        // foreach($request->descr111 as $k => $abc){
        //     echo $k ." : ".$abc ."<br>";
        // }

    }










    public function gradedescrSubmit(Request $request){
        
        return back();
    }
    public function gradedescrView(){
        
        return view('gradedescriptions.gradedescriptionView');
    }
    public function gradedescrEditSubmit(Request $request){
        
        return back();
    }
    public function gradedescrDeltSubmit(Request $request){
        

        return back();
    }

}
