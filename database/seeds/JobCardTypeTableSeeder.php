<?php

use App\Maintenance\JobCardType;
use Illuminate\Database\Seeder;

class JobCardTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobCardType::create([
            'name' => 'Service or Repair of Own Vehicles',
            'comment' => 'Service or Repair of Own Vehicles',
        ]);
        JobCardType::create([
            'name' => ' Accident Cases for Insurance Claims',
            'comment' => ' Accident Cases for Insurance Claims',
        ]);
        JobCardType::create([
            'name' => 'Service or repair of third partie\'s Vehicles',
            'comment' => 'Service or repair of third partie\'s Vehicles',
        ]);
        JobCardType::create([
            'name' => 'Service or repair performed by other parties',
            'comment' => 'Service or repair performed by other parties',
        ]);
        JobCardType::create([
            'name' => ' Requisition and Vehicle components',
            'comment' => ' Requisition and Vehicle components',
        ]);
        JobCardType::create([
            'name' => 'Road Call',
            'comment' => 'Road Call',
        ]);
        JobCardType::create([
            'name' => 'Regional Jobcards',
            'comment' => 'Regional Jobcards',
        ]);
    }
}
