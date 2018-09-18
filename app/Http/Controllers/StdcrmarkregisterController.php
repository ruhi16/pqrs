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
use App\Mode;

use App\Studentdb;
use App\Studentcr;

use App\Clssub;
use App\Clssec;
use App\Grade;
use App\Teacher;
use App\Clssteacher;


use App\Exmtypclssub;
use App\Marksentry;
use App\Extclssubfmpm;
use App\Exmtypmodcls;
use App\Exmtypmodclssub;
use App\Answerscriptdistribution;


class StdcrmarkregisterController extends Controller
{
    public function clssecStdcrMarkRefreshget(Request $request, $studentcr_id){

        echo $studentcr_id;

        return " Hello get";
    }


    public function clssecStdcrMarkRefreshpost(Request $request, $studentcr_id){

        echo $studentcr_id;
        
        echo $request->arr;

        return " Hello Post";
    }
}
