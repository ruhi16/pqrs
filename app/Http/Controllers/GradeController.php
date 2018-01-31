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

class GradeController extends Controller
{
    public function grades(){
        $ses = Session::whereStatus('CURRENT')->first();
        $grades = Grade::whereSession_id($ses->id)->get();
        $extypes = Extype::whereSession_id($ses->id)->get();
        $grparts = Gradeparticular::whereSession_id($ses->id)->get();
        
        return view('grades.grades')
        ->withGrades($grades)
        ->withExtypes($extypes)
        ->withGrparts($grparts)
        ;
    }

    public function gradesSubmit(Request $request){
        // echo "<br>". $request->extype;
        // echo "<br>". $request->grade;
        // echo "<br>". $request->stperc;
        // echo "<br>". $request->enperc;
        // echo "<br>". $request->descr;
        $ses = Session::whereStatus('CURRENT')->first();
        $grade = new Grade; 

        $grade->extype_id = $request->extype;
        $grade->gradeparticular_id = $request->grade;
        $grade->stpercentage = $request->stperc;
        $grade->enpercentage = $request->enperc;
        $grade->descrp = $request->desscr;
        $grade->session_id = $ses->id;
        $grade->save();


        return back();

    }
}
