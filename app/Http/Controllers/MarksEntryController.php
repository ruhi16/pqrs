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
use App\Mode;

use App\Studentdb;
use App\Studentcr;

use App\Clssub;
use App\Clssec;
use App\Grade;


use App\Exmtypclssub;
use App\Marksentry;
use App\Extclssubfmpm;
use App\Exmtypmodcls;
use App\Exmtypmodclssub;
use App\Answerscriptdistribution;

class MarksEntryController extends Controller
{
    public function clssecMrkenPage($clssec_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $clssec = Clssec::find($clssec_id);
        
        $extpcls = Exmtypmodclssub::whereSession_id($ses->id)
                   ->whereClss_id($clssec->clss_id)->get();

        $extpmdcls = Exmtypmodcls::whereSession_id($ses->id)
                   ->whereClss_id($clssec->clss_id)->get();
        
        $exm = Exam::all();
        $modes = Mode::all();
        $clsb = Clssub::whereClss_id($clssec->clss_id)->get();

        $stdmrk = Marksentry::whereSession_id($ses->id)->get();
        
        return view('clssecMrkenPage')
        ->withExtpcls($extpcls) 
        ->withExtpmdcls($extpmdcls)
        ->withClsb($clsb)
        ->withClsc($clssec)        
        ->withExm($exm) 
        ->withModes($modes) 
        ->withStdmrk($stdmrk) 
        ->withCls($clssec->clss->name)
        ->withSec($clssec->section->name)
        ;
    }


    public function clssecstdMarksEntry($extpcl_id, $clsb_id, $clsc_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $extpcls = Exmtypmodclssub::find($extpcl_id);
        $clsc = Clssec::find($clsc_id);
        $clsb = Clssub::find($clsb_id);
        
        $stdcrs = Studentcr::whereSession_id($ses->id)
        ->whereClss_id(Clssec::find($clsc_id)->clss->id)
        ->whereSection_id(Clssec::find($clsc_id)->section->id)->get();

        $stdmrks = Marksentry::whereSession_id($ses->id)
            ->whereExmtypmodclssub_id($extpcl_id)
            ->whereClssec_id($clsc_id)
            ->whereClssub_id($clsb_id)//->whereStudentcr_id($sid)
            ->get();
        // echo $extpcls;

        $teacher = Answerscriptdistribution::where('session_id', $extpcls->session_id)
            ->where('exam_id', $extpcls->exam_id)
            ->where('extype_id', $extpcls->extype_id)
            ->where('clss_id', $extpcls->clss_id)
            ->where('section_id', $clsc->section->id)
            ->where('subject_id', $extpcls->subject_id)
            ->first();
        // echo $teacher;
        return view ('clssecMrkentryPage')
        ->withExtpcls($extpcls)
        ->withClsc($clsc)
        ->withClsb($clsb)
        ->withStdcrs($stdcrs)
        ->withStdmrks($stdmrks)
        ->withTeacher($teacher)
        ;
    }

    //Ajax Function
    public function updateMarks(Request $request){

        $ses = Session::whereStatus('CURRENT')->first();
        $sid = $request['sid']; //Student Id
        $etc = $request['etc']; //ExamType Id
        $csc = $request['csc']; //ClssSec Id
        $csb = $request['csb']; //ClssSubject Id
        if(strtoupper($request['mrk']) == 'AB'){
            $mrk = -99;
        }else{
            $mrk = $request['mrk']; //Marks
        }

        $stdmarks = Marksentry::firstOrNew([
            'session_id' => $ses->id,
            'exmtypmodclssub_id' => $etc,
            'clssec_id' => $csc,
            'clssub_id' => $csb,
            'studentcr_id' => $sid
        ]);

        $stdmarks->clssec_id = $csc;
        $stdmarks->exmtypmodclssub_id = $etc;
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

        $exms = Exam::whereSession_id($ses->id)->get();
        
        $clsbs = Clssub::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)->get();
        
        $stdcrs = Studentcr::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)
            ->whereSection_id($clsc->section_id)
            ->get();
        
 


        $xx = Exmtypmodclssub::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)
            ->groupBy('extype_id')
            ->pluck('extype_id');
        $extp = Extype::whereSession_id($ses->id)
                    ->whereIn('id', $xx)->get();

        $mode = Mode::whereSession_id($ses->id)->get();

        $extpclsbs = Exmtypmodclssub::whereSession_id($ses->id)
        ->whereClss_id($clsc->clss_id)        
        ->get();
        
        $grades = Grade::whereSession_id($ses->id)->get();
        $etclsbfm = Extclssubfmpm::all();


        $mrks = Marksentry::whereSession_id($ses->id)->get();


        return view('clssecMarksRegister')
        ->withStdcrs($stdcrs)
        ->withClsbs($clsbs)
        ->withExms($exms)
        ->withExtp($extp)
        ->withMode($mode)
        ->withExtpclsbs($extpclsbs)
        ->withCls($clsc->clss->name)
        ->withSec($clsc->section->name)
        ->withClssec($clsc)
        ->withEtclsbfm($etclsbfm)
        ->withMrks($mrks)
        ;
    }



    public function clssecstdMarksEntryForAllSubj($extpmdcl_id, $clsc_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $extpmdcl = Exmtypmodcls::find($extpmdcl_id);
        $clsc = Clssec::find($clsc_id);
        
        $subj = Subject::where('extype_id', 1)->get();//Formative Only

        
        $clsb = Clssub::where('clss_id', $clsc->clss_id)
                    ->whereIn('subject_id', $subj->pluck('id'))
                    ->get();
        
        // $abcd = $subj->intersect($clsb);
        foreach($subj as $c){
            echo $c ."<br>";
        }echo "<br>";
        foreach($clsb as $c){
            echo $c."<br>";
        }
        echo "<BR><br>";
        // foreach($abcd as $c){
        //     echo $c ."<br>";
        // }
        // dd($clsb);
        $stdcrs = Studentcr::whereSession_id($ses->id)
            ->whereClss_id(Clssec::find($clsc_id)->clss->id)
            ->whereSection_id(Clssec::find($clsc_id)->section->id)->get();
        
        $extpmdclsbs = Exmtypmodclssub::whereSession_id($ses->id)
                        ->where('exam_id', $extpmdcl->exam_id)
                        ->where('extype_id', $extpmdcl->extype_id)
                        ->where('mode_id', $extpmdcl->mode_id)
                        ->where('clss_id', $extpmdcl->clss_id)
                        ->whereIn('subject_id', $clsb->pluck('subject_id'))
                        ->get();       


        $clsbids = Clssub::where('clss_id', $clsc->clss->id)
                    ->whereIn('subject_id', $clsb->pluck('subject_id'))->get();
        

        $stdmrks = Marksentry::whereSession_id($ses->id)
                ->whereIn('studentcr_id', $stdcrs->pluck('id'))
                ->whereIn('clssub_id', $clsbids->pluck('id'))
                ->whereIn('exmtypmodclssub_id', $extpmdclsbs->pluck('id'))
                ->where('clssec_id', $clsc_id)                
                ->get();
        
        // dd($extpmdclsbs);
        // dd($stdcrs);
        // dd($clsbids);
        // dd($stdmrks);
        // dd($clsb->pluck('id'));
        // foreach($stdmrks as $ghy){
        //     echo $ghy;
        // }
        

        // $teacher = Answerscriptdistribution::where('session_id', $extpcls->session_id)
        //     ->where('exam_id', $extpcls->exam_id)
        //     ->where('extype_id', $extpcls->extype_id)
        //     ->where('clss_id', $extpcls->clss_id)
        //     ->where('section_id', $clsc->section->id)
        //     ->where('subject_id', $extpcls->subject_id)
        //     ->first();
        // // echo $teacher;

        return view('clssecMarksEntry.clssecMrkentryForAllSubj')
        ->withExtpmdcl($extpmdcl)
        ->withClsc($clsc)
        ->withClsb($clsb)
        ->withStdcrs($stdcrs)
        ->withStdmrks($stdmrks)
        // ->withTeacher($teacher)
        ;

    }

    //Ajux Formative All Subject Marks Entry
    public function updateForAllSubjMarks(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();

        $arr = [];
        foreach($request['mrk'] as $abc){
            $arr[$abc['subid']] = $abc['marks'];
        }

        $value = "";
        foreach($arr as  $k => $v){
            $value .= $k . "=" . $v . "\n";
        }
        
        $stdcr_id = $request['id'];
        $etmc_id  = $request['etc'];
        $clsc_id  = $request['csc'];

        $extpmdcl = Exmtypmodcls::find($etmc_id);
        $extpmdclsb = Exmtypmodclssub::where('exam_id',$extpmdcl->exam_id)
                        ->where('extype_id', $extpmdcl->extype_id)
                        ->where('mode_id', $extpmdcl->mode_id)
                        ->where('clss_id', $extpmdcl->clss_id)->get();


        $test='';
        foreach($arr as $key => $mrk){

            if(strtoupper($mrk) == 'AB' or $mrk == ''){
                $mrk = -99;
            }else{
                $mrk = $mrk; //Marks
            }

            $etmcs = $extpmdclsb->where('subject_id', $key)->first();
            $clsb  = Clssub::where('clss_id',  $etmcs->clss_id)
                            ->where('subject_id', $etmcs->subject_id)->first();

            $stdmarks = Marksentry::firstOrNew([
                'session_id' => $ses->id,
                'exmtypmodclssub_id' =>$etmcs->id,
                'clssec_id' => $clsc_id,
                'clssub_id' => $clsb->id,
                'studentcr_id' => $stdcr_id
            ]);
            
            

            $stdmarks->clssec_id = $clsc_id;
            $stdmarks->exmtypmodclssub_id = $etmcs->id;
            $stdmarks->clssub_id = $clsb->id;
            $stdmarks->studentcr_id = $stdcr_id;
            $stdmarks->session_id = $ses->id;
            $stdmarks->marks = $mrk;
            $stdmarks->status = "Correct";
            $stdmarks->save();
            $test .= $stdmarks->id.'->'.$mrk.'/';
        }
        // return response()->json(['data'=>'abcd']);
        return response()->json(['sid'=>$stdcr_id, 'data'=> $value.'-'.$stdcr_id.'-'.$etmc_id.'-'.$clsc_id.'-'.$test]);
    }


}
