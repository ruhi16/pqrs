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

use App\Clssub;
use App\Clssec;


use App\Exmtypclssub;


class StudentController extends Controller
{
    public function studentdb(){
        $stds = Studentdb::all();
        $allClsSec = Clssec::all();

        return view ('studentdb')
        ->with('stds', $stds)
        ->with('allClsSec', $allClsSec)
        ;
    }

    public function studentdbSubmit(Request $request){
        $name = $request->name;
        $clss = $request->clss;
        echo $name . $clss ;

        $stddb = new Studentdb;
        $stddb->name  = $request->name;
        $stddb->fname = $request->fname;
        $stddb->stclss_id = $request->clss;

        $stddb->save();


        return back();
    }


    public function updateSection(Request $request){
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
