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
        // dd(count($ar));
        for($i = 0; $i < count($ar); $i++){
            $finpart = FinalizeParticular::whereParticular($ar[$i])->first();            
            $finsesn = FinalizeSession::whereFinalizeparticular_id($finpart->id)->first();
            // dd($finsesn);
            if($i == 0){    
                // dd($finsesn);
                if($finsesn == null){                    
                    // dd($finsesn);
                    $str = $ar[$i]."-view";
                    // return redirect()->to($str);      
                    return $next($request);              
                    // echo "<br>$ar[$i] : exists in finalizeSession";
                    // $flag = TRUE;
                }else{
                    // echo "<br>$ar[$i] : not exists in finalizeSession";
                    $flag = FALSE;
                }
            }else{
                if($finsesn == null){
                    // echo "<br>$ar[$i] : exists in finalizeSession, finalized for this session";
                    $flag = FALSE;
                }else{
                    // echo "<br>$ar[$i] : not exists in finalizeSession, not finalized for this session";
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
