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

    public function clssecAdminPage($clss_id, $section_id){
        $ses = Session::whereStatus('CURRENT')->first();
        // echo $ses->id;
        $cls = Clss::find($clss_id);        
        $sec = Section::find($section_id);
        // echo $cls->name; echo $sec->name;

        $stdb = Studentdb::whereStsession_id($ses->id)
        ->where('stclss_id', $clss_id)
        ->where('stsec_id', $section_id)->get();



        $stdbIds = Studentdb::whereStsession_id($ses->id)
        ->where('stclss_id', $clss_id)
        ->where('stsec_id', $section_id)->get();
       
        $stdbtest = Studentcr::whereNotIn('id',$stdbIds->pluck('id'))->get();
        foreach($stdbtest as $abc){
            echo $abc;echo "<br>";
        }
        // print_r($stdbtest);



        $stcr = Studentcr::whereSession_id($ses->id)
        ->where('clss_id', $clss_id)
        ->where('section_id', $section_id)
        ->orderBy('roll_no', 'desc')->get();
        // print_r($stcr);

        // echo "Next Roll NO:". ($stcr->first()->roll_no + 1);


        return view('clssecAdminPage')
        ->with('stdb', $stdb)
        ->with('stcr', $stcr)
        ;
    }

    public function issueRoll(Request $request, $id){
        $ses = Session::whereStatus('CURRENT')->first();
        $stddb = Studentdb::find($id);

        $stcr = Studentcr::whereSession_id($ses->id)
        ->where('clss_id', $stddb->stclss_id)
        ->where('section_id', $stddb->stsec_id)
        ->orderBy('roll_no', 'desc')->get();//max('roll_no');
        // print_r($stcr);
        // dd($stcr);
        if($stcr->count() > 0){
            echo $stcr->count();
            print_r($stcr);
        }else{
            echo $stcr->count();
        }

        $stdcr = new Studentcr;
        $stdcr->studentdb_id = $stddb->id;
        $stdcr->session_id = $ses->id;
        $stdcr->clss_id = $stddb->stclss_id;
        $stdcr->section_id = $stddb->stsec_id;
        $stdcr->roll_no = ($stcr->count() > 0 ? ($stcr->first()->roll_no+1): 1);//((empty($stcr) ? 0 : $stcr->first()->roll_no ) + 1);
        echo "roll".$stdcr->roll_no;
        $stdcr->save();
        return redirect()->to(url('/clssec-AdminPage',[$stddb->stclss_id, $stddb->stsec_id]));
    }



    public function clssecMrkenPage($clss_id, $section_id){
        $ses = Session::whereStatus('CURRENT')->first();
        
        $extpcls = Exmtypclssub::whereSession_id($ses->id)
            ->whereClss_id($clss_id)->get();

        $cls = Clss::find($clss_id);
        $exm = Exam::all();
        $ext = Extype::all();
        $clsb = Clssub::whereClss_id($clss_id)->get();


        return view('clssecMrkenPage')
        ->withExtpcls($extpcls)
        ->withCls($cls)
        ->withExm($exm)
        ->withExt($ext)
        ->withClsb($clsb)
        ;
    }
}
