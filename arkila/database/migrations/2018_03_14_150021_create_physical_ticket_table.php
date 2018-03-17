<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_ticket', function (Blueprint $table) {
            $table->increments('physical_ticket_id');
            $table->integer('ticket_number')
            ->unsigned();
            $table->integer('terminal_id')
                ->unsigned();
            $table->boolean('isAvailable');
            $table->timestamps();


            $table->foreign('ticket_number')
            ->references('ticket_number')->on('ticket')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('terminal_id')
                ->references('terminal_id')->on('terminal')
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
        Schema::dropIfExists('physical_ticket');
    }
}
