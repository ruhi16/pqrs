<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answerscriptdistribution extends Model
{
    protected $guarded = ['id'];
    
    public function exam(){
        return $this->belongsTo('App\Exam');
    }
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
    public function clss(){
        return $this->belongsTo('App\Clss');
    }

    public function section(){
        return $this->belongsTo('App\Section');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
    public function session(){
        return $this->belongsTo('App\Session');
    }

}
