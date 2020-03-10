<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_coins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('moder_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('amount');
            $table->timestamp('timestamp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_coins');
    }
}
