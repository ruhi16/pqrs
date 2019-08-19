<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Exmtypclssub extends Model
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
        array_push($support_tables, Clss::getTableName());
        array_push($support_tables, Subject::getTableName());

        return $support_tables;
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
    
    public function clss(){
        return $this->belongsTo('App\Clss');
    }   
    
    public function subject(){
        return $this->belongsTo('App\Subject');
    }




    public function marksentries(){
        return $this->hasMany('App\Marksentry');
    }

    //many to many relation: Clssub & Exmtypclssub, Pivot: subjfullmarks
    public function clssubs(){
        return $this->belongsToMany('App\Clssub', 'subjfullmarks');
    }
}
