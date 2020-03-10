<?php

use Illuminate\Database\Seeder;

class ReferralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Referral::class, 5)->create();
    }
}
