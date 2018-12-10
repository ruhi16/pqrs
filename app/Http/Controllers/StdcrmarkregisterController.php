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
use App\Mode;

use App\Studentdb;
use App\Studentcr;
use App\Resultcr;

use App\Clssub;
use App\Clssec;
use App\Grade;
use App\Teacher;
use App\Clssteacher;


use App\Exmtypclssub;
use App\Marksentry;
use App\Extclssubfmpm;
use App\Exmtypmodcls;
use App\Exmtypmodclssub;
use App\Answerscriptdistribution;


class StdcrmarkregisterController extends Controller
{
    // public function clssecStdcrMarkRefreshget(Request $request, $studentcr_id, $clss_id, $section_id){

    //     echo $studentcr_id;

    //     return " Hello get";
    // }


    public function clssecStdcrMarkRefreshpost(Request $request, $studentcr_id, $clss_id, $section_id){
        $ses = Session::whereStatus('CURRENT')->first();
        
        foreach($request['extype_id'] as $k => $extp_id){
        
            $resultcr = Resultcr::firstOrNew([
                'session_id'    =>  $ses->id,
                'clss_id'       =>  $clss_id,
                'section_id'    =>  $section_id,
                'studentcr_id'  =>  $studentcr_id,
                'extype_id'     =>  $extp_id,
            ]);
            //dd($resultcr);
            //$resultcr->extype_id = $extp_id;
            
            $fulMark = 'fm'.$extp_id;
            $resultcr->fullmarks    =   $request[$fulMark][0];

            $obtMark = 'om'.$extp_id;
            $resultcr->obtnmarks    =   $request[$obtMark][0];

            $noofds = 'ds'.$extp_id;
            $resultcr->noofds    =   $request[$noofds][0];
            
            $result = 'rs'.$extp_id;
            $resultcr->results    =   $request[$result][0];

            $status = 'rs'.$extp_id;
            $resultcr->status = $request[$status][0];
            
            
            $resultcr->save();
            //echo "resultcr Done";
        }


        $stdcr = Studentcr::findOrFail($studentcr_id);
        
        $strFnPrOp = "fnprop".$studentcr_id;
        $stdcr->result = $request->$strFnPrOp ;

        $strDescrip = "descrip".$studentcr_id;
        $stdcr->description = $request->$strDescrip;

        $stdcr->save();

        //echo ", studentcr done";
        return back();
    }
}
