<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use PDF;



// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class TestController extends Controller
{
    public function mpdfBengaliTestpage(Request $requst){

        //$pdf = mPDF::loadview('mpdfBengaliTestpage');
        // return $pdf->stream();
        

        $html = "This is Direct from Controller
                 This is test page for Bengali font using mPDF.<br/>
                 এটি mPDF এর একটি টেস্ট পেজ। v2";
        //$mpdf = new mPDF('UTF-8', 'A4');
        // add_custom_fonts_to_mpdf($mpdf);
        // $mpdf = mPDF::loadHtml($html);
        // $mpdf = new PDF('utf-8', 'Letter', 0, '', 0, 0, 0, 0, 0, 0);
        
        // mPDF::loadView('mpdfBengaliTestpage');
        // $pdf = MPDF::loadloadHTML('web.pdf.contract', $data);
        // $mpdf->WriteHTML($html);
        // return $mpdf->download('asdf.pdf');

        // return view('mpdfBengaliTestpage');

        //$pdf = PDF::make('dompdf.wrapper');
        
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        return $pdf->stream();
        // return PDF::loadHTML('<h1>Hello World!</h1>')->stream('download.pdf');
    }
    
}
