<?php   

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = ['id'];
    
    public function exmtypclssub(){
        return $this->hasMany('App\Exmtypclssub');
    }   
}
