<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    protected $guarded = ['id'];

    public function exmtypmodcls(){
        return $this->hasMany('App\Exmtypmodcls');
    }

    public function exmtypmodclssubs(){
        return $this->hasMany('App\Exmtypmodclssub');
    }
}
