<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultcrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultcrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id');
            $table->integer('clss_id');
            $table->integer('section_id');
            $table->integer('studentcr_id');
            $table->integer('extype_id');
            $table->integer('fullmarks');
            $table->integer('obtnmarks');
            $table->integer('noofds');
            $table->string('results')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('resultcrs');
    }
}
