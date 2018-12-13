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
use App\Miscoption;

use App\Studentdb;
use App\Studentcr;

use App\Clssub;
use App\Clssec;


use App\Exmtypclssub;
use App\Marksentry;

class StudentController extends Controller
{
    public function studentdb(){
        $ses = Session::whereStatus('CURRENT')->first();
        $stds = Studentdb::whereStsession_id($ses->id)->get();
        $allClsSec = Clssec::whereSession_id($ses->id)->get();
        $clss = Clss::all();
        $secs = Section::all();
        $ssex = Miscoption::where('tabName', 'studentdbs')
                    ->where('fieldName', 'ssex')
                    ->get();

        $relg = Miscoption::where('tabName', 'studentdbs')
                    ->where('fieldName', 'relg')
                    ->get();
        
        $cste = Miscoption::where('tabName', 'studentdbs')
                    ->where('fieldName', 'cste')
                    ->get();

        $natn = Miscoption::where('tabName', 'studentdbs')
                    ->where('fieldName', 'natn')
                    ->get();


        return view ('students.studentdb')
        ->with('stds', $stds)
        ->with('allClsSec', $allClsSec)
        ->withClss($clss)
        ->withSecs($secs)
        ->withSsex($ssex)
        ->withRelg($relg)
        ->withCste($cste)
        ->withNatn($natn)
        ;
    }

    public function studentdbEditpage($studentdb_id){
        $ses = Session::whereStatus('CURRENT')->first();
        // $stddbs = Studentdb::where('session_id', $ses->id)->get();
        $stddb = Studentdb::find($studentdb_id);
        // echo $studentdb_id;
        $clss = Clss::all();
        $secn = Section::all();
        $ssex = Miscoption::where('tabName', 'studentdbs')
                    ->where('fieldName', 'ssex')
                    ->get();

        $relg = Miscoption::where('tabName', 'studentdbs')
                    ->where('fieldName', 'relg')
                    ->get();
        
        $cste = Miscoption::where('tabName', 'studentdbs')
                    ->where('fieldName', 'cste')
                    ->get();

        $natn = Miscoption::where('tabName', 'studentdbs')
                    ->where('fieldName', 'natn')
                    ->get();
        

        return view ('students.studentdbEdit')
        ->with('stddb', $stddb)
        ->with('clss', $clss)
        ->with('secn', $secn)
        ->withSsex($ssex)
        ->withRelg($relg)
        ->withCste($cste)
        ->withNatn($natn)
        ;
    }

    public function studentdbEditpageSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $stddb = Studentdb::find($request->editStddbId);
        
        $stddb->name = $request->admName;
        $stddb->stclss_id = $request->admClss;
        $stddb->stsec_id = $request->admSecn;
        $stddb->ssex = $request->admGndr;
        $stddb->relg = $request->admRelg;
        $stddb->cste = $request->admCste;

        $stddb->save();
        return redirect()->to('/studentdb');
    }





    public function studentdbSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        // echo $ses->id . "x";
        // echo $request->name;
        // echo $request->clss;
        // echo $request->secs;
        // echo $request->ssex;
        // echo $request->relg;
        // echo $request->cste;
        // echo $request->natn;
        // echo $name . $clss ;
        
        //==============================
        $stddb = new Studentdb;
        $stddb->stsession_id = $ses->id;
        $stddb->name  = $request->name;        
        $stddb->stclss_id   = $request->clss;
        $stddb->stsec_id    = $request->secs;        
        // $stddb->ssex        = $request->ssex;
        $stddb->ssex        = $request->ssex;
        $stddb->relg        = $request->relg;
        $stddb->cste        = $request->cste;
        $stddb->natn        = $request->natn;
        $stddb->save();

        //======================
        // $stdcr = new StudentCr;
        // $stdcr->studentdb_id = $stddb->id;
        // $stdcr->session_id = $ses->id;
        // $stdcr->clss_id = $request->clss;
        // $stdcr->section_id = $request->secs;
        // $stdcr->save();


        return back();
    }


    public function studentdbEditSubmit(Request $request){
        $ses    = Session::whereStatus('CURRENT')->first();
        $stddb  = Studentdb::find($request->edStdId);

        // print_r($stddb);
        // echo $request->edName;
        // echo $request->edClss;
        // echo $request->edSecn;
        // echo $request->edGndr;
        // echo $request->edRelg;
        // echo $request->edCste;
        // echo $request->edNatn;
        // echo $request->edStdId;

        $stddb->stsession_id = $ses->id;
        $stddb->name = $request->edName;
        $stddb->stclss_id = $request->edClss;
        $stddb->stsec_id = $request->edSecn;
        $stddb->ssex = $request->edGndr;
        $stddb->relg = $request->edRelg;
        $stddb->cste = $request->edCste;
        $stddb->natn = $request->edNatn;
        $stddb->save();


        $stdcr = StudentCr::whereStudentdb_id($stddb->id)
                ->whereSession_id($ses->id)->first();
        // dd($stdcr);
        $stdcr->session_id = $ses->id;
        $stdcr->clss_id = $request->edSecn;
        $stdcr->section_id = $request->edSecn;
        $stdcr->save();

        return back();

    }

    //Ajax Update Section
    public function updateSection(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        // console.log("hello");
        $str = $request['sec'];
        $ar = explode('-', $str);
        $data = $ar[0];
        $stdb = Studentdb::find($ar[0]);
        $stdb->stsec_id = $ar[1];
        $stdb->save();

        $sec = Section::find($ar[1]);
        return response()->json( ['sid'=> $stdb->id, 'ssec'=>$sec->name]);
    }

    
    public function studentdbmultipage(Request $request){
        $allClss = Clss::all();
        $allOptn = Miscoption::all();

        return view ('studentdbmultipage')
            ->with( 'allClss', $allClss)->with('allOptn', $allOptn);
    }

    public function studentdbmultipageSubmit(Request $request){
        $stddb = new Studentdb;

        $stddb->admBookNo = $request->admBookNo;
        $stddb->admSlNo = $request->admSlNo;
        $stddb->admDate = $request->admDate;

        $stddb->prCls = $request->admPrCls;
        $stddb->prSch = $request->admPrSch;
        
        $stddb->name = $request->stName;
        $stddb->adhaar = $request->stAdhaar;
        $stddb->fname = $request->stFName;
        $stddb->fadhaar = $request->stFAdhaar;
        $stddb->mname = $request->stMName;
        $stddb->madhaar = $request->stMAdhaar;
        $stddb->dob = $request->stDob;
                    
        $stddb->vill = $request->stVill;
        $stddb->post = $request->stPO;
        $stddb->pstn = $request->stPS;
        $stddb->dist = $request->stDist;
        $stddb->pin = $request->stPin;
        $stddb->mobl = $request->stMob;
        
        $stddb->ssex = $request->stSex;
        $stddb->phch = $request->stPhCh;
        $stddb->relg = $request->stRelg;
        $stddb->cste = $request->stCaste;
        $stddb->natn = $request->stNatn;

        $stddb->accNo = $request->stAccNo;
        $stddb->ifsc = $request->stIFSC;
        $stddb->micr = $request->stMICR;
        $stddb->bnnm = $request->stBnName;
        $stddb->brnm = $request->stBrName;

        $stddb->stclss_id = $request->crCls; //** */
        //$stddb->stsec_id = $request->stsec_id;
        //$stddb->stsession_id = $request->stsession_id;
        //$stddb->streason = $request->streason;

        //$stddb->enclss_id = $request->enclss_id;
        //$stddb->ensec_id = $request->ensec_id;
        //$stddb->ensession_id = $request->ensession_id;
        //$stddb->enreason = $request->enreason;

        $stddb->crstatus = "running"; //$request->crstatus;
        //$stddb->remarks = $request->remarks;


        $stddb->save();

        // echo $request->admBookNo;
        // echo "<br>".$request->admSlNo;
        // echo "<br>".$request->admDate;
        // echo "<br>".$request->admCrCls;
        // echo "<br>".$request->admPrCls;
        // echo "<br>".$request->admPrSch;
    }

    public function studentdbmultipageSearch(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $stddb = Studentdb::all();
        $stdcr = Studentcr::where('session_id', $ses->id)->get();
        
        return view('studentdbmultipagesearch')
                    ->withStddb($stddb)
                    ->withStdcr($stdcr)
                    ->with('session', $ses);
    }

    public function studentdbmultipageView(Request $request){
        $stddb = Studentdb::all();

        return view('studentdbmultipageView')
        ->withStddb($stddb);
    }

    public function studentdbmultipageEdit( $id ){
        $stddbInd = Studentdb::find($id);
        $allClss = Clss::all();
        $allOptn = Miscoption::all();

        return view ('studentdbmultipageEdit')
            ->with('stddbInd', $stddbInd)
            ->with( 'allClss', $allClss)->with('allOptn', $allOptn);
        
        // return view('studentdbmultipageEdit')
        //     ->withStddb($stddbInd);
    }

    public function studentdbmultipageEditSubmit(Request $request){
        $stddb = Studentdb::find($request->editId);

        $stddb->admBookNo = $request->admBookNo;
        $stddb->admSlNo = $request->admSlNo;
        $stddb->admDate = $request->admDate;

        $stddb->prCls = $request->admPrCls;
        $stddb->prSch = $request->admPrSch;
        
        $stddb->name = $request->stName;
        $stddb->adhaar = $request->stAdhaar;
        $stddb->fname = $request->stFName;
        $stddb->fadhaar = $request->stFAdhaar;
        $stddb->mname = $request->stMName;
        $stddb->madhaar = $request->stMAdhaar;
        $stddb->dob = $request->stDob;
                    
        $stddb->vill = $request->stVill;
        $stddb->post = $request->stPO;
        $stddb->pstn = $request->stPS;
        $stddb->dist = $request->stDist;
        $stddb->pin = $request->stPin;
        $stddb->mobl = $request->stMob;
        
        $stddb->ssex = $request->stSex;
        $stddb->phch = $request->stPhCh;
        $stddb->relg = $request->stRelg;
        $stddb->cste = $request->stCaste;
        $stddb->natn = $request->stNatn;

        $stddb->accNo = $request->stAccNo;
        $stddb->ifsc = $request->stIFSC;
        $stddb->micr = $request->stMICR;
        $stddb->bnnm = $request->stBnName;
        $stddb->brnm = $request->stBrName;

        $stddb->stclss_id = $request->crCls; //** */
        //$stddb->stsec_id = $request->stsec_id;
        //$stddb->stsession_id = $request->stsession_id;
        //$stddb->streason = $request->streason;

        //$stddb->enclss_id = $request->enclss_id;
        //$stddb->ensec_id = $request->ensec_id;
        //$stddb->ensession_id = $request->ensession_id;
        //$stddb->enreason = $request->enreason;

        $stddb->crstatus = "running"; //$request->crstatus;
        //$stddb->remarks = $request->remarks;


        $stddb->save();
        // return "Successfully";
        return back();
    }

    public function studentdbmultipageListToUpdateSection(){
        //list shoube those student who is not in stdcr
        $ses = Session::whereStatus('CURRENT')->first();
        $stds = Studentdb::whereStsession_id($ses->id)->get();//->where('crstatus', NULL)

        $allClsSec = Clssec::whereSession_id($ses->id)->get();
        

        
        return view('students.studentdbmultipageList')
        ->with('stds', $stds)
        ->with('allClsSec', $allClsSec)        
        ;
    }

    // Ajax Function...
    public function studentdbmultipageUpdateSection(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        
        //console.log('bbb');
        $sid = $request['sid'];
        $sec = $request['sec'];
        $stddb = Studentdb::find($sid);

        $stdcr = Studentcr::firstOrNew(['studentdb_id'=> $sid, 'session_id'=>$ses->id]);
        $stdcr->studentdb_id = $stddb->id; //$sid
        $stdcr->session_id = $ses->id;
        $stdcr->clss_id = $stddb->stclss_id;
        $stdcr->section_id = $sec;
        $stdcr->save();



        $stddb->stsec_id = $sec;
        // if($stddb->crstatus == NULL){
        //     $stddb->crstatus = $stdcr->id; 
        // }else{
        //     $stddb->crstatus .= "-" . $stdcr->id; 
        // }
        $stddb->save();
        

        $section = Section::find($sec);
        return response()->json( ['sid'=> $sid, 'sec'=>$section->name, 'crst'=>$stddb->crstatus]);


    }


    public function studentdbmultipageVerifySection(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        
        $sid = $request['sid']; // stddb_id
        $stdcr = Studentcr::where('studentdb_id', $sid)
                    ->where('session_id', $ses->id)->first();

        $stddb = Studentdb::find($sid);
        if($stddb->crstatus == NULL){
            $stddb->crstatus = $stdcr->id; 
        }else{
            if($stddb->stsession_id != $ses->id){
                $stddb->crstatus .= "-" . $stdcr->id; 
            }
        }
        $stddb->save();

        return response()->json(['m' => $stdcr->id]);
    }



    public function stdIdSubmit(Request $request){
        echo "ID:". $request->std_id;
        $ses = Session::whereStatus('CURRENT')->first();
        $stdDB = Studentdb::findOrFail($request->std_id);

        if( $stdDB ){
            $stdDB->admBookNo = $request->admBookNo;
            $stdDB->admSlNo   = $request->admSlNo; 
            $stdDB->admDate   = $request->admDate;
            $stdDB->save();
        }


        return back();
    }
}
