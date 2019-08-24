<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Marksentry extends Model
{
    protected $guarded = ['id'];
    private static $table_type = "Transactional";
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
    
    public function exmtypclssub(){
        return $this->belongsTo('App\Exmtypclssub');
    }


    public function exmtypmodclssub(){
        return $this->belongsTo('App\Exmtypmodclssub');
    }

    public function clssub(){
        return $this->belongsTo('App\Clssub');
    }

    public function clssec(){
        return $this->belongsTo('App\Clssec');
    }



    
    public function studentcr(){
        return $this->belongsTo('App\Studentcr');
    }

    public function session(){
        return $this->belongsTo('App\Session');
    }
}
