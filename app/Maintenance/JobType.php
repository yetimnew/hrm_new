<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $fillable = ['name', 'comment', 'status'];
}
