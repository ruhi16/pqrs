<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exmtypclssub extends Model
{
    protected $guarded = ['id'];
    
    public function exam(){
        return $this->belongsTo('App\Exam');
    }

    public function extype(){
        return $this->belongsTo('App\Extype');
    }
    
    public function clss(){
        return $this->belongsTo('App\Clss');
    }   
    
    public function subject(){
        return $this->belongsTo('App\Subject');
    }




    public function marksentries(){
        return $this->hasMany('App\Marksentry');
    }

    //many to many relation: Clssub & Exmtypclssub, Pivot: subjfullmarks
    public function clssubs(){
        return $this->belongsToMany('App\Clssub', 'subjfullmarks');
    }
}
