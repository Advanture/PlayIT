<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::create([
            'price' => 500,
            'name' => "Значок Play IT 37мм",
            'in_stock' => 150,
            'img_url' => env('FRONTEND_URL')."/img/img.img",
            'required_rank' => 1,
        ]);
        \App\Models\Product::create([
            'price' => 800,
            'name' => "Стикерпак",
            'in_stock' => 40,
            'img_url' => env('FRONTEND_URL'),
            'required_rank' => 3,
        ]);
        \App\Models\Product::create([
            'price' => 1000,
            'name' => "Силиконовый браслет \"Я все текста пишу шрифтом TimesNewRoman\"",
            'in_stock' => 50,
            'img_url' => env('FRONTEND_URL'),
            'required_rank' => 3,
        ]);
        \App\Models\Product::create([
            'price' => 1000,
            'name' => "Силиконовый браслет \"Самый мощный микроробот\"",
            'in_stock' => 50,
            'img_url' => env('FRONTEND_URL'),
            'required_rank' => 3,
        ]);
        \App\Models\Product::create([
            'price' => 800,
            'name' => "Значок Play IT 2019 37 мм",
            'in_stock' => 41,
            'img_url' => env('FRONTEND_URL'),
            'required_rank' => 1,
        ]);
        \App\Models\Product::create([
            'price' => 600,
            'name' => "Значок ИСиТ 25 мм",
            'in_stock' => 14,
            'img_url' => env('FRONTEND_URL'),
            'required_rank' => 1,
        ]);
        \App\Models\Product::create([
            'price' => 400,
            'name' => "Стикер Project IST 2019",
            'in_stock' => 93,
            'img_url' => env('FRONTEND_URL'),
            'required_rank' => 1,
        ]);
        \App\Models\Product::create([
            'price' => 800,
            'name' => "Значок Хеллоуин 2019",
            'in_stock' => 8,
            'img_url' => env('FRONTEND_URL'),
            'required_rank' => 1,
        ]);
        \App\Models\Product::create([
            'price' => 3500,
            'name' => "Бомбер ИСиТ",
            'in_stock' => 3,
            'img_url' => env('FRONTEND_URL'),
            'required_rank' => 6,
        ]);
    }
}
