<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Session;
use App\Exam;
use App\Extype;
use App\Mode;
use App\Clss;
use App\Subject;
use App\Section;

use App\Studentdb;
use App\Studentcr;

use App\Clssub;
use App\Clssec;

use App\Subjfullmark;
use App\Exmtypclssub;
use App\Marksentry;
use App\Exmtypmodcls;
use App\Exmtypmodclssub;

class ModefmController extends Controller
{
    public function exmtypmodclssubfmEntry(Request $request, $clss_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $cls   = Clss::find($clss_id);
        // $etcss = Exmtypclssub::all(); 
        $clsbs = Clssub::all();
        $exams = Exam::all();
        $extps = Extype::all();
        $exmds = Mode::all();

        $etmcs = Exmtypmodcls::whereClss_id($clss_id)->whereSession_id($ses->id)->get();
        $etcss = Exmtypclssub::whereClss_id($clss_id)->whereSession_id($ses->id)->get();

        $flmrs = Subjfullmark::all();
        $etmcsfm = Exmtypmodclssub::where('clss_id', $clss_id)
            ->get();

        return view('exmtypmodclssub.exmtypmodclssubfmEntry')
        ->withCls($cls)
        ->withExams($exams)
        ->withExtps($extps)
        ->withExmds($exmds)
        ->withEtcss($etcss)
        ->withClsbs($clsbs)
        ->withEtmcs($etmcs)
        ->withFlmrs($flmrs)
        ->withEtmcsfm($etmcsfm)
        ;
    }

    public function exmtypmodclssubfmEntrySubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        // foreach($request->fmarks as $fm){
        for($i=0; $i<count($request->fmarks); $i++){
            if($request->fmarks[$i]){
                // echo $request->fmarks[$i] . $request->fmarksId[$i] ."<Br>";
                // exam > extype > mode > cls > subject
                $arr = explode('-', $request->fmarksId[$i]);
                // echo ":";
                // print_r($arr);
                // echo ":";
                $etmcs = Exmtypmodclssub::firstOrNew([
                    'exam_id'   => $arr[0],
                    'extype_id' => $arr[1],
                    'mode_id'   => $arr[2],
                    'clss_id'  =>  $arr[3],
                    'subject_id'=> $arr[4],
                    'session_id'=> $ses->id,
                ]);

                // $etmcs = new Exmtypmodclssub;
                // $etmcs->exam_id = $arr[0];
                // $etmcs->extype_id = $arr[1];
                // $etmcs->mode_id   = $arr[2];
                // $etmcs->clss_id  =  $arr[3];
                // $etmcs->subject_id = $arr[4];
                // $etmcs->session_id = $ses->id;

                $etmcs->fm = $request->fmarks[$i];
                $etmcs->pm = 0;
                $etmcs->save();

            }
        }
        return back();
        // echo "Hello";
    }


}
