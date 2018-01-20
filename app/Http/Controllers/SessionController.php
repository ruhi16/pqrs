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

class SessionController extends Controller
{
    public function session(){
        $sessions = Session::all();

        return view ('session')
        ->withSessions($sessions)
        ;
    }
    public function setSession($session_id){

        echo "SET SESSION";
        DB::table('sessions')->update(['Status'=>'CLOSED']);
        
        $session = Session::find($session_id);
        $session->status = 'CURRENT';
        $session->save();
        return back();
    } 
    
    public function addSession(Request $request){
        
        $max_id = Session::max('id');
        $session = new Session;

        $session->name = $request->currses;
        $session->stdate = $request->fromdt;
        $session->entdate = $request->todt;
        $session->status = "CLOSED";
        $session->prsession_id = $max_id;        
        $session->save();


        
        $ses = Session::find($max_id);
        $ses->nxsession_id = $session->id;
        $ses->save();
        
        return back();
    }

    public function editSession($session_id){
       

        return back();
    } 
}
