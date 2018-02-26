<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('destination_id');
            $table->integer('terminal_id')->unsigned();


            $table->string('description');
            $table->decimal('amount', 7, 2);
            $table->timestamps();
            
            $table->foreign('terminal_id')
            ->references('terminal_id')->on('terminal')
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
        Schema::dropIfExists('destination');
    }
}
