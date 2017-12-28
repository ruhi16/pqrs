<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentdbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentdbs', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('name');
            $table->string('fname')->nullable();
            $table->date('dob')->nullable();
            $table->string('slno')->nullable();
            $table->date('doadm')->nullable();
            $table->string('adhaar')->nullable();
            $table->string('vill')->nullable();
            $table->string('post')->nullable();
            $table->string('pin')->nullable();
            $table->integer('stclss_id')->nullable();
            $table->integer('stsec_id')->nullable();
            $table->integer('stsession_id')->nullable();
            $table->integer('streason')->nullable();
            $table->integer('enclss_id')->nullable();
            $table->integer('ensec_id')->nullable();
            $table->integer('ensession_id')->nullable();
            $table->integer('enreason')->nullable();
            $table->string('crstatus')->nullable();
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
        Schema::dropIfExists('studentdbs');
    }
}
