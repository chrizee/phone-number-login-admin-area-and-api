<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 5)->create();
        factory(\App\People::class, 20)->create();
        factory(\App\Capital::class, 20)->create();
        factory(\App\Expense::class, 20)->create();
        factory(\App\Notes::class, 20)->create();
        factory(\App\Sales::class, 20)->create();
    }
}
