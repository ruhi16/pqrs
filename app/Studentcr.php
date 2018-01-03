<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentcr extends Model
{
    public function studentdb(){
        return $this->belongsTo('App\Studentdb');
    }
}
