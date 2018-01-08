<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentcr extends Model
{
    protected $guarded = ['id'];
    
    public function studentdb(){
        return $this->belongsTo('App\Studentdb');
    }

    public function marksentries(){
        return $this->hasMany('App\Marksentry');
    }
}
