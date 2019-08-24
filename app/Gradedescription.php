<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Gradedescription extends Model
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
        array_push($support_tables, Grade::getTableName());
        array_push($support_tables, Subject::getTableName());

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

    public function grade(){
        return $this->belongsTo('App\Grade');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
    public function session(){
        return $this->belongsTo('App\Session');
    }
}
