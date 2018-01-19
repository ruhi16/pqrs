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
use App\Finalizeparticular;


class FinalizeController extends Controller
{
    public function finalizeParticulars(){
        $ses = Session::whereStatus('CURRENT')->first();
        $fparts = Finalizeparticular::whereSession_id($ses->id)->get();

        return view ('finalizeParticulars')
        ->with('fparts', $fparts);
    }

    public function finalizeParticularsRefresh(){
        $ses = Session::whereStatus('CURRENT')->first();
        $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name;");
        foreach($tables as $table){
            $recs = Finalizeparticular::firstOrNew(['particular' => $table->name, 
                                                    'session_id' => $ses->id]);
            // echo $table->name ."<br>";
            $recs->particular = $table->name;
            $recs->status     = 'active';
            $recs->session_id = $ses->id;
            $recs->save();
            // print_r($recs);
            if(!$recs){
                echo "Hari";
            }
        }



        return redirect()->to('/finalizeParticulars');
    }

    public function finalizeSchool(Request $request){

        return "School Details Finalized";
    }
}
