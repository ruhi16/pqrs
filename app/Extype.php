<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extype extends Model
{
    public function extypes(){
        return $this->belongsToMany('App\Exam', 'exmtyps')->withPivot('session_id');
    }
}
