<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use PDF;

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

    public function PdfSheetExStudentDb(){
        // $users = DB::table("users")->get();
        // view()->share('users',$users);

        // if($request->has('download')) {
        // 	// pass view file
        //     $pdf = PDF::loadView('pdfview');
        //     // download pdf
        //     return $pdf->download('userlist.pdf');
        // }
        // return view('pdfview');

        $pdf = PDF::loadView('exmtypclssubs.exmtypclssubfmEntry');
        return $pdf->download('userlist.pdf');

        // return view('pdfview');
    }
}
