<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionalrulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotionalrules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id');
            $table->integer('clss_id');
            $table->integer('extype_id');
            $table->integer('noofsubjs');
            $table->integer('allowableds');
            $table->string('description');
            $table->integer('fullmarks');
            $table->string('status');
            $table->string('remarks');
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
        Schema::dropIfExists('promotionalrules');
    }
}
