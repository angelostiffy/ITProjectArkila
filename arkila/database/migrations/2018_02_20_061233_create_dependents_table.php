<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependents', function (Blueprint $table) {
            $table->increments('dependent_id');
            $table->integer('operator_id')
            ->unsigned();

            $table->integer('driver_id')
            ->unsigned();

            $table->string('cname');
            $table->date('birthdate');

            $table->foreign('operator_id')
            ->references('operator_id')->on('operators')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('driver_id')
            ->references('driver_id')->on('drivers')
            ->onDelete('cascade')
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
        Schema::dropIfExists('dependents');
    }
}
