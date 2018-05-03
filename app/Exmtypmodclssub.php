<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exmtypmodclssub extends Model
{
    protected $guarded = ['id'];

    public function exam(){
        return $this->belongsTo('App\Exam');
    }

    public function extype(){
        return $this->belongsTo('App\Extype');
    }
    
    public function mode(){
        return $this->belongsTo('App\Mode');
    }
    
    public function clss(){
        return $this->belongsTo('App\Clss');
    } 

    public function subject(){
        return $this->belongsTo('App\Subject');
    }

    public function Marksentries(){
        return $this->hasMany('App\Marksentry');
    }

}
