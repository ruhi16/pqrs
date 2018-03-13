<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = ['id'];
    
    public function extype(){
        return $this->belongsTo('App\Extype');
    }


    public function clssubs(){
        return $this->hasMany('App\Clssub');
    }
    
    public function exmtypclssub(){
        return $this->hasMany('App\Exmtypclssub');
    }





    
    public function teachers(){
        return $this->belongsToMany('App\Teacher', 'subjteachers');
    }
}
