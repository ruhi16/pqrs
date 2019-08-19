<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjfullmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjfullmarks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exmtypclssub_id');
            $table->integer('clssub_id');
            $table->integer('fm')->nullable();
            $table->string('status')->nullable();
            $table->string('notes')->nullable();
            $table->integer('session_id');
            $table->timestamps();
            $table->integer('prev_session_pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjfullmarks');
    }
}
