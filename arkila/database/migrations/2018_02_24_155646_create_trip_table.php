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
            $table->engine="InnoDB";

            $table->increments('trip_id');
            $table->integer('destination_id')
            ->unsigned();
            $table->string('plate_number');

            $table->enum('remarks', ['OB', 'CC', 'ER']);
            $table->enum('status', ['Departed', 'On Queue', 'On Deck']);
            $table->smallInteger('total_passengers');
            $table->integer('total_booking_fee');
            $table->date('date_departed');
            $table->integer('queue_number');

            $table->foreign('destination_id')
            ->references('destination_id')->on('destination')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('plate_number')
            ->references('plate_number')->on('van')
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
