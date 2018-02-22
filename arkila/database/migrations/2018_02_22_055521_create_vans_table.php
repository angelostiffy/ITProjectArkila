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
     
            $table->integer('member_id')
            ->unsigned()
            ->nullable();

            $table->foreign('member_id')
            ->references('member_id')->on('members')
            ->onDelete('cascade')
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
