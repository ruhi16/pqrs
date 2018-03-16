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
            $table->string('vill')->nullable();
            $table->string('po')->nullable();
            $table->string('ps')->nullable();
            $table->string('pin')->nullable();
            $table->string('dist')->nullable();
            $table->string('index')->nullable();
            $table->string('hscode')->nullable();
            $table->string('disecode')->nullable();
            $table->string('estd')->nullable();
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
