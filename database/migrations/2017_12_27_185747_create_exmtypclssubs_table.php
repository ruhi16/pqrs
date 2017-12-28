<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExmtypclssubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exmtypclssubs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_id');
            $table->integer('extype_id');
            $table->integer('clss_id');
            $table->integer('fm');
            $table->integer('session_id');
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
        Schema::dropIfExists('exmtypclssubs');
    }
}
