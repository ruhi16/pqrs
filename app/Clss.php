<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clss extends Model
{
    protected $guarded = ['id'];

    public function session(){
        return $this->belongsTo('App\Session');
    }
    public function clssecs(){
        return $this->hasMany('App\Clssec');
    }

    public function clssubs(){
        return $this->hasMany('App\Clssub');
    }

    public function exmtypclssub(){
        return $this->hasMany('App\Exmtypclssub');
    }

    //manyTomany realtion btn Clss & Subject Model
    public function subjects(){
        return $this->belongsToMany('App\Subject', 'clssubs');
    }


    public function studentcrs(){
        return $this->hasMany('App\Studentcr');
    }




    public function studentdbs(){
        return $this->hasMany('App\Studentdb','stclss_id');
    }



    public function answerscriptdistributions(){
        return $this->hasMany('App\Answerscriptdistribution');
    }


    public function clssteacher(){
        return $this->hasOne('App\Clssteacher');
    }


    //relationship with sql-view
    public function extclssubfmpms(){
        return $this->hasMany('App\Extclssubfmpm');
    }
    
    public function exmtypmodcls(){
        return $this->hasMany('App\Exmtypmodcls');
    }

    public function exmtypmodclssubs(){
        return $this->hasMany('App\Exmtypmodclssub');
    }




    public function resultcrs(){
        return $this->hasMany('App\Resultcr');
    }

    public function promotionalrules(){
        return $this->hasMany('App\Promotionalrule');
    }
}
