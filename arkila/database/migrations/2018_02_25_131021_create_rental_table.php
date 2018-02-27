<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('rent_id');
            $table->string('plate_number', 8);
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('middle_name', 50);
            $table->string('departure_date');
            $table->string('departure_time', 5);
            $table->smallInteger('number_of_days');
            $table->string('destination');
            $table->string('contact_number', 13);
            $table->enum('status', ['Departed', 'Pending', 'Declined'])
            ->default('Pending');
            $table->enum('rent_type', ['Online', 'Walk-in']);
            $table->timestamps();

            $table->foreign('plate_number')
            ->references('plate_number')->on('van')
            ->onDelete('restrict')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental');
    }
}
