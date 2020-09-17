<?php

use App\Maintenance\JobType;
use Illuminate\Database\Seeder;

class JobTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobType::create([
            'name' => 'Service',
            'comment' => 'Service',

        ]);
        JobType::create([
            'name' => 'Repair',
            'comment' => 'Repair',

        ]);
        JobType::create([
            'name' => 'Tyre Change',
            'comment' => 'Tyre Change',

        ]);
    }
}
