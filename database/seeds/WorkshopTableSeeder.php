<?php

use App\Maintenance\Workshop;
use Illuminate\Database\Seeder;

class WorkshopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workshop::create([
            'name' => 'Addis Abeba',
            'comment' => 'Addis Abeba',
        ]);
        Workshop::create([
            'name' => 'Nazareth',
            'comment' => 'Nazareth',
        ]);
    }
}
