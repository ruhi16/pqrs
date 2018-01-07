<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksentriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marksentries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exmtypclssub_id');
            $table->integer('clssec_id');
            $table->integer('clssub_id');
            $table->integer('studentcr_id');
            $table->integer('marks');
            $table->string('status');
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
        Schema::dropIfExists('marksentries');
    }
}
