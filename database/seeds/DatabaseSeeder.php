<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment('production')) {
            $this->productionRun();

            return ;
        }

        $this->call([
            TasksTableSeeder::class,
            UsersTableSeeder::class,
            TaskUserTableSeeder::class,
            PromocodesTableSeeder::class,
            RankTableSeeder::class,
            UserBalanceTableSeeder::class,
            ReferralTableSeeder::class,
            PermissionsTableSeeder::class,
            ProductTableSeeder::class,
            NewsTableSeeder::class,
            AchievementTableSeeder::class,
        ]);
    }

    /**
     * Run production fill to database.
     *
     * @return void
     */
    private function productionRun()
    {
        $this->call([
            PermissionsTableSeeder::class
        ]);


        \App\Models\Rank::insert([
            [
                'name' => 'Новичок',
                'required_coins' => '0'
            ],
            [
                'name' => 'Любитель',
                'required_coins' => '250'
            ],
            [
                'name' => 'Бывалый',
                'required_coins' => '750'
            ],
            [
                'name' => 'МЕГА Дыбенко',
                'required_coins' => '1500'
            ],
            [
                'name' => 'Мастер игры в Очко',
                'required_coins' => '2100'
            ],
            [
                'name' => 'Ветеран',
                'required_coins' => '3000'
            ],
            [
                'name' => 'Элита',
                'required_coins' => '4000'
            ],
            [
                'name' => 'Легенда',
                'required_coins' => '5000'
            ]
        ]);
    }
}
