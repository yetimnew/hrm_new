<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;

class JobIdent extends Model
{
    protected $fillable = ['name', 'job_system_id', 'mechanic_hours', 'ass_mechanic_hours', 'status'];

    public function jobsystem()
    {
        return $this->belongsTo('App\Maintenance\JobSystem',  'job_system_id');
    }
}
