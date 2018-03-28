<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledger', function (Blueprint $table) {
            $table->increments('ledger_id');
            $table->integer('trip_id')
            ->unsigned()
            ->nullable();

            $table->string('description');
            $table->string('payee')
            ->nullable();
            $table->string('or_number')
            ->nullable();
            $table->decimal('amount', 7, 2);

            $table->enum('type', ['Revenue', 'Expenses']);

            $table->timestamps();

            $table->foreign('trip_id')
            ->references('trip_id')->on('trip')
            ->onDelete('restrict')
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
        Schema::dropIfExists('ledger');
    }
}
