<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;

class DownTime extends Model
{
    protected $fillable = ['name', 'comment', 'status'];
}
