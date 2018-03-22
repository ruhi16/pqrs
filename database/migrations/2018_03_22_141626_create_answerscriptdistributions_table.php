<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerscriptdistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answerscriptdistributions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id')->nullable();
            $table->integer('exam_id')->nullable();
            $table->integer('extype_id')->nullable();
            $table->integer('clss_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('noscripted_rec')->nullable();
            $table->integer('nostudent_pre')->nullable();
            $table->date('issue_dt')->nullable();
            $table->date('submt_dt')->nullable();
            $table->date('finlz_dt')->nullable();
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('answerscriptdistributions');
    }
}
