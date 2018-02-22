<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersVansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_vans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')
            ->unsigned()
            ->nullable();
            $table->integer('plate_number')
            ->unsigned()
            ->nullable();

            $table->foreign('member_id')
            ->references('member_id')->on('members')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('plate_number')
            ->references('plate_number')->on('vans')
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
        Schema::dropIfExists('members_vans');
    }
}
