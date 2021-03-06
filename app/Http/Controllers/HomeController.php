<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('/start');
        // echo "from Controller"."<br>";
        // echo Auth::user()->name."<br>";
        // echo Auth::user()->role->name."<br>";
        if(Auth::user()->role->name == "Admin"){            
            
            return redirect()->to('/admin');//view('/admin');
        }else{
            // dd(Auth::user());
            return redirect()->to('/user'); //view('/user');
        }
    }

    public function admin(){

        return redirect()->to('/start'); //admin.blade.php
    }

    public function user(){
        // echo "homecontroller:user";
        // dd(Auth::user());
        $id = Auth::user()->teacher_id;        
        // echo $id;
        return redirect()->to('/teachers-takspan/'.$id); //user.blad.php
    }


}
