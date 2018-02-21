<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('driver_id',10);
            $table->string('member_id', 10);
            $table->integer('operator_id')
            ->unsigned();
            $table->string('last_name', 35);
            $table->string('first_name', 35);
            $table->string('middle_name', 35);
            $table->string('contact_number', 13);
            $table->string('address',100);
            $table->string('provincial_address',100);
            $table->date('birth_date');
            $table->string('birth_place', 50);
            $table->enum('gender', ['Male', 'Female']);
            $table->string('citizenship', 35);
            $table->enum('civil_status', ['Single', 'Married', 'Divorced']);
            $table->smallInteger('number_of_children')->nullable();
            $table->string('spouse', 120)->nullable();
            $table->date('spouse_birthdate')->nullable();
            $table->string('father_name', 120)->nullable();
            $table->string('father_occupation', 50)->nullable();
            $table->string('mother_name', 120)->nullable();
            $table->string('mother_occupation', 50)->nullable();
            $table->string('person_in_case_of_emergency', 120);
            $table->string('emergency_address', 50);
            $table->string('emergency_contactno', 13);
            $table->string('SSS', 20);
            $table->string('license_number', 20);
            $table->date('expiry_date');


           $table->foreign('operator_id')
            ->references('operator_id')->on('operators')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('drivers');
    }
}
