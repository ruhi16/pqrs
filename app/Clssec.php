<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Clssec extends Model
{
    protected $guarded = ['id'];

    private static $table_type = "Relational";
    public static function getTableType()
    {
        return self::$table_type;
    } 
    public static function getSupportTables()
    {
        $support_tables = [];
        array_push($support_tables, Clss::getTableName());
        array_push($support_tables, Section::getTableName());
        
        return $support_tables;
    }

    public function scopeExclude($query, $value = array()){
        $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());        
        return $query->select( array_diff( (array) $columns, (array) $value) );
    }

    protected static function boot()
    {
        
        parent::boot();

        static::addGlobalScope('session_id', function (Builder $builder) {
            $builder->where(self::getTableName() . '.session_id', Session::where('status', 'CURRENT')->first()->id);
        });
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
