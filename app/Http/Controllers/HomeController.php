<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('/start');
    }

    // public function index()
    // {
    //     session(['key' => Auth::user()->name]);
    //     foreach(auth()->user()->roles as $role){
    //         if($role->name == "Admin"){
    //             return redirect()->to('/admins');
    //         }else{
    //             return redirect()->to('/users');
    //         }
    //     }
    // }
}
