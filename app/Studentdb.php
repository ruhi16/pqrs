<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentdb extends Model
{
    protected $guarded = ['id'];
    private static $table_type = "Transactional";
    public static function getTableType()
    {
        return self::$table_type;
    } 
    
    public function studentcrs(){
        return $this->hasMany('App\Studentcr');
    }

    
    public function clss(){
        return $this->belongsTo('App\Clss', 'stclss_id');
    }
    public function section(){
        return $this->belongsTo('App\Section', 'stsec_id');
    }
    public function session(){
        return $this->belongsTo('App\Session', 'stsession_id');
    }
}
