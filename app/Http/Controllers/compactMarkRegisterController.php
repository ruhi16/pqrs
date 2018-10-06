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
use App\Miscoption;
use App\Promotionalrule;

use App\Clssub;
use App\Clssec;
use App\Grade;
use App\Teacher;
use App\Clssteacher;
use App\Gradeparticular;
use App\Resultcr;


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

        $clssubexts = Clssub::select('clssubs.id','clssubs.clss_id','clssubs.subject_id','clssubs.combination_no','subjects.extype_id')
                        ->join('subjects', 'clssubs.subject_id','=','subjects.id')
                        ->where('clssubs.session_id', $ses->id)
                        ->get();        
        
        $exams = Exam::whereSession_id($ses->id)->get();
        $extps = Extype::whereSession_id($ses->id)->get();
        $modes = Mode::whereSession_id($ses->id)->get();
        
        $etmcss = Exmtypmodclssub::whereSession_id($ses->id)
                    ->where('clss_id', $clssec->clss_id)                                        
                    ->get();

        $stdmarks = Marksentry::where('marksentries.session_id', $ses->id)
                    ->where('clssec_id', $clssec_id)
                    ->join('clssubs', 'marksentries.clssub_id', '=', 'clssubs.id')
                    ->select('marksentries.*', 'clssubs.combination_no', 'clssubs.subject_id')
                    ->orderBy('studentcr_id')
                    ->get();
        
        $stdcrs = Studentcr::whereSession_id($ses->id)
                    ->where('clss_id', $clssec->clss_id)
                    ->where('section_id', $clssec->section_id)
                    ->get();
        
        $grades = Grade::whereSession_id($ses->id)->get();        
        
        $resultcr = Resultcr::whereSession_id($ses->id)
                        ->where('clss_id', $clssec->clss_id)
                        ->where('section_id', $clssec->section_id)
                        ->get();
        
        $promrules = Promotionalrule::whereSession_id($ses->id)
                        ->where('clss_id', $clssec->clss_id)
                        ->get();
        

        $miscoprsltcr = Miscoption::where('tabName', 'resultcrs')
                            ->where('fieldName', 'status')
                            ->get();
        
        $miscopstdncr = Miscoption::where('tabName', 'studentcrs')
                            ->where('fieldName', 'result')
                            ->get();

        return view('clssecCompactMarkRegister.compactMarkRegister')
            ->with('clssec', $clssec)
            ->with('clssubs', $clssubs)
            ->with('exams', $exams)
            ->with('extps', $extps)
            ->with('modes', $modes)
            ->with('extpmdclsbs', $extpmdclsbs)
            ->with('stdcrs', $stdcrs)
            ->with('stdmarks', $stdmarks)
            ->with('etmcss', $etmcss)
            ->with('clssubexts', $clssubexts)
            ->with('grades', $grades)
            ->with('resultcr',$resultcr)            
            ->with('promrules', $promrules)
            ->with('miscoprsltcr', $miscoprsltcr)
            ->with('miscopstdncr', $miscopstdncr)            
            ;
    }
}
