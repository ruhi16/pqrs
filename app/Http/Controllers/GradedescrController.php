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

        foreach($request->descr1 as $k => $abc){
            echo $k ." : ".$abc ."<br>";
        }

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
