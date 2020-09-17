<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;

class OpenJobCard extends Model
{
    protected $fillable = [
        'Job_card_number',
        'opening_date',
        'workshop_id',
        'truck_id',
        'customer_id',
        'job_system_id',
        'job_ident_id',
        'km_reading',
        'km_reading_date',
        'driver_id',
        'mechanic_id',
        'ass_mechanic_id',
        'opening_clerk_id',
        'receptionist_id'
    ];
    public function workshop()
    {
        return $this->belongsTo('App\Maintenance\Workshop',  'workshop_id');
    }
    public function truck()
    {
        return $this->belongsTo('App\Operation\Truck',  'truck_id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Maintenance\Customer',  'customer_id');
    }
    public function driver()
    {
        return $this->belongsTo('App\HRM\Personale',  'driver_id');
    }
}
