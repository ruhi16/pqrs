<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gradedescription extends Model
{
    public function grade(){
        return $this->belongsTo('App\Grade');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
}
