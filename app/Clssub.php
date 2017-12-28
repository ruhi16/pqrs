<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clssub extends Model
{
    public function exmtypclssubs(){
        return $this->belongsToMany('App\Exmtypcls','exmtypclssubs')->withPivot('session_id');
    }
}
