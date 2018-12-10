<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentcr extends Model
{
    protected $guarded = ['id'];
    
    public function clss(){
        return $this->belongsTo('App\Clss');
    }
    public function section(){
        return $this->belongsTo('App\Section');
    }



 




    public function studentdb(){
        return $this->belongsTo('App\Studentdb');
    }

    public function marksentries(){
        return $this->hasMany('App\Marksentry');
    }



    public function resultcr(){
        return $this->belongsTo('App\Resultcr');
    }
}
