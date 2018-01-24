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
        $flag = FALSE;
        // foreach($ar as $a){  
        for($i=0; $i< count($ar); $i++){
            $finpart = FinalizeParticular::whereParticular($ar[$i])->first();
            $finsesn = FinalizeSession::whereFinalizeparticular_id($finpart->id)->first();
            // if($i == 0 && $finsesn){

            // }
            if($finsesn){
                if($i == 0){
                    echo "<br> The Current/Parent table is finalized.";
                    $str = $ar[$i]."-view";
                    return redirect()->to($str);                    
                }
                echo "<br>$ar[$i] : exists in finalizeSession";
                
            }else{
                echo "<br>$ar[$i] : not exists in finalizeSession";
                $flag = TRUE;
            }            
        }

        if($flag == TRUE){
            // $str = $data."-view";
            return redirect()->to('/finalizeParticulars');
        }else{

            // echo $reqeust;
            return $next($request);
        }
        
    }
}
