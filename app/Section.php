<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = ['id'];

    public function scopeExclude($query, $value = array()){
        $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());        
        return $query->select( array_diff( (array) $columns, (array) $value) );
    }
    
    public function clssecs(){
        return $this->hasMany('App\Clssec');
    }

    public function session(){
        return $this->belongsTo('App\Session');
    }


    public function studentcrs(){
        return $this->hasMany('App\Studentcr');
    }



    public function studentdbs(){
        return $this->hasMany('App\Studentdb','stsec_id');
    }

    public function answerscriptdistributions(){
        return $this->hasMany('App\Answerscriptdistribution');
    }

    public function clssteacher(){
        return $this->hasOne('App\Clssteacher');
    }



    public function resultcrs(){
        return $this->hasMany('App\Resultcr');
    }
}
