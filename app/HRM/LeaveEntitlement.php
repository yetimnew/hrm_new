<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveEntitlement extends Model
{
    use HasFactory;
    public function personal()
    {
        return $this->belongsTo('App\HRM\Personale','personale_id');
    }
    public function leave_type()
    {
        return $this->belongsTo('App\HRM\LeaveType','leave_type_id');
    }
    public function leave_period()
    {
        return $this->belongsTo('App\HRM\LeavePeriod','leave_period_id');
    }
}
