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
use App\Extclssubfmpm;
/**
 * 
 */

function findGrade($extypeid, $clssid, $clssubid, $data){
    $ses = Session::whereStatus('CURRENT')->first();
    $extyps = Extype::whereSession_id($ses->id)
                ->whereName($extypeid)->first();

    $fullMarks = Extclssubfmpm::where('clss_id', $clssid)
            ->where('extype_id', $extypeid)
            ->where('subject_id', $clssubid)
            ->first();
            
    // echo $extypeid . "-" . $clssid . "-" . $clssubid . "-" . $data ; 
    // dd($fullMarks);
    // foreach($extyps as $et){
    //     echo $et->id;
    // }
    // echo $extyps->id;
    $data = ( $data / $fullMarks->subject_fm ) * 100;
    // dd($data);
    $grds = Grade::whereExtype_id($extypeid)
        ->where('stpercentage', '<=', $data)          
        ->where('enpercentage', '>=', $data)      
        ->first();

    // foreach($grds as $grd){
    //     echo $grd->gradeparticular->name;
    // }
    // return "Hello".$data;
    if( !$grds ){ 
        return 'AB';
    }
    return ($grds->gradeparticular->name);
}






function getTableColumns($table_name) {
        return DB::connection()->getSchemaBuilder()->getColumnListing($table_name);
}