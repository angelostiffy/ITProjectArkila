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
            $table->integer('operator_id')
            ->nullable()
            ->unsigned();
            $table->string('last_name', 35);
            $table->string('first_name', 35);
            $table->string('middle_name', 35);
            $table->string('contact_number',13)
            ->nullable();
            $table->string('license_number');
            $table->string('status');
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
