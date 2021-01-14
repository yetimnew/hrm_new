<?php

namespace App\Rules;

use App\HRM\Leave;
use Illuminate\Contracts\Validation\Rule;

class LeaveOverlap implements Rule
{

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        // dd($request);
        return Leave::where('request_date',$value)->count()==0;
    }

    public function message()
    {
        return 'Date overlap with the existing request.';
    }
}
