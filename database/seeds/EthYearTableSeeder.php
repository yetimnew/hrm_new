<?php

use App\EthYear;
use Illuminate\Database\Seeder;

class EthYearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1900; $i <=2050 ; $i++) {
            EthYear::create([
                'number' =>$i,
            ]);
        }
    }
}
