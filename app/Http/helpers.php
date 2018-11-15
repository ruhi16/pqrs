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

function getGrade($extypeid, $data, $fullMarks){
    $ses = Session::whereStatus('CURRENT')->first();
    $extyps = Extype::whereSession_id($ses->id)
                ->whereName($extypeid)->first();
     
    $data = round(( ( $data / $fullMarks ) * 100), 0); // calculate %
  
    $grds = Grade::whereExtype_id($extypeid)
        ->where('stpercentage', '<=', $data)          
        ->where('enpercentage', '>=', $data)      
        ->first();

  
    if( !$grds ){ 
        return 'NA';
    }
    return ($grds->gradeparticular->name);
}



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



function convert($number){
         $hyphen      = '-';
         $conjunction = ' and ';
         $separator   = ', ';
         $negative    = 'negative ';
         $decimal     = ' point ';
         $dictionary  = array(
          0                   => 'Zero',
          1                   => 'One',
          2                   => 'Two',
          3                   => 'Three',
          4                   => 'Four',
          5                   => 'Five',
          6                   => 'Six',
          7                   => 'Seven',
          8                   => 'Eight',
          9                   => 'Nine',
          10                  => 'Ten',
          11                  => 'Eleven',
          12                  => 'Twelve',
          13                  => 'Thirteen',
          14                  => 'Fourteen',
          15                  => 'Fifteen',
          16                  => 'Sixteen',
          17                  => 'Seventeen',
          18                  => 'Eighteen',
          19                  => 'Nineteen',
          20                  => 'Twenty',
          30                  => 'Thirty',
          40                  => 'Fourty',
          50                  => 'Fifty',
          60                  => 'Sixty',
          70                  => 'Seventy',
          80                  => 'Eighty',
          90                  => 'Ninety',
          100                 => 'Hundred',
          1000                => 'Thousand',
        );

              if (!is_numeric($number) ) return false;
              $string = '';
              switch (true) {
                case $number < 21:
                    $string = $dictionary[$number];
                    break;
                case $number < 100:
                    $tens   = ((int) ($number / 10)) * 10;
                    $units  = $number % 10;
                    $string = $dictionary[$tens];
                    if ($units) {
                        $string .= $hyphen . $dictionary[$units];
                    }
                    break;
                case $number < 1000:
                    $hundreds  = $number / 100;
                    $remainder = $number % 100;
                    $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                    if ($remainder) {
                        $string .= $conjunction . convert($remainder);
                    }
                    break;
                default:
                    $baseUnit = pow(1000, floor(log($number, 1000)));
                    $numBaseUnits = (int) ($number / $baseUnit);
                    $remainder = $number % $baseUnit;
                    $string = convert($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                    if ($remainder) {
                        $string .= $remainder < 100 ? $conjunction : $separator;
                        $string .= convert($remainder);
                    }
                    break;
              }
              return $string;
            }