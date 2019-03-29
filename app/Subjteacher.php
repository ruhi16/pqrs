<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjteacher extends Model
{
    protected $guarded = ['id'];
    
    public function scopeExclude($query, $value = array()){
        $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());        
        return $query->select( array_diff( (array) $columns, (array) $value) );
    }
    //many to many relation defined
    //subject & teacher with this is as pivot table
}
