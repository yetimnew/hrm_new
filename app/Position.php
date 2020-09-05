<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'id',
        'name',
        'job_description',
        'status'
    ];
    public function personales()
    {
        return $this->hasMany('App\Personale');
    }
}
