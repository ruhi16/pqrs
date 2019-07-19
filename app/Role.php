<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Builder;


class Role extends Model
{
    protected $guarded = ['id'];

    // protected static function boot()
    // {
        
    //     parent::boot();

    //     static::addGlobalScope('session_id', function (Builder $builder) {
    //         $builder->where('session_id', Session::where('status', 'CURRENT')->first()->id);
    //     });
    // } 
    
    public function users(){
        return $this->hasMany('App\User');
    }
}
