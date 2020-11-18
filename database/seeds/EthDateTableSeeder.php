<?php

use App\EthDate;
use Illuminate\Database\Seeder;

class EthDateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=30 ; $i++) {
            EthDate::create([
                'number' =>$i,
            ]);
        }
    }
}
