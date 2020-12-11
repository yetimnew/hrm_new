<?php

namespace App\Http\Controllers\HRM;

use App\EthDate;
use App\EthMonth;
use App\EthYear;
use App\HRM\LeavePeriod;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LeavePeriodController extends Controller
{

    public function index()
    {
        $leave_periods = LeavePeriod::all();
        return view('hrm.leave_period.index')->with('leave_periods', $leave_periods);
    }

    public function create()
    {
        $leave_period = new LeavePeriod;
        $leave_period->start_date = '0000-00-00';
        $leave_period->end_date = '0000-00-00';
        $eth_year = EthYear::all();
        $eth_month = EthMonth::all();
        $eth_date = EthDate::all();
        return view('hrm.leave_period.create')
            ->with('leave_period', $leave_period)
            ->with('eth_year', $eth_year)
            ->with('eth_month', $eth_month)
            ->with('eth_date', $eth_date);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data =  $this->validate($request, [
            'name' =>  'required|unique:leave_periods,name',
            'ddate' => 'required|min:1|max:30',
            'ddmonth' =>  'required|min:1|max:12',
            'ddyear' => 'required|numeric',
            'hdate' =>  'required|min:1|max:30',
            'hmonth' => 'required|min:1|max:12',
            'hyear' =>  'required|numeric',
        ]);
        try {
            $ethio_birthdate = \Andegna\DateTimeFactory::of($request->ddyear,   $request->ddmonth, $request->ddate);
            $ethio_hiredate = \Andegna\DateTimeFactory::of($request->hyear,   $request->hmonth, $request->hdate);
          } catch (Exception $e) {
                  Session::flash('error', 'Invalid date forma of birth date or hire date');
                  return redirect()->back();
          }
          $ethio_satart_date =  $ethio_birthdate->getYear() .'-'. $ethio_birthdate->getMonth() .'-'. $ethio_birthdate->getDay() ;
          $ethio_end_date =  $ethio_hiredate->getYear() .'-'. $ethio_hiredate->getMonth() .'-'. $ethio_hiredate->getDay() ;
        //   dd( $ethio_satart_date);

        // $leave_period = leave_period::create($data);
        $leave_period = new LeavePeriod;
        $leave_period->name = $request->name;
        $leave_period->start_date =   $ethio_satart_date;
        $leave_period->end_date =  $ethio_end_date;

        $leave_period->save();
        Session::flash('success',  'Registered successfully');
        return redirect()->route('leave_period.index');
    }

    public function edit($id)
    {

        $leave_period = LeavePeriod::findOrFail($id);
        $eth_year = EthYear::all();
        $eth_month = EthMonth::all();
        $eth_date = EthDate::all();
        return view('hrm.leave_period.edit')
            ->with('leave_period', $leave_period)
            ->with('eth_year', $eth_year)
            ->with('eth_month', $eth_month)
            ->with('eth_date', $eth_date);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' =>  'required|unique:leave_periods,name,' . $id,
            'ddate' => 'required|min:1|max:30',
            'ddmonth' =>  'required|min:1|max:12',
            'ddyear' => 'required|numeric',
            'hdate' =>  'required|min:1|max:30',
            'hmonth' => 'required|min:1|max:12',
            'hyear' =>  'required|numeric',

        ]);
        try {
            $ethio_birthdate = \Andegna\DateTimeFactory::of($request->ddyear,   $request->ddmonth, $request->ddate);
            $ethio_hiredate = \Andegna\DateTimeFactory::of($request->hyear,   $request->hmonth, $request->hdate);
          } catch (Exception $e) {
                  Session::flash('error', 'Invalid date forma of birth date or hire date');
                  return redirect()->back();
          }
          $ethio_satart_date =  $ethio_birthdate->getYear() .'-'. $ethio_birthdate->getMonth() .'-'. $ethio_birthdate->getDay() ;
          $ethio_end_date =  $ethio_hiredate->getYear() .'-'. $ethio_hiredate->getMonth() .'-'. $ethio_hiredate->getDay() ;

        $leave_period = LeavePeriod::findOrFail($id);
        $leave_period->name = $request->name;
        $leave_period->start_date =   $ethio_satart_date;
        $leave_period->end_date =  $ethio_end_date;

        $leave_period->save();
        Session::flash('success',  $leave_period->name . ' updated successfully');
        return redirect()->route('leave_period.index');
    }
    public function destroy($id)
    {
        $leave_period = LeavePeriod::findOrFail($id);
        $leave_period->delete();
        return response()->json(['success' => 'leave_period deleted successfully']);
    }
}
