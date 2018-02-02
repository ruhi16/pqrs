<?php
use Illuminate\Http\Request;

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


function Message($extype, $data){
    $ses = Session::whereStatus('CURRENT')->first();
    $extyps = Extype::whereSession_id($ses->id)
                ->whereName($extype)->first();
    // foreach($extyps as $et){
    //     echo $et->id;
    // }
    // echo $extyps->id;

    $grds = Grade::whereExtype_id($extyps->id)
        ->where('stpercentage','<=',$data)          
        ->where('enpercentage','>=',$data)      
        ->first();

    // foreach($grds as $grd){
    //     echo $grd->gradeparticular->name;
    // }
    // return "Hello".$data;
    if(!$grds)return 'AB';
    return ($grds->gradeparticular->name);
}