<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('user_id');
            //$table->integer('post_id');
            $table->string('login');
            $table->integer('parent_id')->default(0);
            $table->text('text');
            $table->integer('likes')->default(0);
            $table->integer('deslikes')->default(0);

            //$table->foreign('post_id')->references('id')->on('post');
            //$table->foreign('user_id')->references('id')->on('user');


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
        Schema::dropIfExists('comment');
    }
}
