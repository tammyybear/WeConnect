<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lrn')->nullable();
            $table->string('user_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('nickname')->nullable();
            $table->longText('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_relation')->nullable();
            $table->string('guardian_contact')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('picture')->default('images/default.png');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('civil_status', ['single', 'married', 'divorced', 'separated', 'widowed'])->nullable();
            $table->string('verification_code')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('has_birthcert')->default(false);
            $table->boolean('has_form137')->default(false);
            $table->boolean('has_goodmoral')->default(false);
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
        Schema::dropIfExists('students');
    }
}
