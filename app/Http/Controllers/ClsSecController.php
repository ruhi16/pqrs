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

class ClsSecController extends Controller
{
    public function clssecTaskPage(){
        $clssecs = Clssec::all();
        

        // foreach($clssecs as $cs){
        //    print_r($cs->clss()->first()->name);echo "<br>";
        // }
        return view('clssecTaskPage')
        ->with('clssecs', $clssecs)
        ;
    }

    public function clssecAdminPage($clss_id,$section_id){
        $cls = Clss::find($clss_id);
        $sec = Section::find($section_id);
        // echo $cls->name; echo $sec->name;

        $stdb = Studentdb::where('stclss_id', $clss_id)
        ->where('stsec_id', $section_id)->get();

        // print_r($stdb);
        return view('clssecAdminPage')
        ->with('stdb', $stdb)
        ;
    }
}
