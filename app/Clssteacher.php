<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clssteacher extends Model
{
    protected $guarded = ['id'];

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
