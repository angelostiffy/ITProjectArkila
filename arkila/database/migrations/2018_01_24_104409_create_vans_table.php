<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('plate_number', 8)
            ->unique();
     
            $table->integer('driver_id')
            ->unsigned()
            ->nullable();

            $table->foreign('driver_id')
            ->references('driver_id')->on('drivers')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->string('model');       
            $table->string('seating_capacity', 2);


            $table->timestamps();

            $table->primary('plate_number');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vans');
    }
}
