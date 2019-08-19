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
        $flag_main = FALSE;
        $flag_supp = FALSE;
        // dd(count($ar));
        for($i = 0; $i < count($ar); $i++){
            $finpart = FinalizeParticular::whereParticular($ar[$i])->first();            
            $finsesn = FinalizeSession::whereFinalizeparticular_id($finpart->id)->first();
            
            // for first case, i.e composite table. In that is if finalized, go to view page of that table
            if( $i == 0 ){

                if( $finsesn ){ 
                    $flag_main = TRUE;
                    break;
                }

            }else{
            
                if ( $finsesn == null ){
                    echo "<br>$ar[$i] : not exists in finalizeSession, $i not finalized for this session";
                    $flag_supp = TRUE;
                    break;
                }
            
            }          
        }




        if($flag_main == TRUE){
            $str = '/'.$ar[0]."-view";
            return redirect()->to($str);     

        }else{      
            if($flag_supp == TRUE)      {
                return redirect()->to('/finalizeParticulars');            
            }

            return $next($request);
        }
        
    }
}
