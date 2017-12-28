<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function clssubs(){
        return $this->belongsToMany('App\Subject','clssubs')->withPivot('session_id');
    }
}
