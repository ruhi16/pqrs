<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http;

class GradedescrController extends Controller
{
    public function gradedescr(){
        echo Message();
        //return view('gradedescription.gradedescription');
    }
    public function gradedescrSubmit(Request $request){
        
        return back();
    }
    public function gradedescrView(){
        
        return view('gradedescription.gradedescriptionView');
    }
    public function gradedescrEditSubmit(Request $request){
        
        return back();
    }
    public function gradedescrDeltSubmit(Request $request){
        

        return back();
    }

}
