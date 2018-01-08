<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clss extends Model
{
    protected $guarded = ['id'];

    public function clssecs(){
        return $this->hasMany('App\Clssec');
    }

    public function clssubs(){
        return $this->hasMany('App\Clssub');
    }

    public function exmtypclssub(){
        return $this->hasMany('App\Exmtypclssub');
    }
}
