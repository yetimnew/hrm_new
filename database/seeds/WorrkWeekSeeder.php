<?php

use App\HRM\WorkWeek;
use Illuminate\Database\Seeder;

class WorrkWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkWeek::create([
            'mon' => 8,
            'tue' => 8,
            'wed' => 8,
            'thu' => 8,
            'fri' => 8,
            'sat' => 0,
            'sun' => 0,
        ]);
    }
}
