<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Exmtypmodclssub extends Model
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
        array_push($support_tables, Exam::getTableName());
        array_push($support_tables, Extype::getTableName());
        array_push($support_tables, Mode::getTableName());
        array_push($support_tables, Clss::getTableName());
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
            $builder->where('session_id', Session::where('status', 'CURRENT')->first()->id);
        });
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
