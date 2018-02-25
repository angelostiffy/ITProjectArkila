<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('destination_id')
            ->unsigned();
            $table->string('name', 70);
            $table->string('departure_date', 10);
            $table->string('departure_time', 5);
            $table->smallInteger('number_of_seats');
            $table->string('contact_number', 13);
            $table->decimal('amount', 7, 2);
            $table->enum('status', ['Pending', 'Approved', 'Declined', 'Paid', 'Cancelled']);
            $table->enum('type', ['Walk-in', 'Online']);

            $table->timestamps();

            $table->foreign('destination_id')
            ->references('destination_id')->on('destination')
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
        Schema::dropIfExists('reservation');
    }
}
