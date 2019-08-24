<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class MatchUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request->route('teacher_id'));
        if( Auth::user()->role->name == "Admin" ){
            return $next($request);    
        }else{
            if( Auth::user()->teacher_id == $request->route('teacher_id') ){
                
                // echo "User: ". Auth::user()->name;
                return $next($request);
            }else{
                // echo "User not found";
                return redirect()->to('/');
            }
        }

        
    }
}
