<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clssub extends Model
{
    public function clss(){
        return $this->belongsTo('App\Clss');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
}
