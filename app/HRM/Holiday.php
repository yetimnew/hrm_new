<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    public function getEthYearAttribute()
    {
        $month =  explode('-',$this->date);
        return $month[0];

    }
    public function getEthMonthAttribute()
    {
        $month =  explode('-',$this->date);
        return $month[1];

    }
    public function getEthDateAttribute()
    {
        $month =  explode('-',$this->date);
        return $month[2];

    }
}
