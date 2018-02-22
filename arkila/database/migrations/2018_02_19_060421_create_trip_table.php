<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip', function (Blueprint $table) {
            $table->increments('trip_id');
            $table->integer('destination_id')
            ->unsigned();
            $table->enum('remarks', ['OB', 'CC', 'ER']);
            $table->enum('status', ['Departed', 'On Queue', 'On Deck']);
            $table->smallInteger('total_passengers');
            $table->integer('total_booking_fee');
            $table->date('date_departed');

            $table->foreign('destination_id')
            ->references('destination_id')->on('destinations')
            ->onDelete('restrict')
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
        Schema::dropIfExists('trip');
    }
}
