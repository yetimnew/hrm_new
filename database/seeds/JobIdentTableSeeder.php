<?php

use App\Maintenance\JobIdent;
use Illuminate\Database\Seeder;

class JobIdentTableSeeder extends Seeder
{

    public function run()
    {
        JobIdent::create([
            'name' => 'Mukera  Indent',
            'job_system_id' => '1',
            'mechanic_hours' => '1.0',
            'ass_mechanic_hours' => '1.0',
        ]);
    }
}
