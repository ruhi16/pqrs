<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Clssteacher extends Model
{
    protected $guarded = ['id'];

    private static $table_type = "Transactional";
    public static function getTableType()
    {
        return self::$table_type;
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

    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
    public function clss(){
        return $this->belongsTo('App\Clss');
    }
    public function section(){
        return $this->belongsTo('App\Section');
    }
}
