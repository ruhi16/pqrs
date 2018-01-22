<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $guarded = ['id'];
    
    public function clsses(){
        return $this->hasMany('App\Clss');
    }
    
    
    public function marksentries(){
        return $this->hasMany('App\Marksentry');
    }



    public function finalizeparticular(){
        return $this->hasMany('App\Finalizeparticular');
    }

    public function finalizesession(){
        return $this->hasMany('App\Finalizesession');
    }
}
