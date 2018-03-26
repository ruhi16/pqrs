<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClssteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clssteachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id')->nullable();
            $table->integer('clss_id')->nullable();
            $table->integer('section_id')->nullable();            
            $table->integer('teacher_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('clssteachers');
    }
}
