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

        return view ('studentdb')
        ->with('stds', $stds)
        ->with('allClsSec', $allClsSec)
        ->withClss($clss)
        ;
    }

    public function studentdbSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        // echo $ses->id . "x";
        $name = $request->name;
        $clss = $request->clss;
        // echo $name . $clss ;

        $stddb = new Studentdb;
        $stddb->name  = $request->name;
        $stddb->fname = $request->fname;
        $stddb->stclss_id = $request->clss;
        $stddb->stsession_id = $ses->id;

        $stddb->save();


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

        echo $request->admBookNo;
        echo "<br>".$request->admSlNo;
        echo "<br>".$request->admDate;
        echo "<br>".$request->admCrCls;
        echo "<br>".$request->admPrCls;
        echo "<br>".$request->admPrSch;
    }

    public function studentdbmultipageSearch(Request $request){
        $stddb = Studentdb::all();
        
        return view('studentdbmultipagesearch')->withStddb($stddb);
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
        return "Successfully";
    }
}
