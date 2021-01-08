<?php

namespace Database\Seeders;

use App\HRM\PayGrade;
use Illuminate\Database\Seeder;

class PayGradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PayGrade::create([
            'name' => 'ደረጃ 10',
            'comment' => 'ደረጃ 10'
                 ]);
        PayGrade::create([
            'name' => 'ደረጃ 11',
            'comment' => 'ደረጃ 11'
                 ]);
        PayGrade::create([
            'name' => 'ደረጃ 12',
            'comment' => 'ደረጃ 12'
                 ]);
    }
}
