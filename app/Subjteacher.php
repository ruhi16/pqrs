<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Subjteacher extends Model
{
    protected $guarded = ['id'];
    
    public function scopeExclude($query, $value = array()){
        $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());        
        return $query->select( array_diff( (array) $columns, (array) $value) );
    }

    protected static function boot()
    {
        
        parent::boot();

        static::addGlobalScope('session_id', function (Builder $builder) {
            $builder->where('session_id', Session::where('status', 'CURRENT')->first()->id);
        });
    } 
    //many to many relation defined
    //subject & teacher with this is as pivot table
}
