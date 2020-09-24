<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class EmployeesEmergencyContact extends Model
{
    protected $table = 'employees_emergency_contacts';
    protected $fillable = [
        'personale_id', 'name', 'relationship', 'mobile', 'home_telephone', 'work_telephone'
    ];
}
