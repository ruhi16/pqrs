<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Fpdf;

use DB;
use PDF;
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


use App\Exmtypclssub;
use App\Exmtypmodcls;
use App\Exmtypmodclssub;
use App\Marksentry;
use App\Gradedescription;
use App\Extclssubfmpm;

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

       
        $extpclsbs = Exmtypmodclssub::whereSession_id($ses->id)
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
        $exms = Exam::whereSession_id($ses->id)->get();

        $clsc = Clssec::find($clssec_id);
        $clsbs = Clssub::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)->get();

        $stcr = Studentcr::find($studentcr_id);
        
        
        
        
        
        
        $xx = Exmtypmodclssub::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)
            ->groupBy('extype_id')
            ->pluck('extype_id');
        $extp = Extype::whereSession_id($ses->id)
                    ->whereIn('id', $xx)->get();
        
        $extpclsbs = Exmtypmodclssub::whereSession_id($ses->id)
        ->whereClss_id($clsc->clss_id)        
        ->get();
        
        $mrks = Marksentry::whereSession_id($ses->id)
            ->whereStudentcr_id($studentcr_id)->get();

        $grddes = Gradedescription::whereSession_id($ses->id)->get();

        // dd($grddes);
        return view('results.ResultSheet')
        ->withSes($ses)
        ->withSch($sch)
        ->withStcr($stcr)
        ->withMrks($mrks)
        ->withClsbs($clsbs)
        ->withExms($exms)
        ->withExtp($extp)
        ->withExtpclsbs($extpclsbs)
        ->withCls($clsc->clss->name)
        ->withSec($clsc->section->name)
        ->withClssec($clsc)
        ->with('grddes', $grddes)
        ->with('exts', $extp)
        ;
    }

    public function ResultSheetHTML($clssec_id, $studentcr_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $sch = School::find(1);
        $exms = Exam::whereSession_id($ses->id)->get();

        $clsc = Clssec::find($clssec_id);
        $clsbs = Clssub::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)->get();

        $stcr = Studentcr::find($studentcr_id);
        
        
        
        
        
        
        $xx = Exmtypmodclssub::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)
            ->groupBy('extype_id')
            ->pluck('extype_id');
        $extp = Extype::whereSession_id($ses->id)
                    ->whereIn('id', $xx)->get();
        
        $extpclsbs = Exmtypmodclssub::whereSession_id($ses->id)
        ->whereClss_id($clsc->clss_id)        
        ->get();
        
        $mrks = Marksentry::whereSession_id($ses->id)
            ->whereStudentcr_id($studentcr_id)->get();

        $grddes = Gradedescription::whereSession_id($ses->id)->get();

        return view('results.ResultSheetHTML')
        ->withSes($ses)
        ->withSch($sch)
        ->withStcr($stcr)
        ->withMrks($mrks)
        ->withClsbs($clsbs)
        ->withExms($exms)
        ->withExtp($extp)
        ->withExtpclsbs($extpclsbs)
        ->withCls($clsc->clss->name)
        ->withSec($clsc->section->name)
        ->withClssec($clsc)
        ->with('grddes', $grddes)
        ->with('exts', $extp)
        ;
        // $ses = Session::whereStatus('CURRENT')->first();
        // $sch = School::find(1);       

        // $exms = Exam::all();
        // $exts = Extype::whereSession_id($ses->id)->get()->sortBy('name');
        // // ============================================================
        // // $exts = Exmtypclssub::groupBy('extype_id')->pluck('extype_id');
        // // $exts = Extype::whereIn('id', $exts->toArray())->get();
        // // ============================================================
        
        // $clsc = Clssec::find($clssec_id);
        // $clsb = Clssub::whereClss_id($clsc->clss_id)->get();
        // $stcr = Studentcr::find($studentcr_id);
        
        // $mrks = Marksentry::whereSession_id($ses->id)
        //     ->whereStudentcr_id($studentcr_id)->get();
        // $etcs = Exmtypclssub::all();
        // // print_r($clsc);
        // $grddescr = Gradedescription::all();

        


        // return view('results.ResultSheetHTML')
        // ->withSch($sch)        
        // ->withExms($exms)
        // ->withexts($exts)
        // ->withClsc($clsc)
        // ->withClsb($clsb)
        // ->withStcr($stcr)
        // ->withMrks($mrks)
        // ->withEtcs($etcs)
        // ->withGrddes($grddescr)
        // ;
    }

    public function ResultSheetPDF($clssec_id, $studentcr_id){
        // $ses = Session::whereStatus('CURRENT')->first();
        // $sch = School::find(1);       

        // $exms = Exam::all();
        // $exts = Extype::whereSession_id($ses->id)->get()->sortBy('name');
        
        // $clsc = Clssec::find($clssec_id);
        // $clsb = Clssub::whereClss_id($clsc->clss_id)->get();
        // $stcr = Studentcr::find($studentcr_id);
        
        // $mrks = Marksentry::whereSession_id($ses->id)
        //     ->whereStudentcr_id($studentcr_id)->get();
        // $etcs = Exmtypclssub::all();
        
        // $grddescr = Gradedescription::all();
        $ses = Session::whereStatus('CURRENT')->first();
        $sch = School::find(1);
        $exms = Exam::whereSession_id($ses->id)->get();

        $clsc = Clssec::find($clssec_id);
        $clsbs = Clssub::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)->get();

        $stcr = Studentcr::find($studentcr_id);
        
        $xx = Exmtypmodclssub::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)
            ->groupBy('extype_id')
            ->pluck('extype_id');
        $extp = Extype::whereSession_id($ses->id)
                    ->whereIn('id', $xx)->get();
        
        $extpclsbs = Exmtypmodclssub::whereSession_id($ses->id)
        ->whereClss_id($clsc->clss_id)        
        ->get();
        
        $mrks = Marksentry::whereSession_id($ses->id)
            ->whereStudentcr_id($studentcr_id)->get();

        $grddes = Gradedescription::whereSession_id($ses->id)->get();

        $pdf = PDF::loadView('results.ResultSheetHTML', 
            [ 'ses'=>$ses,   'sch'=>$sch,  'exms'=>$exms, 'clsbs'=>$clsbs,
              'stcr'=>$stcr, 'mrks'=>$mrks,'extp'=>$extp, 'extpclsbs'=>$extpclsbs,
              'grddes' => $grddes, 'exts' => $extp
            ]);
            
        $pdf->setPaper("legal");        
        return $pdf->stream();//download('resultsheet.pdf');

        // return view('results.ResultSheetHTML')
        // ->withSch($sch)        
        // ->withExms($exms)
        // ->withexts($exts)
        // ->withClsc($clsc)
        // ->withClsb($clsb)
        // ->withStcr($stcr)
        // ->withMrks($mrks)
        // ->withEtcs($etcs)
        // ->withGrddes($grddescr)
        // ;
    }

    public function ResultSheetFPDF(Request $request, $clssec_id, $studentcr_id){        
        $ses = Session::whereStatus('CURRENT')->first();
        $sch = School::find(1);               
        $exms = Exam::all();
        $exts = Extype::whereSession_id($ses->id)->get()->sortBy('name');
        // ============================================================
        // $exts = Exmtypclssub::groupBy('extype_id')->pluck('extype_id');
        // $exts = Extype::whereIn('id', $exts->toArray())->get();
        // ============================================================
        
        $clsc = Clssec::find($clssec_id);
        $clsb = Clssub::whereClss_id($clsc->clss_id)->get();
        $stcr = Studentcr::find($studentcr_id);
        
        $mrks = Marksentry::whereSession_id($ses->id)
            ->whereStudentcr_id($studentcr_id)->get();
        $etcs = Exmtypmodclssub::all();
        // print_r($clsc);
        $grddescr = Gradedescription::all();
        
        Fpdf::AddPage();
        Fpdf::SetFont('Courier', 'B', 18);
        Fpdf::Cell(190, 8,$sch->name ,0,1,'C');

        Fpdf::SetFont('Courier', 'B', 11);
        $strSchAddr = $sch->po .' * '. $sch->ps .' * '. $sch->dist ;
        Fpdf::Cell(190, 8,$strSchAddr ,0,1,'C');
        
        Fpdf::SetFont('Courier', 'B', 18);
        Fpdf::Cell(190, 8,'Progress Report for Session - '.$ses->name ,0,1,'C');

        Fpdf::SetFont('Courier', 'B', 14);
        $strStdDetail = "Name: ".$stcr->studentdb->name;
        $strStdDetail .= "\t Class: ".$stcr->clss->name;
        $strStdDetail .= "\t Section: ".$stcr->section->name;
        $strStdDetail .= "\t Roll: ".$stcr->roll_no;
        
        Fpdf::Ln();
        Fpdf::Cell(190, 8,$strStdDetail ,0,1,'C');

        // session(['key' => 'va123lue']);
        //$str = session('key');//auth()->user()->name; //\Auth::user()////->get('key1');//Hash::make(str_random(8));
        //Fpdf::Cell(190, 8, $str ,0,1,'C');
        
        Fpdf::Cell(90, 8, 'Formative' ,1,0,'C');
        Fpdf::Cell(90, 8, 'Summative' ,1,1,'C');
        

        
        
        
        
        
        
        
        
        
        Fpdf::Output();
        exit;

        // $pdf = new Fpdf();
        // $pdf::AddPage();
        // $pdf::SetFont('Arial','B',18);
        // $pdf::Cell(0,10,"Title",0,"","C");
        // $pdf::Ln();
        // $pdf::Ln();
        // $pdf::SetFont('Arial','B',12);
        // $pdf::cell(25,8,"ID",1,"","C");
        // $pdf::cell(45,8,"Name",1,"","L");
        // $pdf::cell(35,8,"Address",1,"","L");
        // $pdf::Ln();
        // $pdf::SetFont("Arial","",10);
        // $pdf::cell(25,8,"1",1,"","C");
        // $pdf::cell(45,8,"John",1,"","L");
        // $pdf::cell(35,8,"New York",1,"","L");
        // $pdf::Ln();
        // $pdf::Output();
        // exit;
    }
    // public function ResultSheetPdf(){

    //     $ses = Session::whereStatus('CURRENT')->first();
    //     $sch = School::find(1);               
    //     $exms = Exam::all();
    //     $exts = Extype::all()->sortBy('name');
    //     $clsc = Clssec::find($clssec_id);
    //     $clsb = Clssub::whereClss_id($clsc->clss_id)->get();
    //     $stcr = Studentcr::find($studentcr_id);
        
    //     $mrks = Marksentry::whereSession_id($ses->id)
    //         ->whereStudentcr_id($studentcr_id)->get();
    //     $etcs = Exmtypclssub::all();
    //     // print_r($clsc);
    //     $grddescr = Gradedescription::all();


    //     Fpdf::AddPage();
    //     Fpdf::SetFont('Courier', 'B', 18);
    //     Fpdf::Cell(50, 25, 'Hello World!');
    //     Fpdf::Output();
    //     exit;




    // }

}
