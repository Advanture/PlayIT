<?php

use Illuminate\Database\Seeder;

class PromocodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Promocode::class, 5)->create();
    }
}
