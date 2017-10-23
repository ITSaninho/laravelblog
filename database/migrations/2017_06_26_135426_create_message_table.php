<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->increments('id');

            //$table->integer('user_id')->unsigned()->default(0);
            //$table->string('whome',255);
            $table->text('text');
            $table->integer('read_it')->default(0);
            $table->integer('last_message')->unsigned()->default(1);

            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message');
    }
}
