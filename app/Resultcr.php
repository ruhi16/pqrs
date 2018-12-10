<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultcr extends Model
{
    protected $guarded = ['id'];

    public function session(){
        return $this->belongsTo('App\Session');
    }

    public function clss(){
        return $this->belongsTo('App\Clss');
    }

    public function section(){
        return $this->belongsTo('App\Section');
    }

    public function extypes(){
        return $this->hasMany('App\Extype');
    }


    public function studentcr(){
        return $this->hasOne('App\Studentcr');
    }

}
