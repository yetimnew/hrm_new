<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'id',
        'name',
        'status'
    ];
    public function personales()
    {
        return $this->hasMany('App\HRM\Personale');
    }
}
