<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCoinsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coins_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('prev_coins');
            $table->unsignedInteger('new_coins');
            $table->integer('coins');
            $table->unsignedInteger('user_id');
            $table->string('source');

//            $table->foreign('user_id')
//                ->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('user_coins_history');
    }
}
