<?php

use Illuminate\Database\Seeder;

class AchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Achievement::create([
            'label' => 'Первопроходец',
            'description' => 'Выполнил свое первое задание',
            'icon_url' => 'img',
        ]);
        \App\Models\Achievement::create([
            'label' => 'Я на что-то способен',
            'description' => 'Выполнил 10 заданий',
            'icon_url' => 'img',
        ]);
        \App\Models\Achievement::create([
            'label' => 'Киберспортивная единица',
            'description' => 'Выполнил 20 заданий',
            'icon_url' => 'img',
        ]);
        \App\Models\Achievement::create([
            'label' => 'Коронован',
            'description' => 'Выполнил 30 заданий',
            'icon_url' => 'img',
        ]);
        \App\Models\Achievement::create([
            'label' => 'Самые быстрые пальцы на Диком Западе',
            'description' => 'Поучавствовал в задании с кликером',
            'icon_url' => 'img',
        ]);
        \App\Models\Achievement::create([
            'label' => 'Кладоискатель',
            'description' => 'Выполнил все задания в AR',
            'icon_url' => 'img',
        ]);
        \App\Models\Achievement::create([
            'label' => 'Показал прибыль',
            'description' => 'Выбил 100 флекскоинов в Колесе фортуны',
            'icon_url' => 'img',
        ]);
    }
}
