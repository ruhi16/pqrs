<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finalizeparticular extends Model
{
    public function session(){
        return $this->belongsTo('App\Session');
    }
}
