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
            $table->bigIncrements('id');
            $table->bigInteger('vk_id')->unique();
            $table->string('avatar_url')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('is_banned')->default(false);
            $table->unsignedBigInteger('rank_id')->default(1);
            $table->timestamp('last_fortune')->default(now()->subDay());
            $table->string('api_token', 80)
                ->unique()
                ->nullable();
            $table->string('app_token', 8)
                ->unique();
            $table->timestamps();
            $table->tinyInteger('body')->default(0);
            $table->tinyInteger('shirt')->default(0);
            $table->tinyInteger('pants')->default(0);
            $table->tinyInteger('hair')->default(0);
            $table->tinyInteger('eyes')->default(0);
            $table->tinyInteger('hat')->default(0);
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
