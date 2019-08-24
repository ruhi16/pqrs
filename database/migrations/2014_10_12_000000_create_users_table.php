<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');//->unique();
            $table->string('password');
            $table->integer('role_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('session_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->integer('prev_session_pk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
