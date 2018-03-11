<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

class ExcelController extends Controller
{
    public function ExcelSheetExStudentDb(){
        
        //return view('ExStudentDb');
        Excel::create('clients', function($excel){
            $excel->sheet('clients', function($sheet){
                $sheet->loadView('ExStudentDb');
            });
        })->export('csv');
    }
}
