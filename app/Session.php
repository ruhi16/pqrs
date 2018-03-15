<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $guarded = ['id'];
    
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
    
}
