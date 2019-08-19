<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Roleuser extends Model
{

    private static $table_type = "System";
    public static function getTableType()
    {
        return self::$table_type;
    } 
    protected static function boot()
    {
        
        parent::boot();

        static::addGlobalScope('session_id', function (Builder $builder) {
            $builder->where('session_id', Session::where('status', 'CURRENT')->first()->id);
        });
    } 
}
