<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotionalrule extends Model
{
    protected $guarded = ['id'];

    public function session(){
        return $this->belongsTo('App\Session');
    }


    public function clss(){
        return $this->belongsTo('App\Clss');
    }


    public function extypes(){
        return $this->hasMany('App\Extype');
    }
}
