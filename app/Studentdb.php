<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentdb extends Model
{
    public function studentcr(){
        return $this->hasMany('App\Studentcr');
    }
}
