<?php

use App\Maintenance\Customer;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create(
            [
                'name' => 'ERTE',
                'address' => 'Addis abeba',
                'officenumber' => '123456789',
                'mobile' => '123456789'
            ]
        );
    }
}
