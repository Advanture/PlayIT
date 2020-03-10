<?php

use Illuminate\Database\Seeder;

class UserBalanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\UserBalance::class, 5)->create();
    }
}
