<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('ticket_number');
            $table->integer('destination_id')
            ->unsigned();
            $table->integer('fad_id')
            ->nullable()
            ->unsigned();
            $table->integer('trip_id')
            ->unsigned();

            $table->enum('status', ['Pending', 'Cancelled', 'Departed']);


            $table->foreign('destination_id')
            ->references('destination_id')->on('destination')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('fad_id')
            ->references('fad_id')->on('fees_and_deduction')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('trip_id')
            ->references('trip_id')->on('trip')
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
        Schema::dropIfExists('ticket');
    }
}
