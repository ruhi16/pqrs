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

class ClsSecController extends Controller
{
    public function clssecTaskPage(){
        $ses = Session::whereStatus('CURRENT')->first();
        $clssecs = Clssec::whereSession_id($ses->id)->get();
        

        // foreach($clssecs as $cs){
        //    print_r($cs->clss()->first()->name);echo "<br>";
        // }
        return view('clssecTaskPage')
        ->with('clssecs', $clssecs)
        ;
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



    public function clssecMrkenPage($clssec_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $clssec = Clssec::find($clssec_id);
        
        $extpcls = Exmtypclssub::whereSession_id($ses->id)
             ->whereClss_id($clssec->clss_id)->get();

        // $cls = Clss::find($clss_id);
        $exm = Exam::all();
        // $ext = Extype::all();
        $clsb = Clssub::whereClss_id($clssec->clss_id)->get();

        $stdmrk = Marksentry::whereSession_id($ses->id)->get();
        // $stdcrs = Studentcr::whereSession_id($ses->id)
        // ->whereClss_id($clss_id)
        // ->whereSection_id($section_id)->get();

        return view('clssecMrkenPage')
        ->withExtpcls($extpcls)
        ->withClsb($clsb)
        ->withClsc($clssec)        
        ->withExm($exm) 
        ->withStdmrk($stdmrk)       
        ;
    }


    public function ClssecstdMarksEntry($extpcl_id, $clsb_id, $clsc_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $extpcls = Exmtypclssub::find($extpcl_id);
        $clsc = Clssec::find($clsc_id);
        $clsb = Clssub::find($clsb_id);


        // echo "Exam:". Exmtypclssub::find($extpcl_id)->exam->name;
        // echo "<br>Exam Type:". Exmtypclssub::find($extpcl_id)->extype->name;
        // echo "<br>Class:". Exmtypclssub::find($extpcl_id)->clss->name;
        
        // echo "<br>Subject:". Clssec::find($clsc_id)->section->name;

        // echo "<br>Subject:". Clssub::find($clsb_id)->subject->name;

        // echo "<br><br>Student List";
        $stdcrs = Studentcr::whereSession_id($ses->id)
        ->whereClss_id(Clssec::find($clsc_id)->clss->id)
        ->whereSection_id(Clssec::find($clsc_id)->section->id)->get();
        // foreach($stdcrs as $stdcr){
        //     echo "<br>". $stdcr->id ."=>". $stdcr->studentdb->name;
        // }

        $stdmrks = Marksentry::whereSession_id($ses->id)
            ->whereExmtypclssub_id($extpcl_id)
            ->whereClssec_id($clsc_id)
            ->whereClssub_id($clsb_id)//->whereStudentcr_id($sid)
            ->get();

        // foreach($stdmrks )


        return view ('clssecMrkentryPage')
        ->withExtpcls($extpcls)
        ->withClsc($clsc)
        ->withClsb($clsb)
        ->withStdcrs($stdcrs)
        ->withStdmrks($stdmrks)
        ;

    }

    public function updateMarks(Request $request){
        //console.log("hello");
        $ses = Session::whereStatus('CURRENT')->first();
        $sid = $request['sid'];
        $etc = $request['etc'];
        $csc = $request['csc'];
        $csb = $request['csb'];
        $mrk = $request['mrk'];

        // $stdmrks = Marksentry::whereSession_id($ses->id)
        //     ->whereExmtypclssub_id($etc)
        //     ->whereClssec_id($csc)
        //     ->whereClssub_id($csb)
        //     ->whereStudentcr_id($sid)
        //     ->get();
        
        // if($stdmrks->count() > 0){
        //     $stdmrks->first()->id;
        //     $stdmrks = Marksentry::find($stdmrks->first()->id);
        // }else{
        //     $stdmrks = new Marksentry;
        // }
        // $stdmrks = new Marksentry;
        // $stdmrks->exmtypclssub_id = $etc;
        // $stdmrks->clssec_id = $csc;
        // $stdmrks->clssub_id = $csb;
        // $stdmrks->studentcr_id = $sid;
        // $stdmrks->session_id = $ses->id;
        // $stdmrks->marks = $mrk;
        // $stdmrks->status = "Correct";
        // $stdmrks->save();


        $stdmarks = Marksentry::firstOrNew([
            'session_id' => $ses->id,
            'exmtypclssub_id' => $etc,
            'clssec_id' => $csc,
            'clssub_id' => $csb,
            'studentcr_id' => $sid
        ]);

        $stdmarks->clssec_id = $csc;
        $stdmarks->exmtypclssub_id = $etc;
        $stdmarks->clssub_id = $csb;
        $stdmarks->studentcr_id = $sid;
        $stdmarks->session_id = $ses->id;
        $stdmarks->marks = $mrk;
        $stdmarks->status = "Correct";
        $stdmarks->save();
        
        return response()->json(['sid'=>$stdmarks->count(),'etc'=>$request['etc'],'csc'=>$request['csc'],'csb'=>$request['csb'],'mrk'=>$request['mrk']]);
    }


    public function clssecMarksRegister($clssec_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $clsc = Clssec::find($clssec_id);

        $clsbs = Clssub::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)->get();
        


        // foreach($clsbs as $clsb){
        //     echo $clsb->subject->extype->name ;
        //     echo $clsb->subject->name. "<br>";
        // }
        // echo $clsc->clss_id;
        
        $stdcrs = Studentcr::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)
            ->whereSection_id($clsc->section_id)
            ->get();
        $exms = Exam::whereSession_id($ses->id)->get();
        $extp = Extype::whereSession_id($ses->id)->get();

        
        // print_r($stdcrs);
        // foreach($stdcrs as $stdcr){
        //     echo $stdcr->studentdb->name ."<br>";
        //     // print_r($stdcr->studentcr);
        //     foreach($stdcr->marksentries as $abc){
        //         echo $abc . "<br>";
        //     }
        // }
        

        

        return view('clssecMarksRegister')
        ->withStdcrs($stdcrs)
        ->withClsbs($clsbs)
        ->withExms($exms)
        ->withExtp($extp)
        ->withCls($clsc->clss->name)
        ->withSec($clsc->section->name)
        ;
    }
}
