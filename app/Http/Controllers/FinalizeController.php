<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Answerscriptdistribution;
use App\Session;
use App\Exam;
use App\Extype;
use App\Clss;
use App\Subject;
use App\Section;

use App\Grade;
use App\Studentdb;
use App\Studentcr;

use App\Clssub;
use App\Clssec;


use App\Exmtypclssub;
use App\Exmtypmodclssub;
use App\Marksentry;
use App\Finalizeparticular;
use App\Finalizesession;
use App\Gradedescription;
use App\Subjteacher;

use Illuminate\support\Str;

class FinalizeController extends Controller
{
    public function finalizeParticulars(){
        $ses = Session::whereStatus('CURRENT')->first();
        $fparts = Finalizeparticular::whereSession_id($ses->id)->get();
        $fsesns = Finalizesession::whereSession_id($ses->id)->get();
        // echo "Class Table Type: ". Clss::getTableType(). ", Model Name: ". ucfirst(Str::singular(Clss::getTableName())); //str_singular();
        // echo "Clss-Section Support Tables: " . Clssec::getSupportTables();

        print_r(Exmtypmodclssub::getSupportTables());
        echo "<br>";

        print_r(Subjteacher::getSupportTables());
        echo "<br>";

        print_r(Clssec::getSupportTables());
        echo "<br>";

        print_r(Clssub::getSupportTables());
        echo "<br>";

        print_r(Exmtypclssub::getSupportTables());
        echo "<br>";

        print_r(Grade::getSupportTables());
        echo "<br>";

        print_r(Gradedescription::getSupportTables());
        echo "<br>";

        return view ('finalizeParticulars')
        ->with('fparts', $fparts)
        ->with('fsesns', $fsesns);
    }

    public function finalizeParticularsRefresh(){
        $ses = Session::whereStatus('CURRENT')->first();
        $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name;");
        foreach($tables as $table){
            $recs = Finalizeparticular::firstOrNew(['particular' => $table->name, 
                                                    'session_id' => $ses->id]);

            // echo $table->name .':'. ucfirst(Str::singular($table->name)).'::getTableType()'."<br>";
            echo $table->name ;
            $recs->particular = $table->name;
            $recs->model_name = ucfirst(Str::singular($table->name));
            $recs->status     = 'active';//ucfirst(Str::singular($table->name));//::getTableType();//'active'; Model
            $recs->table_type = getTableType(ucfirst(Str::singular($table->name)));//helper.php function
            $recs->session_id = $ses->id;
            $recs->save();
            // print_r($recs);
            if(!$recs){
                echo "Errors Occured!!!";
            }
        }



        return redirect()->to('/finalizeParticulars');
    }

    public function finalizeSessions(){
        $ses = Session::whereStatus('CURRENT')->first();
        $fsesns = Finalizesession::whereSession_id($ses->id)->get();

        return view ('finalizeSessions')
        ->with('fsesns', $fsesns);
    }


    public function finalizeSchool(Request $request){

        return "School Details Finalized";
    }

    public function btnFinalize($n){
        $ses = Session::whereStatus('CURRENT')->first();
        $fsesns = Finalizesession::firstOrNew(['finalizeparticular_id'=>$n,'session_id'=>$ses->id]);
        $fsesns->finalizeparticular_id = $n;        
        $fsesns->session_id = $ses->id;
        $fsesns->remarks    = 'oke';
        $fsesns->save();
        return back();
    }

    public function btnUnFinalize($n){
        $ses = Session::whereStatus('CURRENT')->first();
        $fsesns = Finalizesession::firstOrNew(['finalizeparticular_id'=>$n,'session_id'=>$ses->id]);
        // $fsesns->finalizeparticular_id = $n;        
        // $fsesns->session_id = $ses->id;
        // $fsesns->remarks    = 'oke';
        $fsesns->delete();
        return back();
    }



    public function basicTableRefator($n){
        $session = Session::whereStatus('CURRENT')->first();
        
        $fparts = Finalizeparticular::firstOrNew(['id' => $n]);// grab the table name
        $prev_session_datas = DB::table($fparts->particular)->where('session_id', $session->prev_session_id)->get();

        foreach($prev_session_datas as $prev_session_data){
            
            $prev_session_data->session_id = $session->id;
            $prev_session_data->prev_session_pk = $prev_session_data->id;
            $prev_session_data->id = NULL;
            $prev_session_data->created_at = now();
            // $prev_session_data->updated_at = NULL;
            
            $array_data [] = (array) $prev_session_data;
        }        

        foreach($array_data as $array_dt){
            $model_name = "App\\" . $fparts->model_name;            
            $data = $model_name::where(['session_id'=> $array_dt['session_id'], 'prev_session_pk'=> $array_dt['prev_session_pk']])->get();
            
            if( $data->isEmpty() ){             
                $data = $model_name::create($array_dt);
                
                $fparts->refactor_status = "Done";
                $fparts->save();
            }            
        }
        return back();
    }


    public function relationalTableRefator($n){
        $session = Session::whereStatus('CURRENT')->first();

        $fparts = Finalizeparticular::firstOrNew(['id' => $n]); // grab the table name
        $prev_session_datas = DB::table($fparts->particular)->where('session_id', $session->prev_session_id)->get();

        $model_name = "App\\" . $fparts->model_name; 
        $supported_tables = $model_name::getSupportTables();
        // print_r($supported_tables);
        // echo "<br>";
        
        foreach($supported_tables as $supported_table){
            
            $id_str = Str::singular($supported_table) . "_id";            

            $supported_model_name = "App\\" . Finalizeparticular::where('particular', $supported_table)->first()->model_name;
            $supported_collection = $supported_model_name::get(['id', 'prev_session_pk']);
            
            // echo "Table: " . $supported_table . ", id: " . $id_str . ", Model:" . $supported_model_name;

            foreach ($prev_session_datas as $prev_session_data) {
                // echo $prev_session_data->$id_str;
                $prev_session_data->$id_str = $supported_collection->where('prev_session_pk', $prev_session_data->$id_str)->first()->id;
               


                
                // echo "=>".$prev_session_data->$id_str ." == ";
                
                
            }


            
        }

        $array_data = [];
        foreach ($prev_session_datas as $prev_session_data) {            
            $prev_session_data->session_id = $session->id;
            $prev_session_data->prev_session_pk = $prev_session_data->id;

            $prev_session_data->id = NULL;
            $prev_session_data->created_at = now();

            array_push($array_data, (array) $prev_session_data);
        }

        foreach ($array_data as $array_dt) {
            $model_name = "App\\" . $fparts->model_name;
            $data = $model_name::where(['session_id' => $array_dt['session_id'], 'prev_session_pk' => $array_dt['prev_session_pk']])->get();

            if ($data->isEmpty()) {
                $data = $model_name::create($array_dt);

                $fparts->refactor_status = "Done";
                $fparts->save();
            }
        }
        


        // dd($array_data);

        return back();
    }
}
