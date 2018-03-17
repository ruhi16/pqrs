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
use App\School;

use App\Studentdb;
use App\Studentcr;

use App\Clssub;
use App\Clssec;
use App\Grade;


use App\Exmtypclssub;
use App\Marksentry;

class ResultController extends Controller
{
    public function ResultTaskpane(Request $request, $clssec_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $clsc = Clssec::find($clssec_id);

        $clsbs = Clssub::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)->get();
        

        
        $stdcrs = Studentcr::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)
            ->whereSection_id($clsc->section_id)
            ->get();
        $exms = Exam::whereSession_id($ses->id)->get();
        $extp = Extype::whereSession_id($ses->id)->get();

       
        $extpclsbs = Exmtypclssub::whereSession_id($ses->id)
        ->whereClss_id($clsc->clss_id)        
        ->get();
        
        $grades = Grade::whereSession_id($ses->id)->get();
        

        
        return view('results.ResultTaskpane')
        ->withStdcrs($stdcrs)
        ->with('clssec_id', $clssec_id)
        ->withClsbs($clsbs)
        ->withExms($exms)
        ->withExtp($extp)
        ->withExtpclsbs($extpclsbs)
        ->withCls($clsc->clss->name)
        ->withSec($clsc->section->name)
        ;
    }

    public function ResultSheet(Request $request, $clssec_id, $studentcr_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $sch = School::find(1);       

        $exms = Exam::all();
        $exts = Extype::all()->sortBy('name');
        $clsc = Clssec::find($clssec_id);
        $clsb = Clssub::whereClss_id($clsc->clss_id)->get();
        $stcr = Studentcr::find($studentcr_id);
        
        $mrks = Marksentry::whereSession_id($ses->id)
            ->whereStudentcr_id($studentcr_id)->get();
        $etcs = Exmtypclssub::all();
        // print_r($clsc);
        
        return view('results.ResultSheet')
        ->withSch($sch)        
        ->withExms($exms)
        ->withexts($exts)
        ->withClsc($clsc)
        ->withClsb($clsb)
        ->withStcr($stcr)
        ->withMrks($mrks)
        ->withEtcs($etcs)
        ;
    }
    public function ResultSheetHTML($clssec_id, $studentcr_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $sch = School::find(1);       

        $exms = Exam::all();
        $exts = Extype::all()->sortBy('name');
        $clsc = Clssec::find($clssec_id);
        $clsb = Clssub::whereClss_id($clsc->clss_id)->get();
        $stcr = Studentcr::find($studentcr_id);
        
        $mrks = Marksentry::whereSession_id($ses->id)
            ->whereStudentcr_id($studentcr_id)->get();
        $etcs = Exmtypclssub::all();
        // print_r($clsc);
        

        


        return view('results.ResultSheetHTML')
        ->withSch($sch)        
        ->withExms($exms)
        ->withexts($exts)
        ->withClsc($clsc)
        ->withClsb($clsb)
        ->withStcr($stcr)
        ->withMrks($mrks)
        ->withEtcs($etcs)
        ;
    }
}
