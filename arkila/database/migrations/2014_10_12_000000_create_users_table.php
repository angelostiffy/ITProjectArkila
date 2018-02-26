<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique()->nullable();
            $table->string('password');
<<<<<<< HEAD
            $table->enum('user_type', ['Driver', 'Customer', 'Admin', 'Super-Admin']);
            $table->enum('status', ['enable', 'disable']);
=======
            $table->enum('status', ['enable', 'disable']);
            $table->enum('user_type', ['Driver', 'Customer', 'Admin', 'Super-Admin']);
            $table->integer('terminal_id')->unsigned()->nullable();
>>>>>>> 9cc3f2647c8521a13e054a5f52cbdb8b45dbcecb
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
