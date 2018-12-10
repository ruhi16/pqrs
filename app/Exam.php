<?php   

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = ['id'];
    
    public function exmtypclssub(){
        return $this->hasMany('App\Exmtypclssub');
    }   
    public function answerscriptdistributions(){
        return $this->hasMany('App\Answerscriptdistribution');
    }


    
    public function exmtypmodcls(){
        return $this->hasMany('App\Exmtypmodcls');
    }

    public function exmtypmodclssubs(){
        return $this->hasMany('App\Exmtypmodclssub');
    }
}
