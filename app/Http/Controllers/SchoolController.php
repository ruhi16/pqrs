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


class SchoolController extends Controller
{
    public function schoolInfo(){


        return view('school');
    }

    public function schoolInfoSubmit(Request $request){



    }

    public function schoolInfoView(){

        
    }
}
