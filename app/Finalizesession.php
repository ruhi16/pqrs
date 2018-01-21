<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finalizesession extends Model
{
    protected $guarded = ['id'];
    
    public function session(){
        return $this->belongsTo('App\Session');
    }

    public function finalizeparticular(){
        return $this->belongsTo('App\Finalizeparticular');
    }
}
