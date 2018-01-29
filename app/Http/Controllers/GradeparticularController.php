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
use App\School;
use App\Gradeparticular;
use App\Grade;
use App\Description;

use App\Studentdb;
use App\Studentcr;
use App\Clssub;
use App\Clssec;

use App\Exmtypclssub;
use App\Marksentry;


class GradeparticularController extends Controller
{
    public function gradeparticulars(){
        $ses = Session::whereStatus('CURRENT')->first();
        $grparts = Gradeparticular::whereSession_id($ses->id)->get();

        return view('gradeparticulars.gradeparticular')
        ->withGrparts($grparts);
    }

    public function gradeparticularsSubmit(){

        
    }

    public function gradeparticularsView(){

        return view('gradeparticulars.gradeparticularView');
    }

    public function gradeparticularsEditSubmit(){

        
    }
    public function gradeparticularsDeltSubmit(){

        
    }
}
