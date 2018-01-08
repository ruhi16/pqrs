<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $guarded = ['id'];
    
    
    
    
    public function marksentries(){
        return $this->hasMany('App\Marksentry');
    }
}
