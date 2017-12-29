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

use App\Clssub;
use App\Clssec;


use App\Exmtypclssub;


class StudentController extends Controller
{
    public function studentdb(){
        $stds = Studentdb::all();
        $allClss = Clss::all();

        return view ('studentdb')
        ->with('stds', $stds)
        ->with('allClss', $allClss)
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
}
