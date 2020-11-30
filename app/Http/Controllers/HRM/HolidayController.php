<?php

namespace App\Http\Controllers\HRM;

use App\EthDate;
use App\EthMonth;
use App\EthYear;
use App\HRM\Holiday;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HolidayController extends Controller
{
    public function index()
    {
        $holidays = Holiday::orderBy('created_at', 'DESC')->get();
        return view('hrm.holiday.index')->with('holidays', $holidays);
    }

    public function create()
    {
        $holiday = new Holiday;
        $holiday->date = '0000-00-00';
        $eth_year = EthYear::all();
        $eth_month = EthMonth::all();
        $eth_date = EthDate::all();

        return view('hrm.holiday.create')
            ->with('holiday', $holiday)
            ->with('eth_year', $eth_year)
            ->with('eth_month', $eth_month)
            ->with('eth_date', $eth_date);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data =  $this->validate($request, [
            'name' =>  'required|unique:holidays,description',
            'dddate' =>  'required',
            'ddmonth' =>  'required',
            'ddyear' =>  'required',
            'recurring' =>  '',
        ]);
        try {
            $ethio_birthdate = \Andegna\DateTimeFactory::of($request->ddyear,   $request->ddmonth, $request->dddate);
          } catch (Exception $e) {
                  Session::flash('error', 'Invalid date forma of birth date or hire date');
                  return redirect()->back();
          }

        $ethio_ddate =  $ethio_birthdate->getYear() .'-'. $ethio_birthdate->getMonth() .'-'. $ethio_birthdate->getDay() ;

        // $job_title = job_title::create($data);
        $holiday = new Holiday();
        $holiday->description = $request->name;
        $holiday->date =$ethio_ddate;
        $holiday->recurring = $request->recurring;

        $holiday->save();
        Session::flash('success',  $holiday->name .  ' registered successfully');
        return redirect()->route('holiday.index');
    }

    public function edit($id)
    {

        $holiday = Holiday::findOrFail($id);
        $eth_year = EthYear::all();
        $eth_month = EthMonth::all();
        $eth_date = EthDate::all();
        return view('hrm.holiday.edit')
            ->with('holiday', $holiday)
            ->with('eth_year', $eth_year)
            ->with('eth_month', $eth_month)
            ->with('eth_date', $eth_date);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' =>  'required|unique:holidays,description,' . $id,
            'dddate' =>  'required',
            'ddmonth' =>  'required',
            'ddyear' =>  'required',
            'recurring' =>  '',
        ]);
        try {
            $ethio_birthdate = \Andegna\DateTimeFactory::of($request->ddyear,   $request->ddmonth, $request->dddate);
          } catch (Exception $e) {
                  Session::flash('error', 'Invalid date forma of birth date or hire date');
                  return redirect()->back();
          }
          $ethio_ddate =  $ethio_birthdate->getYear() .'-'. $ethio_birthdate->getMonth() .'-'. $ethio_birthdate->getDay() ;

        $holiday = Holiday::findOrFail($id);
        $holiday->description = $request->name;
        $holiday->date = $ethio_ddate;
        $holiday->recurring = $request->recurring;
        $holiday->save();
        Session::flash('success',  $holiday->description . ' updated successfully');
        return redirect()->route('holiday.index');
    }
    public function destroy($id)
    {
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();
        return response()->json(['success' => 'holiday deleted successfully']);
    }
}
