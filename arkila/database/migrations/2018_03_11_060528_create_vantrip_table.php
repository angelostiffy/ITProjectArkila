<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVantripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vantrip', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')
            ->unsigned()
            ->nullable();
            $table->string('plate_number')
            ->nullable();
            $table->timestamps();
            
            $table->foreign('trip_id')
            ->references('trip_id')->on('trip')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('plate_number')
            ->references('plate_number')->on('van')
            ->onDelete('cascade')
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
        Schema::dropIfExists('vantrip');
    }
}
