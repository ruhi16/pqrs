<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentdbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentdbs', function (Blueprint $table) {
            $table->increments('id'); 
            $table->unsignedinteger('admBookNo');
            $table->unsignedinteger('admSlNo');
            $table->string('prCls');
            $table->string('prSch');
            $table->date('admDate');

            $table->string('name');
            $table->string('adhaar')->nullable();
            $table->string('fname')->nullable();
            $table->string('fadhaar')->nullable();
            $table->string('mname')->nullable();
            $table->string('madhaar')->nullable();
            $table->date('dob')->nullable();
            // $table->string('slno')->nullable();
            // $table->date('doadm')->nullable();            
            $table->string('vill')->nullable();
            $table->string('post')->nullable();
            $table->string('pstn')->nullable();
            $table->string('dist')->nullable();
            $table->string('pin')->nullable();
            $table->string('mobl')->nullable();
            
            $table->string('ssex')->nullable();
            $table->string('phch')->nullable();
            $table->string('relg')->nullable();
            $table->string('cste')->nullable();
            $table->string('natn')->nullable();

            $table->string('accNo')->nullable();
            $table->string('ifsc')->nullable();
            $table->string('micr')->nullable();
            $table->string('bnnm')->nullable();
            $table->string('brnm')->nullable();

            $table->integer('stclss_id')->nullable();
            $table->integer('stsec_id')->nullable();
            $table->integer('stsession_id')->nullable();
            $table->integer('streason')->nullable();

            $table->integer('enclss_id')->nullable();
            $table->integer('ensec_id')->nullable();
            $table->integer('ensession_id')->nullable();
            $table->integer('enreason')->nullable();

            $table->string('crstatus')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('studentdbs');
    }
}
