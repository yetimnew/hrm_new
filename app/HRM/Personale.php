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
        'employment_status',
        'status'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }
    // protected $appends = ['image'];
    // public function getimageAttribute(){
    //     $image = $this->getMedia('image')->first();

    //     if($image){
    //             return $image->getPath();
    //             }

    // }
    // public function getSexAttribute($attribute)
    // {
    //     return [
    //         1 => "Male",
    //         0 => "Female"
    //     ][$attribute];
    // }
    // public function getEmploymentStatusAttribute($attribute)
    // {
    //     return [
    //         1 => "Permanent",
    //         0 => "Contract"
    //     ];
    // }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }
    public function scopePermanent($query)
    {
        return $query->where('employment_status', 1);
    }
    public function scopeContract($query)
    {
        return $query->where('employment_status', 0);
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
