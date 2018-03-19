<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http;

class GradedescrController extends Controller
{
    public function gradedescr(){

        echo "Hello";
        //return view('gradedescriptions.gradedescription');
    }
    public function gradedescrSubmit(Request $request){
        
        return back();
    }
    public function gradedescrView(){
        
        return view('gradedescriptions.gradedescriptionView');
    }
    public function gradedescrEditSubmit(Request $request){
        
        return back();
    }
    public function gradedescrDeltSubmit(Request $request){
        

        return back();
    }

}
