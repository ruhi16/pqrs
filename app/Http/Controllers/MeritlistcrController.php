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
        $school     = School::where('session_id', $ses->id)->first();
        $clssec     = Clssec::find($clssec_id);
        $clss       = Clss::find($clssec->clss_id);
        $section    = Section::find($clssec->section_id);
        $extypes    = Extype::where('session_id', $ses->id)->get();
        
        $resultcrs = Resultcr::where('session_id', $ses->id)
                                ->where('clss_id', $clss->id)
                                ->where('section_id', $section->id)
                                ->get();

        
        if($is_pdf == 1){               
            $pdf = mPDF::loadView('meritlistcrs.clssecStdcrMeritlistPDF', 
                [   
                    'school'    => $school,
                    'resultcrs' => $resultcrs,
                    'clssec'    => $clssec,
                    'extypes'   => $extypes,
                    'session'   => $ses,
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
            ->with('extypes', $extypes)
            ->with('session', $ses)
            ->with('is_pdf', $is_pdf)
        ;
    }


    public function clsStdcrMeritList(Request $request, $clss_id, $is_pdf){
        $ses        = Session::whereStatus('CURRENT')->first();
        $school     = School::where('session_id', $ses->id)->first();
        //$clssec     = Clssec::find($clss_id);
        $clss       = Clss::find($clss_id);
        //$section    = Section::find($clssec->section_id);
        $extypes    = Extype::where('session_id', $ses->id)->get();
        
        $resultcrs = Resultcr::where('session_id', $ses->id)
                                ->where('clss_id', $clss->id)
                                //->where('section_id', $section->id)
                                ->get();

        if($is_pdf == 1){               
            $pdf = mPDF::loadView('meritlistcrs.clsStdcrMeritlistPDF', 
                [   
                    'school'    => $school,
                    'resultcrs' => $resultcrs,
                    'clss'      => $clss,
                    'extypes'   => $extypes,
                    'session'   => $ses,
                    'is_pdf'    => $is_pdf,
                ]);
            
            return $pdf->stream();
            // return $pdf->download();
        }
        

        // return redirect()->back();
        return view('meritlistcrs.clsStdcrMeritlist')
            ->with('school', $school)
            ->with('resultcrs', $resultcrs)
            ->with('clss', $clss)
            ->with('extypes', $extypes)
            ->with('session', $ses)
            ->with('is_pdf', $is_pdf)
        ;
    }
}
