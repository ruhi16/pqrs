<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clss extends Model
{
    public function clssubs(){
        return $this->belongsToMany('App\Subject','clssubs')->withPivot('session_id');
    }

    public function exmtypclss(){
        return $this->belongsToMany('App\Exmtyp','exmtypcls')->withPivot('session_id');
    }
}
