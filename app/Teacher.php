<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = ['id'];

    public function scopeExclude($query, $value = array()){
        $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());        
        return $query->select( array_diff( (array) $columns, (array) $value) );
    }
    
    public function subjects(){
        return $this->belongsToMany('App\Subject', 'subjteachers');
    }

    public function answerscriptdistributions(){
        return $this->hasMany('App\Answerscriptdistribution');
    }


    public function clssteacher(){
        return $this->hasOne('App\Clssteacher');
    }

    public function users(){
        return $this->hasOne('App\User');
    }
}
