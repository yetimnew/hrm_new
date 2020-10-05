<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class WorkExperiance extends Model
{
    // protected $table = ['work_experiances'];
    protected $fiallable = ['personale_id', 'employer', 'job_title', 'from_date', 'to_date', 'comment'];
}
