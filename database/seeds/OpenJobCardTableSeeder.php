<?php

use App\Maintenance\OpenJobCard;
use Illuminate\Database\Seeder;

class OpenJobCardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        OpenJobCard::create([
            'job_card_number' => '123',
            'opening_date' => '2020-01-01',
            'workshop_id' => '1',
            'truck_id' => '1',
            'customer_id' => '1',
            'job_system_id' => '1',
            'job_ident_id' => '1',
            'km_reading' => '10000',
            'km_reading_date' => '2020-01-01',
            'driver_id' => '1',
            'mechanic_id' => '1',
            'ass_mechanic_id' => '1',
            'opening_clerk_id' => '1',
            'receptionist_id' => '1',
            'closed' => '0',
            'comment' => 'ggggggggg',
        ]);
    }
}
