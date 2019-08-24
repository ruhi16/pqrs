<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Teacher extends Model
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
    
    //call only once at the time of session start, to update main subject
    public static function updateMainSubject(){
        $subjs = Subject::select('id','session_id','prev_session_pk')->get();        
        $tMnainSubject = self::select('id','mnsub_id')->get();

        foreach($tMnainSubject as $mainSubj){            
            if( $subjs->where('prev_session_pk', $mainSubj->mnsub_id)->first() ){
                $mainSubj->update(['mnsub_id' => $subjs->where('prev_session_pk', $mainSubj->mnsub_id)->first()->id ]);
            }            
        }        
    }









    public function subjects(){
        return $this->belongsToMany('App\Subject', 'subjteachers');
    }

    public function answerscriptdistributions(){
        return $this->hasMany('App\Answerscriptdistribution');
    }


    public function clssteacher(){
        return $this->hasOne('App\Clssteacher');
    }

    public function users(){
        return $this->hasOne('App\User');
    }
}
