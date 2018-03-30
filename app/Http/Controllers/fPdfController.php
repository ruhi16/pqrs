<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fpdf;

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
use App\Gradedescription;


class fPdfController extends Controller
{
    public function fPdfResultSheet(Request $request, $clssec_id, $studentcr_id){        
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
    public function ResultSheetPdf(){

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
        $grddescr = Gradedescription::all();


        Fpdf::AddPage();
        Fpdf::SetFont('Courier', 'B', 18);
        Fpdf::Cell(50, 25, 'Hello World!');
        Fpdf::Output();
        exit;




    }
}
