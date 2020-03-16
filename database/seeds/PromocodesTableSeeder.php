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
        \App\Models\Promocode::create([
            'task_id' => 400,
            'value' => 'microrobot',
            'usage_count' => 9999,
            'creator_id' => 0,
        ]);
        \App\Models\Promocode::create([
            'task_id' => 401,
            'value' => 3678236,
            'usage_count' => 9999,
            'creator_id' => 0,
        ]);
        \App\Models\Promocode::create([
            'task_id' => 402,
            'value' => 'GB_MY_L0vEr',
            'usage_count' => 9999,
            'creator_id' => 0,
        ]);
        \App\Models\Promocode::create([
            'task_id' => 403,
            'value' => 'pobey v byben cisco i vse samo sdastsa',
            'usage_count' => 9999,
            'creator_id' => 0,
        ]);
        \App\Models\Promocode::create([
            'task_id' => 404,
            'value' => '15ISIT_DR',
            'usage_count' => 9999,
            'creator_id' => 0,
        ]);
    }
}
