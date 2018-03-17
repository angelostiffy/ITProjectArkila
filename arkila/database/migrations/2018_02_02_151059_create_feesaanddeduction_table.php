<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesaanddeductionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_and_deduction', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fad_id');
            $table->string('description', 30);
            $table->double('amount')->unsigned();
            $table->enum('type', ['Discount', 'Fee']);
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
        Schema::dropIfExists('fees_and_deduction');
    }
}
