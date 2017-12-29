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

use App\Clssub;
use App\Clssec;


use App\Exmtypclssub;

class ClsSecController extends Controller
{
    public function clssecTaskPage(){
        $clssecs = Clssec::all();
        
        return view('clssecView')
        ->with('clssecs', $clssecs)
        ;
    }
}
