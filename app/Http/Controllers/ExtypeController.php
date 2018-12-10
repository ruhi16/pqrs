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
use App\Miscoption;

class ExtypeController extends Controller
{
    public function extypes(){
        $ses = Session::whereStatus('CURRENT')->first();
        $extypes = Extype::whereSession_id($ses->id)->get();
        $exmodes = Miscoption::where('tabName', 'extypes')
                ->where('fieldName', 'mode')
                ->get();


        return view('extypes.extypes')
        ->withExtypes($extypes)
        ->withExmodes($exmodes)
        ;
    }

    public function extypesSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        // echo $request->examName;
        $extype = new Extype;
        $extype->name = $request->extypeName;
        $extype->mode = $request->extypeMode;
        $extype->session_id = $ses->id;
        $extype->save();
        
        return back();
    }

    public function extypesView(){
        $ses = Session::whereStatus('CURRENT')->first();
        $extypes = Extype::whereSession_id($ses->id)->get();
        // echo "hello";
        return view('extypes.extypesView')
        ->withExams($extypes)
        ;
    }

    public function extypesEditSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $extype = Extype::find($request->editclssId);
        $extype->name = $request->editclssName;
        $extype->mode = $request->editextypeMode;
        $extype->save();
        //echo $request->editextypeMode;
        return back();
    }

    public function extypesDeltSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        $extype = Extype::find($request->deltclssId);
        
        $extype->delete();
        return back();
    }
}
