<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentcrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentcrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('studentdb_id');
            $table->integer('session_id');
            $table->integer('clss_id');
            $table->integer('section_id');
            $table->integer('roll_no');
            $table->string('exam_status');  //x
            $table->integer('fullmarks');   //x
            $table->integer('obtmarks');    //x
            $table->double('obtperc');      //x
            $table->integer('noDs');        //x
            $table->string('result')->nullable();
            $table->string('description')->nullable();
            $table->string('crstatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentcrs');
    }
}
