<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http;
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
use App\Teacher;
use App\Mode;

use App\Studentdb;
use App\Studentcr;
use App\Clssub;
use App\Clssec;

use App\Exmtypclssub;
use App\Exmtypmodcls;
use App\Marksentry;
use App\Gradedescription;
use App\Answerscriptdistribution;

class ModeController extends Controller
{
    public function Taskpane(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $exms = Exam::where('session_id', $ses->id)->get();
        $clss = Clss::where('session_id', $ses->id)->get();
        $exts = Extype::where('session_id', $ses->id)->get();
        $mods = Mode::where('session_id', $ses->id)->get();

        return view('modes.exmtypmodclsTaskpane')
            ->with('exms', $exms)
            ->with('clss', $clss)
            ->with('exts', $exts)
            ->with('mods', $mods)
        ;
    }


    public function taskpaneSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $exms = Exam::where('session_id', $ses->id)->get();
        $clss = Clss::where('session_id', $ses->id)->get();
        $exts = Extype::where('session_id', $ses->id)->get();
        $mods = Mode::where('session_id', $ses->id)->get();

        foreach($clss as $cls){  
            foreach($exts as $ext){            
                foreach($exms as $exm){
                    foreach($mods as $mod){
                        // echo $cls->name . " = " . $ext->name . " = " . $exm->name . " = " . $mod->name ."<br>";
                        $str = "fm".$cls->id.$ext->id.$exm->id.$mod->id;
                        // echo $str ;
                        if($request->$str){
                            $etmcs = Exmtypmodcls::firstOrNew([
                                    'session_id'=> $ses->id,
                                    'clss_id'   => $cls->id,
                                    'exam_id'   => $exm->id,
                                    'extype_id' => $ext->id,
                                    'mode_id'   => $mod->id,
                            ]);
                            // $etmcs = new Exmtypmodcls;
                            // $etmcs->session_id = $ses->id;
                            // $etmcs->clss_id = $cls->id;
                            // $etmcs->exam_id = $exm->id;
                            // $etmcs->extype_id = $ext->id;
                            // $etmcs->mode_id = $mod->id;
                            $etmcs->status = "Oke";
                            $etmcs->save();
                        }else{
                            // echo "Null" . "<br>";
                        }

                        // $etmcs = Exmtypmodcls::firstOrNew(['session_id'=>$ses->id,
                        //         'clss_id'   => $cls->id,
                        //         'exam_id'   => $exm->id,
                        //         'extype_id' => $ext->id,
                        //         'mode_id'   => $mod->id,
                        // ]);

                        
                    }
                }
            }
        }

        echo "Hello";
    }



    public function exmtypmodclsAssign(Request $request, $clss_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $exms = Exam::where('session_id', $ses->id)->get();
        $clss = Clss::where('session_id', $ses->id)
                    ->where('id', $clss_id)->get();
        $exts = Extype::where('session_id', $ses->id)->get();
        $mods = Mode::where('session_id', $ses->id)->get();
        
        return view ('exmtypmodcls.exmtypmodclsAssign')
            ->with('exms', $exms)
            ->with('clss', $clss)
            ->with('exts', $exts)
            ->with('mods', $mods)
            ;
    }

    public function exmtypmodclsAssignSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $str = $request->clsId ;//"fm".$clss->first()->id.$ext->id.$exm->id.$mod->id;
        echo $str ;
        // extype > exam > mode > (clss)
        print_r($request->etmcs);
        $arr = explode("-", $request->etmcss);
        foreach($request->etmcs as $rec){
            $etmcs = Exmtypmodcls::firstOrNew([
                    'session_id'=> $ses->id,
                    'clss_id'   => $clss_id,
                    'extype_id' => $arr[0],
                    'exam_id'   => $arr[1],
                    'mode_id'   => $arr[2],
            ]);
            
            $etmcs->status = "Oke";
            $etmcs->save();
        }
    }
}
