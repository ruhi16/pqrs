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
use App\School;
use App\Gradeparticular;
use App\Grade;
use App\Description;

use App\Studentdb;
use App\Studentcr;
use App\Clssub;
use App\Clssec;

use App\Exmtypclssub;
use App\Marksentry;


class GradeparticularController extends Controller
{
    public function gradeparticulars(){
        $ses = Session::whereStatus('CURRENT')->first();
        $grparts = Gradeparticular::whereSession_id($ses->id)->get();

        return view('gradeparticulars.gradeparticular')
        ->withGrparts($grparts);
    }

    public function gradeparticularsSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        if($request->grPart != NULL){
            $grpart = new Gradeparticular;
            $grpart->name = $request->grPart;
            $grpart->status = $request->grDesc;
            $grpart->session_id = $ses->id;
            $grpart->save();
        }
        return back();
    }

    public function gradeparticularsView(){
        $ses = Session::whereStatus('CURRENT')->first();
        $grparts = Gradeparticular::whereSession_id($ses->id)->get();

        return view('gradeparticulars.gradeparticularView')
        ->withGrparts($grparts)
        ;
    }

    public function gradeparticularsEditSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $grpartedit = Gradeparticular::find($request->editGrPartId);
        $grpartedit->name = $request->editGrPartName;

        $grpartedit->save();
        // echo $request->editGrPartName;
        // echo $request->editGrPartId;
        return back();
    }
    public function gradeparticularsDeltSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $exam = Gradeparticular::find($request->deltGrPartId);
        
        $exam->delete();
        return back();
        
    }
}
