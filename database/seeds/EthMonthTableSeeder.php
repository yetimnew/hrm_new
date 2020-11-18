<?php

use App\EthMonth;
use Illuminate\Database\Seeder;

class EthMonthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EthMonth::create([
            'number' => 1,
            'name' => 'መስከረም',
        ]);
        EthMonth::create([
            'number' => 2,
            'name' => 'ጥቅምት',
        ]);
        EthMonth::create([
            'number' => 3,
            'name' => 'ኅዳር',
        ]);
        EthMonth::create([
            'number' => 4,
            'name' => 'ታኅሣሥ',
        ]);
        EthMonth::create([
            'number' => 5,
            'name' => 'ጥር',
        ]);
        EthMonth::create([
            'number' => 6,
            'name' => 'የካቲት',
        ]);
        EthMonth::create([
            'number' => 7,
            'name' => 'መጋቢት',
        ]);
        EthMonth::create([
            'number' => 8,
            'name' => 'ሚያዝያ',
        ]);
        EthMonth::create([
            'number' => 9,
            'name' => 'ግንቦት',
        ]);
        EthMonth::create([
            'number' => 10,
            'name' => 'ሰኔ',
        ]);
        EthMonth::create([
            'number' => 11,
            'name' => 'ሐምሌ',
        ]);
        EthMonth::create([
            'number' => 12,
            'name' => 'ነሐሴ',
        ]);
        EthMonth::create([
            'number' => 13,
            'name' => 'ጳጉሜ',
        ]);
    }
}
