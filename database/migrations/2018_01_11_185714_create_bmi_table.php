<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBmiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bmi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('section_id')->nullable();
            $table->string('student_id')->nullable();
            $table->string('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('bmi')->nullable();
            $table->string('result')->nullable();
            $table->string('year')->nullable();
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
        Schema::dropIfExists('bmi');
    }
}
