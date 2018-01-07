<?php   

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function exmtypclssub(){
        return $this->hasMany('App\Exmtypclssub');
    }   
}
