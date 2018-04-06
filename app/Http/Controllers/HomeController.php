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
            return redirect()->to('/user'); //view('/user');
        }
    }

    public function admin(){

        return redirect()->to('/start'); //admin.blade.php
    }

    public function user(){

        return redirect()->to('/teachers'); //user.blad.php
    }


}
