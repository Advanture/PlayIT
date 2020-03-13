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
            //UsersTableSeeder::class,
            //TaskUserTableSeeder::class,
            //PromocodesTableSeeder::class,
            RankTableSeeder::class,
            //UserBalanceTableSeeder::class,
            //ReferralTableSeeder::class,
            PermissionsTableSeeder::class,
            ProductTableSeeder::class,
            //NewsTableSeeder::class,
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
    }
}
