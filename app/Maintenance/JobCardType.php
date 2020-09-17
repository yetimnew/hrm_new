<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;

class JobCardType extends Model
{
    protected $fillable = ['name', 'comment', 'status'];
}
