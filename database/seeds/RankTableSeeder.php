<?php

use Illuminate\Database\Seeder;

class RankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Rank::create([
            'name' => 'Абитуриент',
            'required_coins' => 0
        ]);
        \App\Models\Rank::create([
            'name' => 'Первокурсник',
            'required_coins' => 250
        ]);
        \App\Models\Rank::create([
            'name' => 'Детеныш моржа',
            'required_coins' => 750
        ]);
        \App\Models\Rank::create([
            'name' => 'Пацан с Дыбенко',
            'required_coins' => 1500
        ]);
        \App\Models\Rank::create([
            'name' => 'Мастер игры в Очко',
            'required_coins' => 2100
        ]);
        \App\Models\Rank::create([
            'name' => 'Пацан с МЕГА Дыбенко',
            'required_coins' => 3000
        ]);
        \App\Models\Rank::create([
            'name' => 'Ты начинаешь нас пугать',
            'required_coins' => 4000
        ]);
        \App\Models\Rank::create([
            'name' => 'Что ты такое?',
            'required_coins' => 5000
        ]);
        \App\Models\Rank::create([
            'name' => 'Микроробот',
            'required_coins' => 6500
        ]);
        \App\Models\Rank::create([
            'name' => 'Самый МОЩНЫЙ микроробот',
            'required_coins' => 8000
        ]);
    }
}
