<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finalizeparticular extends Model
{
    protected $guarded = ['id'];
    
    public function session(){
        return $this->belongsTo('App\Session');
    }

    public function finalizesession(){
        return $this->hasOne('App\Finalizesession');
    }
}
