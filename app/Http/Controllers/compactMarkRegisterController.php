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
use App\Mode;

use App\Studentdb;
use App\Studentcr;

use App\Clssub;
use App\Clssec;
use App\Grade;
use App\Teacher;
use App\Clssteacher;


use App\Exmtypclssub;
use App\Marksentry;
use App\Extclssubfmpm;
use App\Exmtypmodcls;
use App\Exmtypmodclssub;
use App\Answerscriptdistribution;

class compactMarkRegisterController extends Controller
{
    public function clssecCompactMarkRegister(Request $request, $clssec_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $clssec = Clssec::find($clssec_id);
        $clssubs = Clssub::whereClss_id($clssec->clss_id)->get();

        $extpmdcls = Exmtypmodcls::whereSession_id($ses->id)
                   ->whereClss_id($clssec->clss_id)->get();

        $extpmdclsbs = Exmtypmodclssub::whereSession_id($ses->id)
                   ->whereClss_id($clssec->clss_id)->get();

        
        
        $exams = Exam::all();
        $modes = Mode::all();
        

        $stdmrk = Marksentry::whereSession_id($ses->id)->get();


        return view('CompactMarkRegister.compactMarkRegister')
            ->with('clssec', $clssec)
            ->with('clssubs', $clssubs)
            ->with('exams', $exams)
            ->with('extpmdclsbs', $extpmdclsbs)
            ;
    }
}
