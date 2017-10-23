<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title',255);
            //$table->integer('category_id')->default(0);
            $table->text('text');
            //$table->string('user_id',255);
            $table->string('img');
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('deslikes')->default(0);
            $table->integer('news')->default(0);
            $table->integer('video')->default(0);
            $table->integer('script')->default(0);
            $table->integer('snipet')->default(0);
            $table->text('keywords');
            $table->text('description');
            $table->integer('public')->default(1);

            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('category_id')->references('id')->on('category');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
