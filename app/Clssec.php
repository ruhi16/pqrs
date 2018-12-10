<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clssec extends Model
{
    protected $guarded = ['id'];
    
    public function clss(){
        return $this->belongsTo('App\Clss');
    }

    public function section(){
        return $this->belongsTo('App\Section');
    }

    public function marksentries(){
        return $this->hasMany('App\Marksentry');
    }
}
