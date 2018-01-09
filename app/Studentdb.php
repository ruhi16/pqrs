<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentdb extends Model
{
    protected $guarded = ['id'];
    
    public function studentcr(){
        return $this->hasMany('App\Studentcr');
    }
    
}
