<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answerscriptdistribution extends Model
{
    protected $guarded = ['id'];
    
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
}
