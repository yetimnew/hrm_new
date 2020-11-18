<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class EmployeesPromotion extends Model
{
protected $fillable = [
    'personale_id',
     'department_id',
     'jobtitle_id',
     'pay_grade_id',
     'pay_grade_level_id',
     'start_date',
     'comment'
];
public function personal()
{
    return $this->belongsTo('App\HRM\Personale','personale_id');
}
public function department()
{
    return $this->belongsTo('App\HRM\Department','department_id');
}
public function jobtitle()
{
    return $this->belongsTo('App\HRM\JobTitle','jobtitle_id');
}
public function paygrade()
{
    return $this->belongsTo('App\HRM\PayGrade','pay_grade_id');
}
public function paygradelevel()
{
    return $this->belongsTo('App\HRM\PayGradeLevel','pay_grade_level_id');
}

}
