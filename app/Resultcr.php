<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Resultcr extends Model
{
    protected $guarded = ['id'];

    protected static function boot()
    {
        
        parent::boot();

        static::addGlobalScope('session_id', function (Builder $builder) {
            $builder->where('session_id', Session::where('status', 'CURRENT')->first()->id);
        });
    } 

    public function session(){
        return $this->belongsTo('App\Session');
    }

    public function clss(){
        return $this->belongsTo('App\Clss');
    }

    public function section(){
        return $this->belongsTo('App\Section');
    }

    public function extypes(){
        return $this->hasMany('App\Extype');
    }


    public function studentcr(){
        return $this->belongsTo('App\Studentcr');
    }

}
