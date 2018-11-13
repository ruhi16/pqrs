<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fpdf;

use DB;
use PDF;
use App\Session;
use App\Exam;
use App\Extype;
use App\Clss;
use App\Subject;
use App\Section;
use App\School;
use App\Mode;

use App\Studentdb;
use App\Studentcr;

use App\Clssub;
use App\Clssec;
use App\Grade;
use App\Gradeparticular;


use App\Exmtypclssub;
use App\Exmtypmodcls;
use App\Exmtypmodclssub;
use App\Marksentry;
use App\Gradedescription;
use App\Extclssubfmpm;


class ResultcrController extends Controller
{
    public function clssecResultSheetv3($clssec_id, $studentcr_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $school = School::find(1);
        $clsc = Clssec::find($clssec_id);
        $clssubs = DB::table('clssubs')->where('clssubs.session_id', $ses->id)
            ->where('clss_id', $clsc->clss_id)
            ->join('subjects', 'subjects.id', '=', 'clssubs.subject_id')
            //->select()
            ->get();
        //dd($clssubs);

        $studentcrs = Studentcr::whereSession_id($ses->id)
                        ->where('clss_id', $clsc->clss_id)
                        ->where('section_id', $clsc->section_id)
                        ->where('id', $studentcr_id)
                        ->get();

        $marks = Marksentry::whereSession_id($ses->id)
                    ->whereIn('studentcr_id', $studentcrs->pluck('id'))
                    ->orderBy('studentcr_id')
                    ->get();

                    
        $exams = Exam::whereSession_id($ses->id)->get();
        $extypes = Extype::whereSession_id($ses->id)->get();
        $extpmdclsbs = Exmtypmodclssub::whereSession_id($ses->id)
                        ->where('clss_id', $clsc->clss_id)
                        ->get();
        $grades = Grade::whereSession_id($ses->id)->get();
        $gradeparticular = Gradeparticular::whereSession_id($ses->id)->get();
        $modes = Mode::whereSession_id($ses->id)->get();

    return view('resultcrs.clssecResultSheetv3')
            ->with('session', $ses)
            ->with('school', $school)
            ->with('clssecMarks', $marks->sortBy('studentcr_id'))
            ->with('studentcrs', $studentcrs->sortBy('studentdb_id'))
            ->with('clssubs',$clssubs)
            ->with('exams',$exams)
            ->with('extypes',$extypes)
            ->with('extpmdclsbs', $extpmdclsbs)
            ->with('grades', $grades)
            ->with('gradeparticular', $gradeparticular)
            ->with('modes', $modes)
            ;
    }
}
