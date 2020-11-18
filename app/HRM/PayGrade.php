<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class PayGrade extends Model
{
    protected $fillable = ['name', 'comment', 'status'];

    public function pay_grade_levels()
    {
        return $this->hasMany('App\HRM\PayGradeLevel');
    }
    public function personals()
    {
        return $this->hasMany('App\HRM\Personale');
    }
}
