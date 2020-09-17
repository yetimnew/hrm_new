<?php

use App\Operation\VehecleType;
use Illuminate\Database\Seeder;

class VehecleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehecleType::create([
            'name' => 'Trucker',
            'company' => 'Trucker',
            'productiondate' => '2010-01-01',
            'comment' => 'no commnet'
        ]);
    }
}
