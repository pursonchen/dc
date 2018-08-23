<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		$this->call(MealsTableSeeder::class);
		$this->call(DishsTableSeeder::class);
		$this->call(DishTypesTableSeeder::class);
    }
}
