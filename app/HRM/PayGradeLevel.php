<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class PayGradeLevel extends Model
{
    protected $table = 'pay_grade_levels';

    public function pay_grade()
    {
        return $this->belongsTo('App\HRM\PayGrade');
    }
}
