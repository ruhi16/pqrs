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
use App\Grade;


use App\Exmtypclssub;
use App\Marksentry;

class ResultController extends Controller
{
    public function IndividulaResult(){


        
        return view('results.indvidualResult');
    }
}
