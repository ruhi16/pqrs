<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use mPDF;

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
        $mpdf = mPDF::loadView('mpdfBengaliTestpage');
        // $pdf = MPDF::loadloadHTML('web.pdf.contract', $data);
        //$mpdf->WriteHTML($html);
        return $mpdf->stream();

        // return view('mpdfBengaliTestpage');
    }
    
}
