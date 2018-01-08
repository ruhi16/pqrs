<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marksentry extends Model
{
    protected $guarded = ['id'];
    
    public function exmtypclssub(){
        return $this->belongsTo('App\Exmtypclssub');
    }

    public function clssub(){
        return $this->belongsTo('App\Clssub');
    }

    public function clssec(){
        return $this->belongsTo('App\Clssec');
    }

    public function studentcr(){
        return $this->belongsTo('App\Studentcr');
    }

    public function session(){
        return $this->belongsTo('App\Session');
    }
}
