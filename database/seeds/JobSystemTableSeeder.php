<?php

use App\Maintenance\JobSystem;
use Illuminate\Database\Seeder;

class JobSystemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobSystem::create([
            'name' => 'ENGINE',
            'comment' => 'ENGINE',

        ]);
        JobSystem::create([
            'name' => 'COOLING',
            'comment' => 'COOLING',

        ]);
        JobSystem::create([
            'name' => 'FUEL SYSTEM',
            'comment' => 'FUEL SYSTEM',

        ]);
        JobSystem::create([
            'name' => 'CLUCH',
            'comment' => 'CLUCH',

        ]);
        JobSystem::create([
            'name' => 'GEAR BOX',
            'comment' => 'GEAR BOX',

        ]);
        JobSystem::create([
            'name' => 'PROPLER SHAFT',
            'comment' => 'PROPLER SHAFT',

        ]);
        JobSystem::create([
            'name' => 'TRANSFER CASE',
            'comment' => 'TRANSFER CASE',

        ]);
        JobSystem::create([
            'name' => 'FREONT AXLE',
            'comment' => 'FREONT AXLE',

        ]);
        JobSystem::create([
            'name' => 'REAR AXLE',
            'comment' => 'REAR AXLE',

        ]);
        JobSystem::create([
            'name' => 'BRAKE SYSTEM',
            'comment' => 'BRAKE SYSTEM',

        ]);
        JobSystem::create([
            'name' => 'CABINE',
            'comment' => 'CABINE',

        ]);
        JobSystem::create([
            'name' => 'CHASSI',
            'comment' => 'CHASSI',

        ]);
        JobSystem::create([
            'name' => 'SUSPENSION',
            'comment' => 'SUSPENSION',

        ]);
        JobSystem::create([
            'name' => 'ELECTRIC SYSTEM',
            'comment' => 'ELECTRIC SYSTEM',

        ]);
        JobSystem::create([
            'name' => 'STEERING',
            'comment' => 'STEERING',

        ]);
        JobSystem::create([
            'name' => 'AIR SYSTEM',
            'comment' => 'AIR SYSTEM',

        ]);
        JobSystem::create([
            'name' => 'LOADING BOX',
            'comment' => 'LOADING BOX',

        ]);
        JobSystem::create([
            'name' => 'HYDROULIC',
            'comment' => 'HYDROULIC',

        ]);
        JobSystem::create([
            'name' => 'ACCESSORY',
            'comment' => 'ACCESSORY',

        ]);
        JobSystem::create([
            'name' => 'OTHERS',
            'comment' => 'OTHERS',

        ]);
    }
}
