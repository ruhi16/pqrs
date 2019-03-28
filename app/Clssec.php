<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clssec extends Model
{
    protected $guarded = ['id'];


    public function scopeExclude($query, $value = array()){
        $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());        
        return $query->select( array_diff( (array) $columns, (array) $value) );
    }
    
    public function clss(){
        return $this->belongsTo('App\Clss');
    }

    public function section(){
        return $this->belongsTo('App\Section');
    }

    public function marksentries(){
        return $this->hasMany('App\Marksentry');
    }
}
