<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Builder;


class Extclssubfmpm extends Model
{
    protected $table = 'extclssubfmpms';
    protected static function boot()
    {
        
        parent::boot();

        static::addGlobalScope('session_id', function (Builder $builder) {
            $builder->where('session_id', Session::where('status', 'CURRENT')->first()->id );
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
