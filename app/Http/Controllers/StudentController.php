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

class StudentController extends Controller
{
    public function studentdb(){
        $ses = Session::whereStatus('CURRENT')->first();
        $stds = Studentdb::whereStsession_id($ses->id)->get();
        $allClsSec = Clssec::whereSession_id($ses->id)->get();
        $clss = Clss::all();

        return view ('studentdb')
        ->with('stds', $stds)
        ->with('allClsSec', $allClsSec)
        ->withClss($clss)
        ;
    }

    public function studentdbSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        // echo $ses->id . "x";
        $name = $request->name;
        $clss = $request->clss;
        // echo $name . $clss ;

        $stddb = new Studentdb;
        $stddb->name  = $request->name;
        $stddb->fname = $request->fname;
        $stddb->stclss_id = $request->clss;
        $stddb->stsession_id = $ses->id;

        $stddb->save();


        return back();
    }

    //Ajax Update Section
    public function updateSection(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        // console.log("hello");
        $str = $request['sec'];
        $ar = explode('-', $str);
        $data = $ar[0];
        $stdb = Studentdb::find($ar[0]);
        $stdb->stsec_id = $ar[1];
        $stdb->save();

        $sec = Section::find($ar[1]);
        return response()->json( ['sid'=> $stdb->id, 'ssec'=>$sec->name]);
    }

    

}
