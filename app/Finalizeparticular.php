<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Finalizeparticular extends Model
{
    protected $guarded = ['id'];
    private static $table_type = "System";
    public static function getTableType()
    {
        return self::$table_type;
    } 

    protected static function boot()
    {
        
        parent::boot();

        static::addGlobalScope('session_id', function (Builder $builder) {
            $builder->where(self::getTableName() . '.session_id', Session::where('status', 'CURRENT')->first()->id);
        });
    } 
    
    public function session(){
        return $this->belongsTo('App\Session');
    }

    public function finalizesession(){
        return $this->hasOne('App\Finalizesession');
    }
}
