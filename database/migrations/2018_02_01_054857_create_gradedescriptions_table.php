<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradedescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradedescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->nullable();
            $table->integer('grade_id')->nullable();
            $table->string('desc')->nullable();
            $table->integer('session_id')->nullable();
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
        Schema::dropIfExists('gradedescriptions');
    }
}
