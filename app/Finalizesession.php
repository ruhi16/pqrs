<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Finalizesession extends Model
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

    public function finalizeparticular(){
        return $this->belongsTo('App\Finalizeparticular');
    }
}
