<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Subject extends Model
{
    protected $guarded = ['id'];
    

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


    public function extype(){
        return $this->belongsTo('App\Extype');
    }


    public function clssubs(){
        return $this->hasMany('App\Clssub');
    }
    
    public function exmtypclssub(){
        return $this->hasMany('App\Exmtypclssub');
    }


    public function clsses(){
        return $this->belongsToMany('App\Clss','clssubs');
    }


    
    public function teachers(){
        return $this->belongsToMany('App\Teacher', 'subjteachers');
    }

    public function gradedescriptions(){
        return $this->hasMany('App\Gradedescription');
    }


    public function answerscriptdistributions(){
        return $this->hasMany('App\Answerscriptdistribution');
    }


    //relationship with sql-view
    public function extclssubfmpms(){
        return $this->hasMany('App\Extclssubfmpm');
    }

    public function exmtypmodclssubs(){
        return $this->hasMany('App\Exmtypmodclssub');
    }
}
