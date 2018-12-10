<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

use App\Clssub;
use App\Clssec;
use App\Grade;

use App\User;
use App\Teacher;
use App\Exmtypclssub;
use App\Marksentry;
use App\Extclssubfmpm;
use App\Exmtypmodcls;
use App\Exmtypmodclssub;
use App\Answerscriptdistribution;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');   
        //$this->setSession();
           
    }   
    // public function authenticate()
    // {
    //     if (Auth::attempt(['email' => $email, 'password' => $password])) {
    //         // Authentication passed...
    //         session(['key'=> 'oiko']);
    //         return redirect()->intended('dashboard');
    //     }
    // }


    // public function setSession(){
    //     if(Auth::check()){
    //         session(['key'=> auth()->user()->name]);
    //     }
    // }
    public function loginCredencial(){

        $teachers = Teacher::all();
        $users = User::all();
        $ansscdists = Answerscriptdistribution::all();


        return view('login.loginCredencial')
            ->with('teachers', $teachers)
            ->with('users', $users)
            ->with('ansscdists', $ansscdists)
            ;
    }

}
