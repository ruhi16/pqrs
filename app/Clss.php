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



    public function studentcrs(){
        return $this->hasMany('App\Studentcr');
    }




    public function studentdbs(){
        return $this->hasMany('App\Studentdb','stclss_id');
    }
}
