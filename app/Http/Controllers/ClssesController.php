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


use App\Exmtypclssub;
use App\Marksentry;

class ClssesController extends Controller
{
    public function clsses(){
        $ses = Session::whereStatus('CURRENT')->first();
        $clsses = Clss::whereSession_id($ses->id)->get();


        return view('clsses.clsses')
        ->withClsses($clsses)
        ;
    }

    public function clssesSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        echo $request->clssName;
        $clss = new Clss;
        $clss->name = $request->clssName;
        $clss->session_id = $ses->id;
        $clss->save();

        return back();
    }

    public function clssesView(){
        $ses = Session::whereStatus('CURRENT')->first();
        $clsses = Clss::whereSession_id($ses->id)->get();
    
        return view('clsses.clssesView')
        ->withClsses($clsses)
        ;
    }

    public function clssesEditSubmit(Request $request){
        // echo $request->editclssName;
        // echo $request->editclssId;
        $ses = Session::whereStatus('CURRENT')->first();
        $clss = Clss::find($request->editclssId);
        $clss->name = $request->editclssName;
        $clss->save();
        return back();
    }

    public function clssesDeltSubmit(Request $request){
        // echo $request->deltclssName;
        // echo $request->deltclssId;
        $ses = Session::whereStatus('CURRENT')->first();
        $clss = Clss::find($request->deltclssId);
        
        $clss->delete();
        return back();
    }

   
}
