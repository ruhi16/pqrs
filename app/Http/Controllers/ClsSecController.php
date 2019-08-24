<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use PDF;
use App\Session;
use App\Exam;
use App\Extype;
use App\Clss;
use App\Subject;
use App\Section;
use App\Teacher;
use App\School;

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
        // echo $m;
        
        // echo $ses->id;
        if($m > 0){
            $delrow = Clssec::whereClss_id($clss_id)
                ->whereSection_id($m)->delete();
                // print_r($delrow);

            // $cls->sections()->detach($m,['session_id'=>$ses->id]);
        }
        return redirect()->to('/clssecs');
    }






    //Class Section wise Reports
    public function reportStdList($clss_id, $section_id){
        $school = School::all()->first();
        $ses = Session::whereStatus('CURRENT')->first();
        $clss = Clss::find($clss_id);
        $secs = Section::find($section_id);
        
        $stds = Studentcr::where('session_id',$ses->id)
                ->where('clss_id', $clss_id)
                ->where('section_id', $section_id)
                ->get();

        $exms = Exam::where('session_id', $ses->id)->get();
        


        return view('clssecs.reports.reportsstdlist')
            ->with('stdList', $stds)
            ->with('exms', $exms)
            ->with('clss', $clss)
            ->with('section', $secs)
            ->with('session', $ses)
            ->with('school', $school)            ;
    }

    public function reportsStdListPdf($clss_id, $section_id){
        $school = School::all()->first();
        $ses = Session::whereStatus('CURRENT')->first();
        $clss = Clss::find($clss_id);
        $secs = Section::find($section_id);
        $subjs = Subject::where('extype_id', 1)->get();

        $stds = Studentcr::where('session_id',$ses->id)
                ->where('clss_id', $clss_id)
                ->where('section_id', $section_id)
                ->get();

        $exms = Exam::where('session_id', $ses->id)->get();
        

        $pdf = PDF::loadView('clssecs.reports.reportsstdlistHTML', 
            ['stdList'=>$stds, 'exms'=>$exms,'clss'=>$clss, 'section'=>$secs, 'session'=>$ses, 
             'school' =>$school, 'subjs'=>$subjs
            ]);

        // $pdf->setPaper("a4");        
        // return $pdf->stream(); //only to show in browser

        $nameStr ="StudMasterRolls".$ses->name . "-" . $clss->name ."-". $secs->name ."-StudentList.pdf" ;
        return $pdf->stream($nameStr);

    }

    public function reportsStdListSummativePdf($clss_id, $section_id){
        $school = School::all()->first();
        $ses = Session::whereStatus('CURRENT')->first();
        $clss = Clss::find($clss_id);
        $secs = Section::find($section_id);
        $subjs = Subject::where('extype_id', 1)->get();

        $stds = Studentcr::where('session_id',$ses->id)
                ->where('clss_id', $clss_id)
                ->where('section_id', $section_id)
                ->get();

        $exms = Exam::where('session_id', $ses->id)->get();
        

        $pdf = PDF::loadView('clssecs.reports.reportsstdlistSummativeHTML', 
            ['stdList'=>$stds, 'exms'=>$exms,'clss'=>$clss, 'section'=>$secs, 'session'=>$ses, 
             'school' =>$school, 'subjs'=>$subjs
            ]);

        // $pdf->setPaper("a4");        
        // return $pdf->stream(); //only to show in browser

        $nameStr ="SummativeMarksSheet".$ses->name . "-" . $clss->name ."-". $secs->name ."-StudentList.pdf" ;
        return $pdf->download($nameStr);
    }

    public function reportsStdListFormativePdf($clss_id, $section_id){
        $school = School::all()->first();
        $ses = Session::whereStatus('CURRENT')->first();
        $clss = Clss::find($clss_id);
        $secs = Section::find($section_id);
        $subjs = Subject::where('extype_id', 1)->get();

        $stds = Studentcr::where('session_id',$ses->id)
                ->where('clss_id', $clss_id)
                ->where('section_id', $section_id)
                ->get();

        $exms = Exam::where('session_id', $ses->id)->get();
        

        $pdf = PDF::loadView('clssecs.reports.reportsstdlistFormativeHTML', 
            ['stdList'=>$stds, 'exms'=>$exms,'clss'=>$clss, 'section'=>$secs, 'session'=>$ses, 
             'school' =>$school, 'subjs'=>$subjs
            ]);

        // $pdf->setPaper("a4");        
        // return $pdf->stream(); //only to show in browser

        $nameStr ="FormativeMarksSheet".$ses->name . "-" . $clss->name ."-". $secs->name ."-StudentList.pdf" ;
        return $pdf->download($nameStr);
    }
    
    public function clssecTaskPage(){
        $ses = Session::whereStatus('CURRENT')->first();
        $clssecs = Clssec::whereSession_id($ses->id)
                ->orderBy('clss_id')->orderBy('section_id')->get();
        // dd($clssecs);
        $teachers = Teacher::all();
        $clssteachers = Clssteacher::all();
        // foreach($clssecs as $cs){
        //    print_r($cs->clss()->first()->name);echo "<br>";
        // }
        return view('clssecTaskPage')
        ->with('session',$ses)
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
        
        
        //Current Session: New Admission
        $stdb = Studentdb::whereStsession_id($ses->id)
        ->where('stclss_id', $clss_id)
        ->where('stsec_id', $section_id)
        ->get();

        //Previouos Session: Promoted & Failed Students
        // $stpr = DB::table('studentcrs')->where('session_id', $ses->prev_session_id)        
        $stpr = Studentcr::whereSession_id($ses->prev_session_id)   
            ->where('next_clss_id', $cls->prev_session_pk)
            ->where('next_section_id', $sec->prev_session_pk)
            ->get(); 

        // dd($stpr);
        // foreach($stpr as $s){
        //     print_r($s); echo "<br><br>";
        // }
        // students whose roll no issued
        $stcr = Studentcr::whereSession_id($ses->id)            
            ->where('clss_id', $cls->id)
            ->where('section_id', $sec->id)            
            ->get();            
        
        // students whose roll no  Issued
        $remRec = $stdb->whereNotIn('id', $stcr->pluck('studentdb_id'));        
        $stpr = $stpr->whereNotIn('studentdb_id', $stcr->pluck('studentdb_id'));

        // dd($stcr);

        $prev_clss = DB::table('clsses')->whereSession_id($ses->prev_session_id)->get();
        $prev_secs = DB::table('sections')->whereSession_id($ses->prev_session_id)->get();

        

        return view('clssecAdminPage')
        ->with('ses', $ses)        
        ->with('stcr', $stcr)
        ->with('stpr', $stpr)        
        ->with('remRec', $remRec)
        ->with('cls', $cls)
        ->with('sec', $sec)
        ->with('prev_clss', $prev_clss)
        ->with('prev_secs', $prev_secs)
        ;
    }

    public function issueRoll($stdbid, $stcrid, $clss_id, $section_id){
        $ses = Session::whereStatus('CURRENT')->first();        
        $stddb = Studentdb::find($stdbid);

        if($stcrid == 0){
            //New Students
            $cls = Clss::where('id', $clss_id)->first();
            $sec = Section::where('id', $section_id)->first();
        }else{
            //Promoted or Failed Students
            $cls = Clss::where('prev_session_pk', $clss_id)->first();
            $sec = Section::where('prev_session_pk', $section_id)->first();
        }



        $stcr = Studentcr::whereSession_id($ses->id)
            ->where('clss_id', $cls->id)
            ->where('section_id', $sec->id)
            ->orderBy('roll_no', 'desc')->get();//max('roll_no');
        

        $stdcr = new Studentcr;
        $stdcr->studentdb_id = $stddb->id;
        $stdcr->session_id = $ses->id;
        $stdcr->clss_id = $cls->id;
        $stdcr->section_id = $sec->id;
        $stdcr->roll_no = ($stcr->count() > 0 ? ($stcr->first()->roll_no+1): 1); //((empty($stcr) ? 0 : $stcr->first()->roll_no ) + 1);
        $stdcr->crstatus = "Running";
        $stdcr->save();

        if($stcrid != 0){
            $studentcr = Studentcr::find($stcrid);
            $studentcr->crstatus = "Running";
            $studentcr->save();
        }

        return redirect()->to(url('/clssec-AdminPage',[$cls->id, $sec->id]));
    }



    
}
