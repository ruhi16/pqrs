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

class SessionController extends Controller
{
    public function session(){
        $sessions = Session::all();
        $sessionfin = Finalizeparticular::where('particular', 'sessions')->first();


        return view ('sessions.session')
        ->withSessions($sessions)
        ->with('sessionfin', $sessionfin)
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

    public function sessionsView(){
        $sessions = Session::all();

        return view('sessions.sessionView')
        ->withSessions($sessions)
        ;
    }
    
    public function addSession(Request $request){
        
        $max_id = Session::max('id');
        $session = new Session;

        $session->name = $request->currses;
        $session->stdate = $request->fromdt;
        $session->entdate = $request->todt;
        $session->status = "CLOSED";
        $session->prsession_id = ($max_id == Null ? 0 : $max_id);
        // $session->nxsession_id = ($max_id == Null ? 0 : ($max_id+1));
        $session->save();


        // if($max_id == NULL){
        // $ses = Session::find($max_id);
        // $ses->nxsession_id = ($session->id != NULL ?: 0);
        // $ses->save();
        
        return back();
    }

    public function editSession($session_id){
       

        return back();
    } 
}
