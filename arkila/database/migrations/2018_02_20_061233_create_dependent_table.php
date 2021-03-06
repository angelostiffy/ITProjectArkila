<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependent', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('member_id')
            ->unsigned()
            ->nullable();

            $table->string('children_name');
            $table->date('birthdate');

            $table->foreign('member_id')
            ->references('member_id')->on('member')
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
        Schema::dropIfExists('dependent');
    }
}
