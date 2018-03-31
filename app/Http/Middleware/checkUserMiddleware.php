<?php

namespace App\Http\Middleware;

use Closure;

class checkUserMiddleware
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
        // if(\Auth::check()){
        //     return redirect('/clsses');
        // }
        // Session::set('Key', "Registered");
         return $next($request);//redirect()->to('/');
    }
}
