<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';
    protected $fileable = ['name', 'city', 'address', 'phone', 'fax'];
}
