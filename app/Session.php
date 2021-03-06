<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $guarded = ['id'];
    private static $table_type = "Absolute Basic";
    public static function getTableType()
    {
        return self::$table_type;
    } 

    
    
    public function clsses(){
        return $this->hasMany('App\Clss');
    }

    public function sections(){
        return $this->hasMany('App\Sections');
    }    
    
    public function marksentries(){
        return $this->hasMany('App\Marksentry');
    }

    public function finalizeparticulars(){
        return $this->hasMany('App\Finalizeparticular');
    }

    public function finalizesessions(){
        return $this->hasMany('App\Finalizesession');
    }

    public function grades(){
        return $this->hasMany('App\Grade');
    }

    public function studentdbs(){
        return $this->hasMany('App\Studentdb','stsession_id');
    }
    

    public function gradedescriptions(){
        return $this->hasMany('App\Gradedescription');
    }


    
    public function answerscriptdistributions(){
        return $this->hasMany('App\Answerscriptdistribution');
    }



    public function resultcrs(){
        return $this->hasMany('App\Resultcr');
    }

    public function promotionalrules(){
        return $this->hasMany('App\Promotionalrule');
    }

}
