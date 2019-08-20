<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjteachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id');
            $table->integer('subject_id');
            $table->integer('teacher_id');            
            $table->string('status');
            $table->integer('prev_session_pk');           
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
        Schema::dropIfExists('subjteachers');
    }
}
