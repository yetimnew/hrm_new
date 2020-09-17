<?php

use App\HRM\Position;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name' => 'Driver Grade III',
            'job_description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore unde modi,
            sed magnam praesentium ea natus atque dolor obcaecati, temporibus reiciendis facere voluptatibus nam?
             Praesentium officiis et sunt voluptate veniam.',
            'status' => 1,
        ]);
        Position::create([
            'name' => 'Mechanic',
            'job_description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore unde modi,
            sed magnam praesentium ea natus atque dolor obcaecati, temporibus reiciendis facere voluptatibus nam?
             Praesentium officiis et sunt voluptate veniam.',
            'status' => 1,
        ]);
    }
}
