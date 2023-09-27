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

use App\Teacher;
use App\Clssteacher;

use App\Clssub;
use App\Clssec;

use App\Exmtypclssub;
use App\Marksentry;
use App\Miscoption;
use App\Exmtypmodcls;
use App\Exmtypmodclssub;

use App\Answerscriptdistribution;

class TeacherController extends Controller
{
    public function teachersTakspan($teacher_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $teacher = Teacher::find($teacher_id);
        // dd($ses->id, $teacher_id);
        $clteacher = Clssteacher::where('session_id', $ses->id)
            ->where('teacher_id', $teacher->id)->first();

        $anscrdists = Answerscriptdistribution::where('teacher_id',$teacher_id)
                        ->where('session_id', $ses->id)->get();

        $extpclsbs = Exmtypmodclssub::where('session_id', $ses->id)->get();
        $clscs = Clssec::where('session_id', $ses->id)->get();
        $clsbs = Clssub::where('session_id', $ses->id)->get();

        
        return view('teachers.teacherTaskpane')
            ->withTeacher($teacher)
            ->withClteacher($clteacher)
            ->withAnscrdists($anscrdists)            
            ->withExtpclsbs($extpclsbs)
            ->withClscs($clscs)
            ->withClsbs($clsbs)
        ;
    }

    public function teachersCSTakspan($teacher_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $teacher = Teacher::find($teacher_id);
        $clteacher = Clssteacher::where('session_id', $ses->id)
            ->where('teacher_id', $teacher->id)->first();

        $clssec = Clssec::where('session_id', $ses->id)
            ->where('clss_id', $clteacher->clss_id)
            ->where('section_id', $clteacher->section_id)
            ->first();

        //==========================================================
        $extpcls = Exmtypmodclssub::whereSession_id($ses->id)
                   ->whereClss_id($clssec->clss_id)->get();

        $extpmdcls = Exmtypmodcls::whereSession_id($ses->id)
                   ->whereClss_id($clssec->clss_id)->get();
        
        $exm = Exam::all();
        $exmtyp = Extype::all();
        $modes = Mode::all();
        $clsb = Clssub::whereClss_id($clssec->clss_id)->get();

        $stdmrk = Marksentry::whereSession_id($ses->id)->get();
        //==========================================================
        // dd($teacher);
        // echo $teacher;
        // dd($clteacher);

        return view('teachers.teacherCSTaskpane')
            ->withSession($ses)
            ->withTeacher($teacher)
            ->withClteacher($clteacher)
            ->withExtpcls($extpcls) 
            ->withExtpmdcls($extpmdcls)
            ->withClsb($clsb)
            ->withClsc($clssec)        
            ->withExm($exm) 
            ->withExmtyp($exmtyp)
            ->withModes($modes) 
            ->withStdmrk($stdmrk) 
            ->withCls($clssec->clss->name)
            ->withSec($clssec->section->name)
            ;
    }


    public function teachersImage(Request $request, $teacher_id){
        // echo 'welcome:'. $teacher_id;
        
        if($request->hasFile('photo')){            
            $dpath = "teachersImage";
            $file = $request->photo;
            $extn = $request->file('photo')->extension();
            // $extn = $request->file->getClientOriginalExtension();
            // $fname = rand(111,999).".".$extn;
            $fname = $teacher_id.".jpg";
            $file->move($dpath, $fname);
            
            //save the image name, without extention
            $teacher = Teacher::find($teacher_id);
            $teacher->img_name = $teacher_id;
            $teacher->save();

            // echo 'file selected'.$fname;
        }else{
            // echo 'no file selected';
        }
            
        return back();

    }



    public function teachers(){
        $ses = Session::whereStatus('CURRENT')->first();
        $teachers = Teacher::whereSession_id($ses->id)->get();
        
        $teachDesigs = Miscoption::where('TabName', 'teachers')->where('FieldName','desig')->get();
        $teachHQuals = Miscoption::where('TabName', 'teachers')->where('FieldName','hqual')->get();
        
        $sumtvSubjs = Extype::whereName('Summative')->whereSession_id($ses->id)->first();
        $teachSubjs = Subject::whereExtype_id($sumtvSubjs->id)->get();

        $extype = Extype::where('name', 'Summative')->first();

        // Execute only once per session to update Main Subject of Teacher
        // (Teacher::updateMainSubject());

        return view('teachers.teachers')
        ->withTeachers($teachers)
        ->withTeachDesigs($teachDesigs)
        ->withTeachHQuals($teachHQuals)
        ->withTeachSubjs($teachSubjs)
        ->withExtype($extype)
        ;

    }

    public function teachersSubmit(Request $request){
        $ses = Session::whereStatus('CURRENT')->first();

                
        //for New Teacher's Data Entry
        $teacher = new Teacher;        
        $teacher->name   = $request->teacherName; 
        $teacher->ncname = $request->teacherNickName;
        $teacher->mobno   = $request->teacherMob;        
        $teacher->desig = $request->teacherDesig;
        $teacher->hqual = $request->teacherHQual;
        $teacher->mnsub_id   = $request->teacherMSubj;
        $teacher->session_id = $ses->id;
        $teacher->status = 'OKey';
        $teacher->notes  = 'NA';
        $teacher->save();

        //for above Teacher's preferred Subjects Entry
        if ($request->teacherSubj) {
            $temp = [];
            foreach($request->teacherSubj as $tSb){
                $prop = [];
                $prop['session_id'] = $ses->id;
                $prop['status'] = 'OKey';
                $temp[$tSb] = $prop;
            }
            $teacher->subjects()->sync($temp);
        }
        
        return back(); 
    }

    public function teachersView(){
        $ses = Session::whereStatus('CURRENT')->first();
        $teachers = Teacher::whereSession_id($ses->id)->get();
        

        return view('teachers.teachersView')
            ->withTeachers($teachers);
    }

    public function teachersEdit($id, $extype_id){
        $ses = Session::whereStatus('CURRENT')->first();
        $teacher = Teacher::find($id);//whereSession_id($ses->id)->get();
        $teachDesigs = Miscoption::where('TabName', 'teachers')->where('FieldName','desig')->get();
        $teachHQuals = Miscoption::where('TabName', 'teachers')->where('FieldName','hqual')->get();
        $teachSubjs  = Subject::whereExtype_id($extype_id)->get();
//         echo $extype_id;
// dd($teachSubjs);
        
        return view('teachers.teachersEdit')
        ->withTeacher($teacher)
        ->withTeachDesigs($teachDesigs)
        ->withTeachHQuals($teachHQuals)
        ->withTeachSubjs($teachSubjs);
    }


    public function teachersEditSubmit(Request $request){        
        $ses = Session::whereStatus('CURRENT')->first();
        $teacher = Teacher::find($request->teacherId);
        
        //for Teacher's  Data Update, Entry Point
        $teacher->name  = $request->teacherName; 
        $teacher->mobno   = $request->teacherMob;
        $teacher->desig = $request->teacherDesig;
        $teacher->hqual = $request->teacherHQual;
        $teacher->mnsub_id = $request->teacherMSubj;
        $teacher->session_id = $ses->id;
        $teacher->status = 'OKey';
        $teacher->notes  = 'NA';
        $teacher->save();


        //for above Teacher's preferred Subjects Entry
        if($request->teacherSubj){
            $temp = [];
            foreach($request->teacherSubj as $tSb){
                $prop = [];
                $prop['session_id'] = $ses->id;
                $prop['status'] = 'OKey';
                $temp[$tSb] = $prop;
            }
            // print_r($temp);
            $teacher->subjects()->sync($temp);
        }

        return redirect()->to('/teachers-view');
    }

    public function teachersDeltSubmit(Request $request){
     
        return back();
    }



    
}
