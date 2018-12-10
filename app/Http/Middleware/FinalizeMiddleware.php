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
    public function handle($request, Closure $next, $data){
        // echo "Oke... from FinalizeMiddleware: ". $data;
        $ar = explode('-', $data);
        $flag = FALSE;        
        for($i = 0; $i < count($ar); $i++){
            $finpart = FinalizeParticular::whereParticular($ar[$i])->first();
            $finsesn = FinalizeSession::whereFinalizeparticular_id($finpart->id)->first();
            if($i == 0){            
                if($finsesn){                    
                    $str = $ar[$i]."-view";
                    return redirect()->to($str);                    
                    // echo "<br>$ar[$i] : exists in finalizeSession";
                    $flag = TRUE;
                }else{
                    // echo "<br>$ar[$i] : not exists in finalizeSession";
                    $flag = FALSE;
                }
            }else{
                if($finsesn){
                    // echo "<br>$ar[$i] : exists in finalizeSession";
                    $flag = FALSE;
                }else{
                    // echo "<br>$ar[$i] : not exists in finalizeSession";
                    $flag = TRUE;
                    break;
                }
            }
        }

        if($flag == TRUE){
            $str = $data."-view";
            return redirect()->to('/finalizeParticulars');            
        }else{            
            return $next($request);
        }
        
    }
}
