<?php

namespace App\Operation;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $fillable = [
        'id',
        'plate',
        'vehecletype_id',
        'chasisNumber',
        'engineNumber',
        'tyreSyze',
        'serviceIntervalKM',
        'purchasePrice',
        'productionDate',
        'serviceStartDate',
        'status',
        'created_at',
        'updated_at',
    ];
}
