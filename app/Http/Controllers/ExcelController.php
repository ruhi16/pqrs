<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use PDF;
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

class ExcelController extends Controller
{
    public function ExcelSheetExStudentDbHtml(){

    }
    public function ExStudentDb(){
        return view ('excels.ExStudentDb');
    }

    public function ExcelSheetExStudentDb(){
        
        //return view('ExStudentDb');
        Excel::create('clients', function($excel){
            $excel->sheet('clients', function($sheet){
                $sheet->loadView('excels.ExStudentDb');
            });
        })->export('xlsx'); //csv 
    }   

}
