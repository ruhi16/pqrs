<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fpdf;

use DB;
use PDF;
use DNS1D;

use App\Session;
use App\Exam;
use App\Extype;
use App\Clss;
use App\Subject;
use App\Section;
use App\School;
use App\Mode;

use App\Studentdb;
use App\Studentcr;

use App\Clssub;
use App\Clssec;
use App\Grade;
use App\Gradeparticular;


use App\Exmtypclssub;
use App\Exmtypmodcls;
use App\Exmtypmodclssub;
use App\Marksentry;
use App\Gradedescription;
use App\Extclssubfmpm;


class ResultcrController extends Controller
{
    public function clssecResultSheetv3($clssec_id, $studentcr_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $school = School::find(1);
        $clsc = Clssec::find($clssec_id);
        $clssubs = DB::table('clssubs')->where('clssubs.session_id', $ses->id)
            ->where('clss_id', $clsc->clss_id)
            ->join('subjects', 'subjects.id', '=', 'clssubs.subject_id')
            //->select()
            ->get();
        //dd($clssubs);

        $studentcrs = Studentcr::whereSession_id($ses->id)
                        ->where('clss_id', $clsc->clss_id)
                        ->where('section_id', $clsc->section_id)
                        ->where('id', $studentcr_id)
                        ->get();

        $marks = Marksentry::whereSession_id($ses->id)
                    ->whereIn('studentcr_id', $studentcrs->pluck('id'))
                    ->orderBy('studentcr_id')
                    ->get();

                    
        $exams = Exam::whereSession_id($ses->id)->get();
        $extypes = Extype::whereSession_id($ses->id)->get();
        $extpmdclsbs = Exmtypmodclssub::whereSession_id($ses->id)
                        ->where('clss_id', $clsc->clss_id)
                        ->get();
        $grades = Grade::whereSession_id($ses->id)->get();
        $gradeparticular = Gradeparticular::whereSession_id($ses->id)->get();
        $modes = Mode::whereSession_id($ses->id)->get();
        $subjects = Subject::whereSession_id($ses->id)->get();
        // echo DNS1D::getBarcodeHTML("4445645656", "PHARMA2T");
        // echo DNS1D::getBarcodePNGPath("4445645656", "PHARMA2T");
        // echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("20180504029", "C39+") . '" alt="barcode"   />';
        // echo DNS1D::getBarcodeHTML("4445645656", "PHARMA2T",3,33,"green", true);
        // echo '<img src="' . DNS1D::getBarcodePNG("4", "C39+",3,33,array(1,1,1), true) . '" alt="barcode"   />';
        // echo DNS1D::getBarcodePNGPath("4445645656", "PHARMA2T",3,33,array(255,255,0), true);
        // echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("2018", "C39+",3,33,array(1,1,1), true) . '" alt="barcode"   />';
    
    return view('resultcrs.clssecResultSheetv3')
            ->with('session', $ses)
            ->with('school', $school)
            ->with('clssecMarks', $marks->sortBy('studentcr_id'))
            ->with('studentcrs', $studentcrs->sortBy('studentdb_id'))
            ->with('clssubs',$clssubs)
            ->with('exams',$exams)
            ->with('extypes',$extypes)
            ->with('extpmdclsbs', $extpmdclsbs)
            ->with('grades', $grades)
            ->with('gradeparticular', $gradeparticular)
            ->with('modes', $modes)
            ->with('subjects', $subjects)
            ;
    }


    public function clssecResultSheetv3PDF($clssec_id, $studentcr_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $school = School::find(1);
        $clsc = Clssec::find($clssec_id);
        $clssubs = DB::table('clssubs')->where('clssubs.session_id', $ses->id)
            ->where('clss_id', $clsc->clss_id)
            ->join('subjects', 'subjects.id', '=', 'clssubs.subject_id')
            //->select()
            ->get();
        //dd($clssubs);

        $studentcrs = Studentcr::whereSession_id($ses->id)
                        ->where('clss_id', $clsc->clss_id)
                        ->where('section_id', $clsc->section_id)
                        ->where('id', $studentcr_id)
                        ->get();

        $marks = Marksentry::whereSession_id($ses->id)
                    ->whereIn('studentcr_id', $studentcrs->pluck('id'))
                    ->orderBy('studentcr_id')
                    ->get();

                    
        $exams = Exam::whereSession_id($ses->id)->get();
        $extypes = Extype::whereSession_id($ses->id)->get();
        $extpmdclsbs = Exmtypmodclssub::whereSession_id($ses->id)
                        ->where('clss_id', $clsc->clss_id)
                        ->get();
        $grades = Grade::whereSession_id($ses->id)->get();
        $gradeparticular = Gradeparticular::whereSession_id($ses->id)->get();
        $modes = Mode::whereSession_id($ses->id)->get();
        $subjects = Subject::whereSession_id($ses->id)->get();


        $pdf = PDF::loadView('resultcrs.clssecResultSheetv3PDF', 
            [ 
                'session'=>$ses,   
                'school'=>$school,  
                'clssecMarks' => $marks->sortBy('studentcr_id'),
                'studentcrs'=> $studentcrs->sortBy('studentdb_id'),
                'clssubs' => $clssubs,
                'exams' => $exams,
                'extypes' => $extypes,
                'extpmdclsbs' => $extpmdclsbs,
                'grades' => $grades,
                'gradeparticular' => $gradeparticular,
                'modes' => $modes,
                'subjects'=> $subjects,
            ], [], [ ]);

        $pdffilename = 'MarkSheet'.'-';
        $pdffilename .= $ses->name.'-';
        $pdffilename .= $studentcrs->first()->clss->name.'-';
        $pdffilename .= $studentcrs->first()->section->name.'-';
        $pdffilename .= $studentcrs->first()->roll_no.'-';
        $pdffilename .= $studentcrs->first()->studentdb->name.'.pdf';
        return $pdf->stream($pdffilename);
        //return $pdf->download($pdffilename);

        // return view('resultcrs.clssecResultSheetv3PDF')
        //     ->with('session', $ses)
        //     ->with('school', $school)
        //     ->with('clssecMarks', $marks->sortBy('studentcr_id'))
        //     ->with('studentcrs', $studentcrs->sortBy('studentdb_id'))
        //     ->with('clssubs',$clssubs)
        //     ->with('exams',$exams)
        //     ->with('extypes',$extypes)
        //     ->with('extpmdclsbs', $extpmdclsbs)
        //     ->with('grades', $grades)
        //     ->with('gradeparticular', $gradeparticular)
        //     ->with('modes', $modes)
        //     ->with('subjects', $subjects)
        //     ;
    }


}




// https://packagist.org/packages/milon/barcode

// generator in html, png embedded base64 code and SVG canvas

// echo DNS1D::getBarcodeSVG("4445645656", "PHARMA2T");
// echo DNS1D::getBarcodeHTML("4445645656", "PHARMA2T");
// echo '<img src="data:image/png,' . DNS1D::getBarcodePNG("4", "C39+") . '" alt="barcode"   />';
// echo DNS1D::getBarcodePNGPath("4445645656", "PHARMA2T");
// echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4", "C39+") . '" alt="barcode"   />';
// echo DNS1D::getBarcodeSVG("4445645656", "C39");
// echo DNS2D::getBarcodeHTML("4445645656", "QRCODE");
// echo DNS2D::getBarcodePNGPath("4445645656", "PDF417");
// echo DNS2D::getBarcodeSVG("4445645656", "DATAMATRIX");
// echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG("4", "PDF417") . '" alt="barcode"   />';
// Width and Height example
// echo DNS1D::getBarcodeSVG("4445645656", "PHARMA2T",3,33);
// echo DNS1D::getBarcodeHTML("4445645656", "PHARMA2T",3,33);
// echo '<img src="' . DNS1D::getBarcodePNG("4", "C39+",3,33) . '" alt="barcode"   />';
// echo DNS1D::getBarcodePNGPath("4445645656", "PHARMA2T",3,33);
// echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4", "C39+",3,33) . '" alt="barcode"   />';
// Color
// echo DNS1D::getBarcodeSVG("4445645656", "PHARMA2T",3,33,"green");
// echo DNS1D::getBarcodeHTML("4445645656", "PHARMA2T",3,33,"green");
// echo '<img src="' . DNS1D::getBarcodePNG("4", "C39+",3,33,array(1,1,1)) . '" alt="barcode"   />';
// echo DNS1D::getBarcodePNGPath("4445645656", "PHARMA2T",3,33,array(255,255,0));
// echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4", "C39+",3,33,array(1,1,1)) . '" alt="barcode"   />';
// Show Text
// echo DNS1D::getBarcodeSVG("4445645656", "PHARMA2T",3,33,"green", true);
// echo DNS1D::getBarcodeHTML("4445645656", "PHARMA2T",3,33,"green", true);
// echo '<img src="' . DNS1D::getBarcodePNG("4", "C39+",3,33,array(1,1,1), true) . '" alt="barcode"   />';
// echo DNS1D::getBarcodePNGPath("4445645656", "PHARMA2T",3,33,array(255,255,0), true);
// echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4", "C39+",3,33,array(1,1,1), true) . '" alt="barcode"   />';
// 2D Barcodes
// echo DNS2D::getBarcodeHTML("4445645656", "QRCODE");
// echo DNS2D::getBarcodePNGPath("4445645656", "PDF417");
// echo DNS2D::getBarcodeSVG("4445645656", "DATAMATRIX");
// 1D Barcodes
// echo DNS1D::getBarcodeHTML("4445645656", "C39");
// echo DNS1D::getBarcodeHTML("4445645656", "C39+");
// echo DNS1D::getBarcodeHTML("4445645656", "C39E");
// echo DNS1D::getBarcodeHTML("4445645656", "C39E+");
// echo DNS1D::getBarcodeHTML("4445645656", "C93");
// echo DNS1D::getBarcodeHTML("4445645656", "S25");
// echo DNS1D::getBarcodeHTML("4445645656", "S25+");
// echo DNS1D::getBarcodeHTML("4445645656", "I25");
// echo DNS1D::getBarcodeHTML("4445645656", "I25+");
// echo DNS1D::getBarcodeHTML("4445645656", "C128");
// echo DNS1D::getBarcodeHTML("4445645656", "C128A");
// echo DNS1D::getBarcodeHTML("4445645656", "C128B");
// echo DNS1D::getBarcodeHTML("4445645656", "C128C");
// echo DNS1D::getBarcodeHTML("44455656", "EAN2");
// echo DNS1D::getBarcodeHTML("4445656", "EAN5");
// echo DNS1D::getBarcodeHTML("4445", "EAN8");
// echo DNS1D::getBarcodeHTML("4445", "EAN13");
// echo DNS1D::getBarcodeHTML("4445645656", "UPCA");
// echo DNS1D::getBarcodeHTML("4445645656", "UPCE");
// echo DNS1D::getBarcodeHTML("4445645656", "MSI");
// echo DNS1D::getBarcodeHTML("4445645656", "MSI+");
// echo DNS1D::getBarcodeHTML("4445645656", "POSTNET");
// echo DNS1D::getBarcodeHTML("4445645656", "PLANET");
// echo DNS1D::getBarcodeHTML("4445645656", "RMS4CC");
// echo DNS1D::getBarcodeHTML("4445645656", "KIX");
// echo DNS1D::getBarcodeHTML("4445645656", "IMB");
// echo DNS1D::getBarcodeHTML("4445645656", "CODABAR");
// echo DNS1D::getBarcodeHTML("4445645656", "CODE11");
// echo DNS1D::getBarcodeHTML("4445645656", "PHARMA");
// echo DNS1D::getBarcodeHTML("4445645656", "PHARMA2T");