<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extclssubfmpm extends Model
{
    protected $table = 'extclssubfmpms';
    
    
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
