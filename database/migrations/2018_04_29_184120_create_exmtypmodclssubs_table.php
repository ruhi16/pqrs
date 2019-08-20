<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExmtypmodclssubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exmtypmodclssubs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_id');
            $table->integer('extype_id');
            $table->integer('mode_id');
            $table->integer('clss_id');
            $table->integer('subject_id')->nulable();
            $table->integer('fm');
            $table->integer('pm');
            $table->integer('session_id');
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
        Schema::dropIfExists('exmtypmodclssubs');
    }
}
