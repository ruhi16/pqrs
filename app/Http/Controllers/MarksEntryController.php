<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
use App\Gradeparticular;
use App\Teacher;
use App\Clssteacher;


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
        
        $exm = Exam::whereSession_id($ses->id)->get();
        $exmtyp = Extype::whereSession_id($ses->id)->get();
        $modes = Mode::whereSession_id($ses->id)->get();
        $clsb = Clssub::whereClss_id($clssec->clss_id)->get();

        $stdmrk = Marksentry::whereSession_id($ses->id)
                    ->where('clssec_id', $clssec->id)
                    ->get();
        
        return view('clssecMrkenPage')
        ->withExtpcls($extpcls) 
        ->withExtpmdcls($extpmdcls)
        ->withClsb($clsb)
        ->withClsc($clssec)        
        ->withExm($exm)
        ->withExmtyp($exmtyp) 
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

        $ansdistteacher = Answerscriptdistribution::where('session_id', $extpcls->session_id)
            ->where('exam_id',   $extpcls->exam_id)
            ->where('extype_id', $extpcls->extype_id)
            ->where('clss_id',   $extpcls->clss_id)
            ->where('section_id',$clsc->section->id)
            ->where('subject_id',$extpcls->subject_id)
            ->first();
        
        // $loginteacher = Teacher::find(Auth::user()->teacher_id);
        $loginteacher = Teacher::where('user_id', Auth::user()->id)->first();
        // dd(Teacher::find(Auth::user()->teacher_id));
        // dd(Auth::user());
        // dd($loginteacher);
        $clteacher = Clssteacher::where('session_id', $ses->id)
            ->where('teacher_id', $loginteacher->id)
            ->first();
        
        // dd($clteacher);
        return view ('clssecMrkentryPage')
        ->withExtpcls($extpcls)
        ->withClsc($clsc)
        ->withClsb($clsb)
        ->withStdcrs($stdcrs)
        ->withStdmrks($stdmrks)
        ->withAnsdistteacher($ansdistteacher)
        ->withLoginteacher($loginteacher)
        ->withClteacher($clteacher)
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
        //$etclsbfm = Extclssubfmpm::all();


        $mrks = Marksentry::whereSession_id($ses->id)
                    ->where('clssec_id', $clsc->id)
                    ->get();
        //dd($mrks);

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
        //->withEtclsbfm($etclsbfm)
        ->withMrks($mrks)
        ;
    }

    public function clssecMarksRegisterv2($clssec_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $clsc = Clssec::find($clssec_id);
        $clsbs = Clssub::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)
            ->get();

        $exams = Exam::whereSession_id($ses->id)->get();

        $stdcrs = Studentcr::whereSession_id($ses->id)
            ->whereClss_id($clsc->clss_id)
            ->whereSection_id($clsc->section_id)
            ->get();

        $stdmarks = Marksentry::where('session_id', $ses->id)
                    ->where('clssec_id', $clsc->id)
                    ->get();

        $extpmdclsbs = Exmtypmodclssub::whereSession_id($ses->id)
                            ->whereClss_id($clsc->clss_id)        
                            ->get();

        //echo "Marks Entry Register " . "<br>";
        //echo "class: ".$clsc->clss->name .", section: ".$clsc->section->name . "<br>";

        $clssecDetails = [];
        foreach($stdcrs as $stdcr){
            //echo "Name: ". $stdcr->studentdb->name ;            
            $stdmarks = $stdmarks->where('studentcr_id', $stdcr->id);
            
            $clssecStdcr = [];

            $stdDetails = [];
            //$stdDetails['id']   = $stdcr->id;
            $stdDetails['name'] = $stdcr->studentdb->name;
            $stdDetails['clss'] = $stdcr->clss->name;
            $stdDetails['sect'] = $stdcr->section->name;
            $stdDetails['roll'] = $stdcr->roll_no;
            //array_push($clssecDetails, $stdDetails);
            $clssecStdcr['stdcr'] = $stdDetails;

            $clssubDetails = [];
            foreach($clsbs as $clsb){
                //echo " ". $clsb->subject->code ;                
                $subjDetails = [];

                $clssub = [];
                //$clssub['subid']    = $clsb->subject->id; 
                $clssub['subname']  = $clsb->subject->name; 
                //$clssub['subcode']  = $clsb->subject->code; 
                $clssub['subtype']  = $clsb->subject->extype->name; 
                
                //array_push($clssubDetails, $clssub);
                
                
                $marksDetails = [];
                foreach($exams as $exam){
                    $marks = [];
                    //echo " ". $exam->id . ":" ;
                    $extpmdclsb = $extpmdclsbs
                            ->where('subject_id', $clsb->subject_id)
                            ->where('exam_id', $exam->id)                            
                            ;
                    // dd($extpmdclsb);
                    $stdmark = $stdmarks
                                ->where('clssub_id', $clsb->id)
                                ->where('exmtypmodclssub_id', $extpmdclsb->first()->id)                                
                                ;
                    
                    
                    if($extpmdclsb->count() > 1){
                        //for class V & X only, each subject have 1 exam for exam-extype combination(oral or written)
                        $obmark = $stdmark;//->first() == NULL ? 'NA' : $stdmark->first()->marks ;
                        $flmark   = $extpmdclsb;//->first() == NULL ? 'NA' : $extpmdclsb->first()->fm ;
                        
                        $marks['exam'] = $exam->name;
                        foreach($extpmdclsb as $extpmdclsbmode){
                            $i = $extpmdclsbmode->mode_id;
                            //echo $extpmdclsbmode->id ."xxx";
                            $marks['obtm'.$i] = $obmark->where('exmtypmodclssub_id', $extpmdclsbmode->id)->first() == NULL ? 'NA' 
                                        : $obmark->where('exmtypmodclssub_id', $extpmdclsbmode->id)->first()->marks;

                            $marks['fulm'.$i] = $flmark->where('id', $extpmdclsbmode->id)->first() == NULL ? 'NA'
                                        : $flmark->where('id', $extpmdclsbmode->id)->first()->fm;
                        
                            //dd($obmark->where('exmtypmodclssub_id', 184));
                        }
                        
                        array_push($marksDetails, $marks);
                    }else{
                        //for class IX & X only, each subject have 2 exam for exam-extype combination(oral or written)
                        $obmark = $stdmark->first() == NULL ? 'NA' : $stdmark->first()->marks ;
                        $flmark   = $extpmdclsb->first() == NULL ? 'NA' : $extpmdclsb->first()->fm ;

                        $marks['exam'] = $exam->name;
                        $marks['obtm'] = $obmark;
                        $marks['fulm'] = $flmark;
                        array_push($marksDetails, $marks);
                    }
                }

                array_push($subjDetails, $clssub);
                array_push($subjDetails, $marksDetails);

                array_push($clssubDetails, $subjDetails);
            }

            
            $clssecStdcr['subjs'] = $clssubDetails;
            
            array_push($clssecDetails, $clssecStdcr);
        }
        //dd($clssecDetails);
        $extypes = Extype::where('session_id', $ses->id)->get();
        
        $modes = Exmtypmodcls::where('session_id', $ses->id)
                    ->where('clss_id', $clsc->clss_id)
                    ->groupBy(['extype_id','mode_id'])
                    ->get();
        //dd($modes);

        return view('clssecMarksRegister.clssecMarksRegisterv2')
            ->with('clssecDetails', $clssecDetails)
            ->with('exams', $exams)
            ->with('extypes', $extypes)
            ;

    }

    public function clssecMarksRegisterv3($clssec_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $clsc = Clssec::find($clssec_id);
        $clssubs = DB::table('clssubs')->where('clssubs.session_id', $ses->id)
            ->where('clss_id', $clsc->clss_id)
            ->join('subjects', 'subjects.id', '=', 'clssubs.subject_id')
            //->select()
            ->get();
        //dd($clssubs);

        $studentcrs = Studentcr::whereSession_id($ses->id)
                        ->where('clss_id', $clsc->clss_id)
                        ->where('section_id', $clsc->section_id)
                        ->get();

        $marks = Marksentry::whereSession_id($ses->id)
                    ->whereIn('studentcr_id', $studentcrs->pluck('id'))
                    ->orderBy('studentcr_id')
                    ->get();

                    
        $exams = Exam::whereSession_id($ses->id)->get();
        $extypes = Extype::whereSession_id($ses->id)->get();
        $extpmdclsbs = Exmtypmodclssub::whereSession_id($ses->id)
                        ->where('clss_id', $clsc->clss_id)
                        ->get();
        $grades = Grade::whereSession_id($ses->id)->get();
        $gradeparticular = Gradeparticular::whereSession_id($ses->id)->get();
        $modes = Mode::whereSession_id($ses->id)->get();

    return view('clssecMarksRegister.clssecMarksRegisterv3')
            ->with('clssecMarks', $marks->sortBy('studentcr_id'))
            ->with('studentcrs', $studentcrs->sortBy('studentdb_id'))
            ->with('clssubs',$clssubs)
            ->with('exams',$exams)
            ->with('extypes',$extypes)
            ->with('extpmdclsbs', $extpmdclsbs)
            ->with('grades', $grades)
            ->with('gradeparticular', $gradeparticular)
            ->with('modes', $modes)
            ;
    }

    public function clssecstdMarksEntryForAllSubj($extpmdcl_id, $clsc_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $extpmdcl = Exmtypmodcls::find($extpmdcl_id);
        $clsc = Clssec::find($clsc_id);
        $exmtyp = Extype::whereSession_id($ses->id)->get();
        
        $subj = Subject::where('extype_id', $exmtyp->where('name', 'Formative')->first()->id)->get();//Formative Only

        
        $clsb = Clssub::where('clss_id', $clsc->clss_id)
                    ->whereIn('subject_id', $subj->pluck('id'))
                    ->get();
        
        $stdcrs = Studentcr::whereSession_id($ses->id)
            ->whereClss_id(Clssec::find($clsc->id)->clss->id)
            ->whereSection_id(Clssec::find($clsc->id)->section->id)->get();
        
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
                ->where('clssec_id', $clsc->id)                
                ->get();       

        return view('clssecMarksEntry.clssecMrkentryForAllSubj')
        ->withExtpmdcl($extpmdcl)
        ->withClsc($clsc)
        ->withClsb($clsb)
        ->withStdcrs($stdcrs)
        ->withStdmrks($stdmrks)
        ->withExtpmdclsbs($extpmdclsbs)
        ;

    }

    //Ajux Formative All Subject Marks Entry
    public function updateForAllSubjMarks(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();

        $arr = [];
        foreach($request['mrk'] as $abc){
            $arr[$abc['subid']] = $abc['marks'];
        }

        
        
        


        $stdcr_id = $request['id'];
        $etmc_id  = $request['etc'];
        $clsc_id  = $request['csc'];

        $extpmdcl = Exmtypmodcls::find($etmc_id);
        $extpmdclsb = Exmtypmodclssub::whereSession_id($ses->id)
                        ->where('exam_id',  $extpmdcl->exam_id)
                        ->where('extype_id',$extpmdcl->extype_id)
                        ->where('mode_id',  $extpmdcl->mode_id)
                        ->where('clss_id',  $extpmdcl->clss_id)
                        ->get();
        $value = "";
        // foreach($arr as  $k => $v){
        //     $value .= $k . "=" . $v . "\n";
        // }
        


        $test='';
        foreach($arr as $key => $mrk){      //$key=>clssub_id       &       $mrk=> obtained marks

            if(strtoupper($mrk) == 'AB' or $mrk == ''){
                $mrk = -99;
            }else{
                $mrk = $mrk; //Marks
            }

            // $value .= $key.':' .$mrk .'; ';

            $etmcs = $extpmdclsb->where('subject_id', Clssub::find($key)->subject_id)->first();
            // $clsb  = Clssub::where('clss_id',  $etmcs->clss_id)
            //                 ->where('subject_id', $etmcs->subject_id)->first();

            $stdmarks = Marksentry::firstOrNew([
                'session_id' => $ses->id,
                'exmtypmodclssub_id' =>$etmcs->id,
                'clssec_id' => $clsc_id,
                'clssub_id' => $key,
                'studentcr_id' => $stdcr_id
            ]);
            
            

            $stdmarks->clssec_id = $clsc_id;
            $stdmarks->exmtypmodclssub_id = $etmcs->id;
            $stdmarks->clssub_id = $key;
            $stdmarks->studentcr_id = $stdcr_id;
            $stdmarks->session_id = $ses->id;
            $stdmarks->marks = $mrk;
            $stdmarks->status = "Correct";
            $stdmarks->save();
            $test .= $stdmarks->id.'->'.$mrk.'/';
        }
        // return response()->json(['data'=>'abcd']);
        // return response()->json(['sid'=>$stdcr_id,'data'=>$test]);
        return response()->json(['sid'=>$stdcr_id, 'data'=> $value.'-'.$stdcr_id.'-'.$etmc_id.'-'.$clsc_id.'-'.$test]);
    }


}
