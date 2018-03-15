<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = ['id'];
    
    public function clssecs(){
        return $this->hasMany('App\Clssec');
    }

    public function session(){
        return $this->belongsTo('App\Session');
    }


    public function studentdbs(){
        return $this->hasMany('App\Studentdb','stsec_id');
    }
}
