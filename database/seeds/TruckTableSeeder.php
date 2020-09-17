<?php

use App\Operation\Truck;
use Illuminate\Database\Seeder;

class TruckTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Truck::create([
            'plate' => '123456',
            'vehecletype_id' => '1',
            'chasisNumber' => '123456789',
            'engineNumber' => '123456987',
            'tyreSyze' => '12',
            'serviceIntervalKM' => '10000',
            'purchasePrice' => '2000000',
            'productionDate' => '1980-1-1',
            'serviceStartDate' => '1980-1-1'
        ]);
    }
}
