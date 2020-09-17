<?php

use App\Maintenance\DownTime;
use Illuminate\Database\Seeder;

class DownTimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DownTime::create([
            'name' => 'Lack of fuel',
            'comment' => ' Lack of spare parts',

        ]);
        DownTime::create([
            'name' => ' Shortage of labour',
            'comment' => '  Shortage of labour',

        ]);
        DownTime::create([
            'name' => 'Lack of fuel',
            'comment' => ' Lack of fuel',

        ]);
        DownTime::create([
            'name' => ' Bad climatic condition',
            'comment' => '  Bad climatic condition',

        ]);
    }
}
