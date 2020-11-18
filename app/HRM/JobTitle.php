<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    protected $table = 'jobtitles';
    protected $fillable = [
        'id',
        'name',
        'department_id',
        'given_number',
        'job_description',
        'status'
    ];
    public function personales()
    {
        return $this->hasMany('App\HRM\Personale');
    }
    public function department()
    {
        return $this->belongsTo('App\HRM\Department');
    }
    // public function personales()
    // {
    //     return $this->hasMany('App\HRM\Personale');
    // }
}
