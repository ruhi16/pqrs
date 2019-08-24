<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Builder;


class Extclssubfmpm extends Model
{
    protected $table = 'extclssubfmpms';

    private static $table_type = "Relational";
    public static function getTableType()
    {
        return self::$table_type;
    } 
    
    protected static function boot()
    {
        
        parent::boot();

        static::addGlobalScope('session_id', function (Builder $builder) {
            $builder->where(self::getTableName() . '.session_id', Session::where('status', 'CURRENT')->first()->id );
        });
    } 


    
    public function clss(){
        return $this->belongsTo('App\Clss');
    }

    public function extype(){
        return $this->belongsTo('App\Extype');
    }
    
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
}
