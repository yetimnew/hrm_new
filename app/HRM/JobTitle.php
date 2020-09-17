<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    protected $fillable = [
        'id',
        'name',
        'job_description',
        'status'
    ];
    public function personales()
    {
        return $this->hasMany('App\HRM\Personale');
    }
}
