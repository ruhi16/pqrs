<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function clssubs(){
        return $this->hasMany('App\Clssub');
    }
    
}
