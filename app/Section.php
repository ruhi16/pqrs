<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Section extends Model
{
    protected $guarded = ['id'];
    private static $table_type = "Basic";
    public static function getTableType()
    {
        return self::$table_type;
    } 

    public function scopeExclude($query, $value = array()){
        $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());        
        return $query->select( array_diff( (array) $columns, (array) $value) );
    }

    protected static function boot()
    {
        
        parent::boot();

        static::addGlobalScope('session_id', function (Builder $builder) {
            $builder->where(self::getTableName() . '.session_id', Session::where('status', 'CURRENT')->first()->id);
        });
    } 

    public function children()
    {
        return $this->hasMany(Section::class, 'next_section_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Section::class, 'next_section_id', 'id');
    }




    public function next_sections()
    {
        return $this->hasMany('App\Studentcr', 'next_section_id', 'id');
    }





    
    public function clssecs(){
        return $this->hasMany('App\Clssec');
    }

    public function session(){
        return $this->belongsTo('App\Session');
    }


    public function studentcrs(){
        return $this->hasMany('App\Studentcr');
    }



    public function studentdbs(){
        return $this->hasMany('App\Studentdb','stsec_id');
    }

    public function answerscriptdistributions(){
        return $this->hasMany('App\Answerscriptdistribution');
    }

    public function clssteacher(){
        return $this->hasOne('App\Clssteacher');
    }



    public function resultcrs(){
        return $this->hasMany('App\Resultcr');
    }
}
