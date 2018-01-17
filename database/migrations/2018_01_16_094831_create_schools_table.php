<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id');
            $table->string('name');
            $table->string('vill');
            $table->string('po');
            $table->string('ps');
            $table->string('pin');
            $table->string('dist');
            $table->string('index');
            $table->string('hscode');
            $table->string('disecode');
            $table->string('estd');
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
        Schema::dropIfExists('schools');
    }
}
