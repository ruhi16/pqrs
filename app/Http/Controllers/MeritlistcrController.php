<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use mPDF;
use App\Session;
use App\Exam;
use App\Extype;
use App\Clss;
use App\Subject;
use App\Section;
use App\Teacher;
use App\School;

use App\Studentdb;
use App\Studentcr;
use App\Resultcr;


use App\Clssub;
use App\Clssec;

use App\Clssteacher;
use App\Exmtypclssub;
use App\Marksentry;

class MeritlistcrController extends Controller
{
    public function clssecStdcrMeritList(Request $request, $clssec_id, $is_pdf){
        $ses        = Session::whereStatus('CURRENT')->first();
        $school     = School::find(1);
        $clssec     = Clssec::find($clssec_id);
        $clss       = Clss::find($clssec->clss_id);
        $section    = Section::find($clssec->section_id);
        
        $resultcrs = Resultcr::where('session_id', $ses->id)
                                ->where('clss_id', $clss->id)
                                ->where('section_id', $section->id)
                                ->get();

        
        if($is_pdf == 1){               
            $pdf = mPDF::loadView('meritlistcrs.clssecStdcrMeritlist', 
                [   
                    'school'    => $school,
                    'resultcrs' => $resultcrs,
                    'clssec'    => $clssec,
                    'is_pdf'    => $is_pdf,
                ]);
            
            return $pdf->stream();
            // return $pdf->download();
        }




        // return redirect()->back();
        return view('meritlistcrs.clssecStdcrMeritlist')
            ->with('school', $school)
            ->with('resultcrs', $resultcrs)
            ->with('clssec', $clssec)
            ->with('is_pdf', $is_pdf)
        ;
    }


    public function clsStdcrMeritList(Request $request, $clss_id, $is_pdf){
        $ses        = Session::whereStatus('CURRENT')->first();
        //$clssec     = Clssec::find($clss_id);
        $clss       = Clss::find($clss_id);
        //$section    = Section::find($clssec->section_id);
        
        $resultcrs = Resultcr::where('session_id', $ses->id)
                                ->where('clss_id', $clss->id)
                                //->where('section_id', $section->id)
                                ->get();

        
        

        // return redirect()->back();
        return view('meritlistcrs.clsStdcrMeritlist')
            ->with('resultcrs', $resultcrs)
            ->with('is_pdf', $is_pdf)
        ;
    }
}
