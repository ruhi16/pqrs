<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gradeparticular extends Model
{
    protected $guarded = ['id'];

    public function scopeExclude($query, $value = array()){
        $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());        
        return $query->select( array_diff( (array) $columns, (array) $value) );
    }
    

    public function grades(){
        return $this->hasMany('App\Grade');
    }
    
}
