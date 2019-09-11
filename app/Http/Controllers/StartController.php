<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Route;

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
use App\Resultcr;

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

class StartController extends Controller
{
    public function start(Request $request){

            $ses = Session::whereStatus('CURRENT')->first();
            $clssecs = Clssec::whereSession_id($ses->id)->get();            
            $clss = Clss::where('session_id', $ses->id)->get();

            $stdcrs = Studentcr::where('session_id', $ses->id)
                        //->where('clss_id',1)
                        //->where('section_id', 1)
                        ->get();
            $stddbs = Studentdb::all();


            $stdcrsClsSecMF = [];

            foreach($stdcrs as $std){
                $str = $std->clss_id.'-'.$std->section_id.'-'.$std->studentdb->ssex;
                $stdcrsClsSecMF[$std->studentdb->id] = strtoupper($str);
            }

            // print_r(array_count_values($stdcrsClsSecMF));
            $stdcrsClsSecMF = array_count_values($stdcrsClsSecMF);
            // echo "<br><br>";
            // foreach($stdcrsClsSecMF as $key => $abc){
                // echo $key . ' -> ' . $abc . "<br>";                
            // }


            $controllers = [];
            foreach (Route::getRoutes()->getRoutes() as $route){
                $action = $route->getAction();
                if (array_key_exists('controller', $action)){
                    // You can also use explode('@', $action['controller']); here
                    // to separate the class name from the method
                    
                    $controllers[] = $action['controller'];
                    $controllers = array_map(function ($controller) {
                        return str_replace('Http\Controllers\\', '', $controller);
                    }, $controllers);
                }
            }
            

            $exams = Exam::whereSession_id($ses->id)->get();
            $extype = Extype::where('session_id', $ses->id)->where('name', 'Summative')->get();

            return view('start')
                ->with('clssecs', $clssecs)
                ->with('stdcrs', $stdcrs)    
                ->with('clss', $clss)
                ->with('controllers',$controllers)
                ->with('stdcrsClsSecMF', $stdcrsClsSecMF)
                ->with('exams', $exams)
                ->with('extype', $extype)
                ; //homepage
    
    }

    public function start2(Request $request){



        return view('starts.start2');
    }




}
