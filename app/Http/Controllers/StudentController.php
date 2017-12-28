<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Session;
use App\Exam;
use App\Extype;
use App\Clss;
use App\Subject;
use App\Studentdb;
use App\Studentcr;

use App\Clssub;

use App\Exmtypclssub;


class StudentController extends Controller
{
    public function studentdb(){
        $stds = Studentdb::all();

        return view ('studentdb')
        ->with('stds', $stds)
        ;
    }

    public function studentdbSubmit(Request $request){
        
    }
}
