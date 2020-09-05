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
        $this->call(UserTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(PersonaleTableSeeder::class);
    }
}
