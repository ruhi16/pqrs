<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
use App\Gradedescription;


class PdfController extends Controller
{
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
        $subjects = Subject::all();
        $clsses = Clss::all();
        // $pdf = PDF::loadView('results.ResultSheetHTML');
        $pdf = PDF::loadView('ExStudentDb', ['subjects'=>$subjects,'clsses'=>$clsses]);//compact([$subjects,$clsses]));
            //->with('subjects',$subjects)->with('clsses',$clsses);//, 
        // return $pdf->download('userlist.pdf');
        return $pdf->stream(); //to open as pdf page in same window
            // return "Hello";
        // return view('pdfview');
    }
    
    public function HtmlSheetExStudentDb(){
        $subjects = Subject::all();
        $clsses = Clss::all();

        return view ('ExStudentDb')
        ->with('subjects', $subjects)
        ->with('clsses', $clsses)
        ;
    }

    public function ResultSheetHTML($clssec_id, $studentcr_id){
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
        
        $pdf = PDF::loadView('results.ResultSheetHTML', 
            ['sch'=>$sch,   'exms'=>$exms, 'exts'=>$exts, 'clsc'=>$clsc, 
             'clsb'=>$clsb, 'stcr'=>$stcr, 'mrks'=>$mrks, 'etcs'=>$etcs,
             'grddes'=>$grddescr]);
        $pdf->setPaper("legal");        
        return $pdf->stream();//download('resultsheet.pdf');

        return view('results.ResultSheetHTML')
        ->withSch($sch)        
        ->withExms($exms)
        ->withexts($exts)
        ->withClsc($clsc)
        ->withClsb($clsb)
        ->withStcr($stcr)
        ->withMrks($mrks)
        ->withEtcs($etcs)
        ->withGrddes($grddescr)
        ;
    }
}
