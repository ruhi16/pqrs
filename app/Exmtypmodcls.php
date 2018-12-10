<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exmtypmodcls extends Model
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


}
