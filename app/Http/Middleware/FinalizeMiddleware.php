<?php

namespace App\Http\Middleware;

use Closure;

use App\FinalizeParticular;
use App\FinalizeSession;

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
        echo "Oke... from FinalizeMiddleware: ". $data;
        $ar = explode('-', $data);
        
        foreach($ar as $a){
            // echo $a;
            $finpart = FinalizeParticular::whereParticular($a)->first();
            $finsesn = FinalizeSession::whereFinalizeparticular_id($finpart->id)->first();
            if($finsesn){
                echo "<br>$a : exists in finalizeSession";
            }else{
                echo "<br>$a : not exists in finalizeSession";
            }
            // echo "<br>";echo "XXXX:".$finparts->particular;
        }
        return $next($request);
    }
}
