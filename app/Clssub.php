<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clssub extends Model
{
    protected $guarded = ['id'];
    
    public function clss(){
        return $this->belongsTo('App\Clss');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }

    public function marksentries(){
        return $this->hasMany('App\Marksentry');
    }
}
