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
        if( Auth::user()->role->name == "Admin" ){
            return $next($request);    
        }else{
            if( Auth::user()->id == $request->route('teacher_id') ){
                // echo "User: ". Auth::user()->name;
            }else{
                // echo "User not found";
                return redirect()->to('/');
            }
        }
        return $next($request);
    }
}
