<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;

class JobSystem extends Model
{
    protected $fillable = ['name', 'comment', 'status'];

    // public function jobidents()
    // {
    //     return $this->hasMany('App\Maintenance\JobIdent', '');
    // }

    public function jobidents()
    {
        return $this->hasMany('App\Maintenance\JobIdent', 'job_system_id');
    }
}
