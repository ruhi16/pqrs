<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extype extends Model
{
    protected $guarded = ['id'];
    

    public function scopeExclude($query, $value = array()){
        $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());        
        return $query->select( array_diff( (array) $columns, (array) $value) );
    }

    
    public function subjects(){
        return $this->hasMany('App\Subject');
    }

    public function exmtypclssub(){
        return $this->hasMany('App\Exmtypclssub');
    }

    public function grades(){
        return $this->hasMany('App\Grade');
    }


    //relationship with sql-view
    public function extclssubfmpms(){
        return $this->hasMany('App\Extclssubfmpm');
    }

    public function exmtypmodcls(){
        return $this->hasMany('App\Exmtypmodcls');
    }

    public function exmtypmodclssubs(){
        return $this->hasMany('App\Exmtypmodclssub');
    }



    public function resultcrs(){
        return $this->hasMany('App\Resultcr');
    }

    public function promotionalrule(){
        return $this->belongsTo('App\Promotionalrule');
    }
}
