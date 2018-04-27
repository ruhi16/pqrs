<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Session;
use App\Exam;
use App\Extype;
use App\Clss;
use App\Subject;
use App\Section;

use App\Studentdb;
use App\Studentcr;

use App\Clssub;
use App\Clssec;

use App\Subjfullmark;
use App\Exmtypclssub;
use App\Marksentry;
use App\Exmtypmodcls;

class ModefmController extends Controller
{
    public function exmtypmodclssubfmEntry(Request $request, $clss_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $cls   = Clss::find($clss_id);
        // $etcss = Exmtypclssub::all(); 
        $clsbs = Clssub::all();
        $exams = Exam::all();
        $extps = Extype::all();

        $etmcs = Exmtypmodcls::whereClss_id($clss_id)->get();
        $etcss = Exmtypclssub::whereClss_id($clss_id)->get();

        $flmrs = Subjfullmark::all();


        return view('exmtypmodclssub.exmtypmodclssubfmEntry')
        ->withCls($cls)
        ->withExams($exams)
        ->withExtps($extps)
        ->withEtcss($etcss)
        ->withClsbs($clsbs)
        ->withEtmcs($etmcs)
        ->withFlmrs($flmrs)
        ;
    }
}
