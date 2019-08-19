<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjfullmark extends Model
{
    protected $guarded = ['id'];

    private static $table_type = "Basic";
    public static function getTableType()
    {
        return self::$table_type;
    } 
    
}
