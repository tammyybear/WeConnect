<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_family', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id')->nullable();
            $table->string('f_name')->nullable();
            $table->string('f_address')->nullable();
            $table->string('f_contact')->nullable();
            $table->string('f_nationality')->nullable();
            $table->string('f_occupation')->nullable();
            $table->string('f_religion')->nullable();
            $table->string('f_edu')->nullable();
            $table->string('m_name')->nullable();
            $table->string('m_address')->nullable();
            $table->string('m_contact')->nullable();
            $table->string('m_nationality')->nullable();
            $table->string('m_occupation')->nullable();
            $table->string('m_religion')->nullable();
            $table->string('m_edu')->nullable();
            $table->string('parents_status')->nullable();
            $table->timestamps();
        });

        Schema::create('family_children', function (Blueprint $table) {
            $table->increments('id');
            $table->string('family_id')->nullable();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('school_job')->nullable();
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
        Schema::dropIfExists('student_family');
        Schema::dropIfExists('family_children');
    }
}
