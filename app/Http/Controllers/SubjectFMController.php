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

use App\Subjfullmark;
use App\Exmtypclssub;
use App\Marksentry;

class SubjectFMController extends Controller
{
    public function clssubjfm($clss_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $cls   = Clss::find($clss_id);
        $etcss = Exmtypclssub::all(); 
        $clsbs = Clssub::all();
        $exams = Exam::all();
        $etcss = Exmtypclssub::whereClss_id($clss_id)->get();

        $flmrs = Subjfullmark::all();

        // echo $clss->name;
        // foreach($clss as $c){
        //     echo $c->id;
        // }
        // var_dump($clss);

        return view('clssubjfm')
        ->withCls($cls)
        ->withExams($exams)
        ->withEtcss($etcss)
        ->withClsbs($clsbs)
        ->withFlmrs($flmrs)
        ;
    }    
    public function clssubjfmSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $exams = Exam::all();
        $extps = Extype::all();
        $clss  = Clss::all();

        $etcss = Exmtypclssub::whereClss_id($request->clsId)->get();
        $clsbs = Clssub::whereClss_id($request->clsId)->get();

        $etcss = Exmtypclssub::all();
        // echo "Cls Id:".$request->clsId;
        foreach($exams as $exm){
            foreach($extps as $ext){
                $strSubs = "sb".$exm->id.$ext->id.$request->clsId;
                $temp = [];
                foreach($request->$strSubs as $sbId){
                    $clsbId = Clssub::whereClss_id($request->clsId)
                            ->whereSubject_id($sbId)->first()->id;                    
                    $strMrks = "fm".$exm->id.$ext->id.$request->clsId.$sbId;
                    $rec = [];
                    $rec['fm'] = $request->$strMrks[0];
                    $rec['status'] = 'Active';
                    $rec['notes']  = '';
                    // print_r($request->$strMrks);
                    // echo "<br>";
                    $temp[$clsbId] = $rec;
                }
                $etcs = Exmtypclssub::whereSession_id($ses->id)
                        ->whereExam_id($exm->id)                
                        ->whereExtype_id($ext->id)
                        ->whereClss_id($request->clsId)                            
                        ->first();

                $etcs->clssubs()->sync($temp);                         
            }
        }        
        return back();
    }

    public function clssubjfmView($clss_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $cls   = Clss::find($clss_id);
        $etcss = Exmtypclssub::all(); 
        $clsbs = Clssub::all();
        $exams = Exam::all();
        $etcss = Exmtypclssub::whereClss_id($clss_id)->get();

        $flmrs = Subjfullmark::all();

        // echo $clss->name;
        // foreach($clss as $c){
        //     echo $c->id;
        // }
        // var_dump($clss);

        return view('clssubjfmView')
        ->withCls($cls)
        ->withExams($exams)
        ->withEtcss($etcss)
        ->withClsbs($clsbs)
        ->withEtcss($etcss)
        ->withFlmrs($flmrs)
        ;
    } 
}
