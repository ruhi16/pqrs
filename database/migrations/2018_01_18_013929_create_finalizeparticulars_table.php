<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalizeparticularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finalizeparticulars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('particular');
            $table->string('status');
            $table->string('table_type');
            $table->string('model_name');
            $table->string('refactor_status');
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
        Schema::dropIfExists('finalizeparticulars');
    }
}
