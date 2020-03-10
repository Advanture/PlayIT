<?php

use Illuminate\Database\Seeder;

class TaskUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::find(1);

        $user->tasks()->sync([1, 2, 3]);
        $user->save();

    }
}
