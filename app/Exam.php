<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function extypes(){
        return $this->belongsToMany('App\Extype', 'exmtyps')->withPivot('session_id');
    }
}
