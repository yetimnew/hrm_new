<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class EmployeesDependant extends Model
{
    protected $fillable = [
        'personale_id', 'name', 'relationship', 'relationship_type', 'date_of_birth'

    ];
}
