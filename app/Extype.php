<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extype extends Model
{
    protected $guarded = ['id'];
    
    public function subjects(){
        return $this->hasMany('App\Subject');
    }

    public function exmtypclssub(){
        return $this->hasMany('App\Exmtypclssub');
    }
}
