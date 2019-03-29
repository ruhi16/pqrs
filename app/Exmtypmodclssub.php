<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exmtypmodclssub extends Model
{
    protected $guarded = ['id'];

    public function scopeExclude($query, $value = array()){
        $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());        
        return $query->select( array_diff( (array) $columns, (array) $value) );
    }

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

    public function marksentries(){
        return $this->hasMany('App\Marksentry');
    }


   

}
