<?php

namespace App\Http\Middleware;

use Closure;

class FinalizeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $data)
    {
        echo "Oke... from FinalizeMiddleware". $data;
        return $next($request);
    }
}
