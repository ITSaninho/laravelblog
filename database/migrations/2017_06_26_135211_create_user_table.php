<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->text('password');
            $table->string('avatar')->default('default.jpg');
            //$table->integer('rols_id')->default(1);
            $table->integer('status')->default(1);
            $table->integer('public')->default(1);
            $table->rememberToken();
            $table->timestamps();

            //$table->foreign('id')->references('user_id')->on('comment');
            //$table->foreign('id')->references('user_id')->on('post');
            //$table->foreign('rols_id')->references('id')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
