<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('van', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('plate_number', 8)
            ->unique();

            $table->string('model');       
            $table->string('seating_capacity', 2);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');


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
        Schema::dropIfExists('van');
    }
}
