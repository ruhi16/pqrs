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
use App\Teacher;

use App\Studentdb;
use App\Studentcr;

use App\Clssub;
use App\Clssec;

use App\Clssteacher;
use App\Exmtypclssub;
use App\Marksentry;

class ClsSecController extends Controller
{
    public function clssec(){
        $ses = Session::whereStatus('CURRENT')->first();
        $clssecs = Clssec::whereSession_id($ses->id)->get();
        $clss = Clss::all();
        // $cls = $clssecs->select('clss_id')->distinct()->get();
        // dd($cls);
        // $cls = Clssec::distinct('name')->count();
        // echo $cls;
        return view ('clssec')
            ->with('clssecs', $clssecs)
            ->with('clss', $clss)
        ;
    }

    public function clssecSubmit(Request $request){
        


        return redicret()->to('/clssecs-view');
    }

    public function clssecView(){
        $clssecs = Clssec::all();
        
        return view('clssecView')
        ->with('clssecs', $clssecs)
        ;
    }

    public function addSec($clss_id){
        $ses = Session::where('Status', '=', 'CURRENT')->first();
        $cls = Clss::find($clss_id);
    
        $m = DB::table('clssecs')
            ->where('clss_id','=', $clss_id)
            ->max('section_id');
    
        $n = DB::table('sections')        
            ->max('id');
        // echo $ses->id;
        
        if($m < $n){
            $clsc = new Clssec;
            $clsc->clss_id = $clss_id;
            $clsc->section_id = ++$m;
            $clsc->session_id = $ses->id;
            $clsc->save();
            // $cls->sections()->attach(++$m,['session_id'=>$ses->id]);
        }
        // foreach($cls->sections as $c){
        //     echo $c."<br>";
        // }
        return redirect()->to('/clssecs');
    }
    public function delSec($clss_id){
        $ses = Session::where('Status', '=', 'CURRENT')->first();
        $cls = Clss::find($clss_id);
    
        $m = DB::table('clssecs')
            ->where('clss_id','=', $clss_id)
            ->max('section_id');
        echo $m;
        
        // echo $ses->id;
        if($m > 0){
            $delrow = Clssec::whereClss_id($clss_id)
                ->whereSection_id($m)->delete();
                // print_r($delrow);

            // $cls->sections()->detach($m,['session_id'=>$ses->id]);
        }
        return redirect()->to('/clssecs');
    }





    
    public function clssecTaskPage(){
        $ses = Session::whereStatus('CURRENT')->first();
        $clssecs = Clssec::whereSession_id($ses->id)->get();
        $teachers = Teacher::all();
        $clssteachers = Clssteacher::all();
        // foreach($clssecs as $cs){
        //    print_r($cs->clss()->first()->name);echo "<br>";
        // }
        return view('clssecTaskPage')
        ->with('clssecs', $clssecs)
        ->with('teachers', $teachers)
        ->with('clssteachers', $clssteachers)
        ;
    }

    public function clssecTaskPageTeacherSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();

        $teacher = Clssteacher::firstOrNew([ 'clss_id'=>$request->clssId, 
                                'section_id'=>$request->secnId,
                                'session_id'=>$ses->id]);
        $teacher->clss_id = $request->clssId;
        $teacher->section_id = $request->secnId;
        $teacher->teacher_id = $request->selectTeacher;
        $teacher->session_id = $ses->id;
        $teacher->save();

        return back();
    }





    public function clssecAdminPage($clss_id, $section_id){
        $ses = Session::whereStatus('CURRENT')->first();        
        $cls = Clss::find($clss_id);        
        $sec = Section::find($section_id);
        

        $stdb = Studentdb::whereStsession_id($ses->id)
        ->where('stclss_id', $clss_id)
        ->where('stsec_id', $section_id)->get();                
        // echo "Students Details from  studentDB:<BR>";
        // foreach($stdb as $abc){
        //     echo "Name-DB: ".$abc->name."-".$abc->id;echo "<br>";
        // }
        

        $stcr = Studentcr::whereSession_id($ses->id)            
            ->where('clss_id', $clss_id)
            ->where('section_id', $section_id)            
            ->get();            
        // echo "Students Details from  studentCR:<BR>";
        // foreach($stcr as $abc){
        //     echo "Name-CR: ".$abc->studentdb_id;echo "<br>";
        // }

        $remRec = $stdb->whereNotIn('id', $stcr->pluck('studentdb_id'));        
        // echo "Remaining Students Details from  studentDB:<BR>";
        // foreach($remRec as $abc){
        //     echo "Rem Name-CR: ".$abc->id;echo "<br>";
        // }
        // dd($remRec);


        return view('clssecAdminPage')
        ->with('ses', $ses)        
        ->with('stcr', $stcr)
        ->with('remRec', $remRec)
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
            // echo $stcr->count();
            // print_r($stcr);
        }else{
            // echo $stcr->count();
        }

        $stdcr = new Studentcr;
        $stdcr->studentdb_id = $stddb->id;
        $stdcr->session_id = $ses->id;
        $stdcr->clss_id = $stddb->stclss_id;
        $stdcr->section_id = $stddb->stsec_id;
        $stdcr->roll_no = ($stcr->count() > 0 ? ($stcr->first()->roll_no+1): 1);//((empty($stcr) ? 0 : $stcr->first()->roll_no ) + 1);
        // echo "roll".$stdcr->roll_no;
        $stdcr->save();
        return redirect()->to(url('/clssec-AdminPage',[$stddb->stclss_id, $stddb->stsec_id]));
    }



    
}
