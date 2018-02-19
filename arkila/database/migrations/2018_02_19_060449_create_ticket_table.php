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
            $table->increments('ticket_id');
            $table->integer('destination_id')
            ->unsigned();
            $table->integer('fad_id')
            ->unsigned();
            $table->enum('status', ['Pending', 'Cancelled', 'Departed']);


            $table->foreign('destination_id')
            ->references('destination_id')->on('destinations')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('fad_id')
            ->references('fad_id')->on('fees_and_deductions')
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
