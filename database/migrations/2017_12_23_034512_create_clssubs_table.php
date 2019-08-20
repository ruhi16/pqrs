<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClssubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clssubs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clss_id');
            $table->integer('subject_id');
            $table->integer('extype_id');
            $table->integer('is_additional');
            $table->integer('subject_order');
            $table->integer('combination_no')->default('0');
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
        Schema::dropIfExists('clssubs');
    }
}
