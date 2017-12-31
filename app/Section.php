<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function clssecs(){
        return $this->hasMany('App\Clssec');
    }
}
