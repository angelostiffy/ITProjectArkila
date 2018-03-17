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
            $table->engine = 'InnoDB';
            $table->increments('ticket_id');
            $table->string('ticket_number');
            $table->integer('terminal_id')
                ->unsigned();
            $table->boolean('isAvailable');
            $table->timestamps();

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
        Schema::dropIfExists('ticket');
    }
}
