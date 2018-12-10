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

class SectionController extends Controller
{
    public function sections(){
        $ses = Session::whereStatus('CURRENT')->first();
        $sections = Section::whereSession_id($ses->id)->get();

        return view('sections.sections')
        ->withSections($sections)
        ;
    }

    public function sectionsSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();
        // echo $request->examName;
        $section = new Section;
        $section->name = $request->examName;
        $section->session_id = $ses->id;
        $section->save();

        return back();
    }

    public function sectionsView(){
        $ses = Session::whereStatus('CURRENT')->first();
        $sections = Section::whereSession_id($ses->id)->get();
        // echo "hello";
        return view('sections.sectionsView')
        ->withSections($sections)
        ;
    }

    public function sectionsEditSubmit(Request $request){
        // echo $request->editclssName;
        // echo $request->editclssId;
        $ses = Session::whereStatus('CURRENT')->first();
        $section = Section::find($request->editclssId);
        $section->name = $request->editclssName;
        $section->save();
        return back();
    }

    public function sectionsDeltSubmit(Request $request){
        // echo $request->deltclssName;
        // echo $request->deltclssId;
        $ses = Session::whereStatus('CURRENT')->first();
        $section = Section::find($request->deltclssId);
        
        $section->delete();
        return back();
    }
}
