<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Operation\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::active()->orderBy('updated_at', 'DESC')->get();
        return view('operation.truck.index')->with('trucks', $trucks);
    }
}
