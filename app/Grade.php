<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $guarded = ['id'];

    public function scopeExclude($query, $value = array()){
        $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());        
        return $query->select( array_diff( (array) $columns, (array) $value) );
    }

    public function gradeparticular(){
        return $this->belongsTo('App\Gradeparticular');
    }
    public function extype(){
        return $this->belongsTo('App\Extype');
    }
    public function session(){
        return $this->belongsTo('App\Session');
    }

    public function gradedescriptions() {
        return $this->hasMany('App\Gradedescription');
    }


}
