<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
//use PDF;
use mPDF;

use App\School;
use App\Session;
use App\Exam;
use App\Extype;
use App\Clss;
use App\Subject;
use App\Section;
use App\Mode;

use App\Studentdb;
use App\Studentcr;
use App\Miscoption;
use App\Promotionalrule;

use App\Clssub;
use App\Clssec;
use App\Grade;
use App\Teacher;
use App\Clssteacher;
use App\Gradeparticular;
use App\Resultcr;


use App\Exmtypclssub;
use App\Marksentry;
use App\Extclssubfmpm;
use App\Exmtypmodcls;
use App\Exmtypmodclssub;
use App\Answerscriptdistribution;

class compactMarkRegisterController extends Controller
{
    public function clssecCompactMarkRegisterPDF(Request $request, $clssec_id, $is_pdf){
        $school = School::all()->first();
        $session = Session::whereStatus('CURRENT')->first();

        $clssec  = Clssec::find($clssec_id);
        $clssubs = Clssub::where('clss_id', $clssec->clss_id)->orderBy('subject_order')->get();

        $stdcrs = Studentcr::where('session_id', $session->id)
                    ->where('clss_id', $clssec->clss_id)
                    ->where('section_id', $clssec->section_id)
                    ->get();

        $exams = Exam::where('session_id', $session->id)->get();
        $modes = Mode::where('session_id', $session->id)->get();

        $stdmarks = Marksentry::where('session_id', $session->id)
                    ->where('clssec_id', $clssec->id)
                    //->whereIn('clssub_id', $clssubs->pluck('id'))
                    ->get();
        $extpmdclsbs = Exmtypmodclssub::where('session_id', $session->id)
                        ->where('clss_id', $clssec->clss_id)->get();
        //$modes = $extpmdclsbs->unique('mode_id')->pluck('mode_id');

        //dd($modes);

        $stdMarksArray = [];
        foreach($stdcrs as  $stdcr){
            $crstdmarks = $stdmarks->where('studentcr_id', $stdcr->id);
            
            $marks = [];
            foreach($extpmdclsbs as $extpmdclsb){
                $obmark = $crstdmarks->where('exmtypmodclssub_id', $extpmdclsb->id)->first();
                if($obmark != NULL) {
                    $marks[$extpmdclsb->id] = $obmark->marks;                 
                }
            }
            $stdMarksArray[$stdcr->id] = $marks;          
            //dd($stdMarksArray);
        }
        // dd($stdMarksArray);
        
        // $is_pdf = 1;
        if($is_pdf == 1 ){
            ini_set("pcre.backtrack_limit", "5000000");
            //$mpdf = new mPDF('c', 'A4-L'); 
            // return PDF::loadHTML('<h1>Hello World!</h1>')->stream('download.pdf');
            $pdf = mPDF::loadView('clssecCompactMarkRegister.compactMarkRegisterPDF', 
                    ['school' =>$school, 'session'=>$session, 'clssec'=>$clssec, 'clssubs'=>$clssubs,
                    'stdcrs' =>$stdcrs, 'exams' =>$exams, 'stdMarksArray'=>$stdMarksArray,
                    'extpmdclsbs'=>$extpmdclsbs, 'modes' => $modes, 'is_pdf' => $is_pdf 
                ],  [], ['format' => 'A4-L']);
            // $pdf->getMpdf();
            // $pdf->setPaper("a4");    
            // $pdf = PDF::loadHtml("<h1>Hello<h1>");
            // return $pdf->download('abc.pdf');
            // $pdf->SetDisplayMode('fullpage');
            
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            $pdffilename = 'MarkRegister'.'-';
            $pdffilename .= $session->name.'-';
            $pdffilename .= $clssec->clss->name.'-';
            $pdffilename .= $clssec->section->name.'.pdf';
            
            return $pdf->stream($pdffilename);
            //return $pdf->download($pdffilename);
    
        }else{
            return view('clssecCompactMarkRegister.compactMarkRegisterPDF')
            ->with('school', $school)        
            ->with('session', $session)
            ->with('clssec', $clssec)
            ->with('clssubs', $clssubs)
            ->with('stdcrs', $stdcrs)
            ->with('exams', $exams)
            ->with('stdMarksArray', $stdMarksArray)
            ->with('extpmdclsbs', $extpmdclsbs)
            ->with('modes', $modes)
            ->with('is_pdf', $is_pdf)
            ;
        }
    }
}
