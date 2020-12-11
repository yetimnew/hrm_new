<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class LeavePeriod extends Model
{
    //
    public function getEthYearAttribute()
    {
        $month =  explode('-',$this->start_date);
        return $month[0];

    }
    public function getEthMonthAttribute()
    {
        $month =  explode('-',$this->start_date);
        return $month[1];

    }
    public function getEthDateAttribute()
    {
        $month =  explode('-',$this->start_date);
        return $month[2];

    }
    public function getEthHYearAttribute()
    {
        $month =  explode('-',$this->end_date);
        return $month[0];

    }
    public function getEthHMonthAttribute()
    {
        $month =  explode('-',$this->end_date);
        return $month[1];

    }
    public function getEthHDateAttribute()
    {
        $month =  explode('-',$this->end_date);
        return $month[2];

    }
}
