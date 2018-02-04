<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
            $table->increments('operator_id');
            $table->string('last_name', 35);
            $table->string('first_name', 35);
            $table->string('middle_name', 35);
            $table->integer('contact_number')->nullable();
            $table->string('address',100);
            $table->string('provincial_address',100);
            $table->smallInteger('age');
            $table->date('birth_date');
            $table->string('birth_place', 50);
            $table->enum('gender', ['Male', 'Female']);
            $table->string('citizenship', 35);
            $table->enum('civil_status', ['Single', 'Married', 'Divorced']);
            $table->smallInteger('number_of_children');
            $table->string('spouse', 120)->nullable();
            $table->date('spouse_birthdate')->nullable();
            $table->string('father_name', 120)->nullable();
            $table->string('father_occupation', 50)->nullable();
            $table->string('mother_name', 120)->nullable();
            $table->string('mother_occupation', 50)->nullable();
            $table->string('person_in_case_of_emergency', 120);
            $table->string('emergency_address', 50);
            $table->integer('emergency_contactno');
            $table->string('SSS', 20);



            $table->engine = 'InnoDB';
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
        Schema::dropIfExists('operators');
    }
}
