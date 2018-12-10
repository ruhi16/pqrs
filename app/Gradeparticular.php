<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gradeparticular extends Model
{
    protected $guarded = ['id'];

    public function grades(){
        return $this->hasMany('App\Grade');
    }
    
}
