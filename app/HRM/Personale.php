<?php

namespace App\HRM;

use Illuminate\Database\Eloquent\Model;

class Personale extends Model
{
    protected $fillable = [
        'id',
        'driverid',
        'firstname',
        'fathername',
        'gfathername',
        'sex',
        'birthdate',
        'zone',
        'woreda',
        'kebele',
        'housenumber',
        'mobile',
        'hireddate',
        'driver',
        'department_id',
        'position_id',
        'status'
    ];
    // public function getSexAttribute($attribute)
    // {
    //     return [
    //         1 => "Male",
    //         0 => "Female"
    //     ][$attribute];
    // }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }
    public function scopeDriver($query)
    {
        return $query->where('driver', 1);
    }
    public function department()
    {
        return $this->belongsTo('App\HRM\Department');
    }
    public function position()
    {
        return $this->belongsTo('App\HRM\Position');
    }
    public function getNameAttribute($value)
    {
        return  ucwords($value);
    }
    public function getFullNameAttribute()
    {
        return  ucfirst($this->firstname . ' ' . ucfirst($this->fathername)  . ' ' . ucfirst($this->gfathername));
    }
}
