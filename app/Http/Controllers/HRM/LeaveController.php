<?php

namespace App\Http\Controllers\HRM;

use App\EthDate;
use App\EthMonth;
use App\EthYear;
use App\HRM\Holiday;
use App\HRM\Leave;
use App\HRM\LeaveEntitlement;
use App\HRM\LeavePeriod;
use App\HRM\LeaveType;
use App\HRM\Personale;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeaveRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::all();

        return view('hrm.leave.index')
        ->with('leaves', $leaves);
    }

    public function create()
    {
        $emp_details = DB::table('leave_entitlements')
    ->leftjoin('personales', 'personales.id', '=', 'leave_entitlements.personale_id')
    ->select(
        'personales.firstname AS name',

        DB::raw('SUM(leave_entitlements.no_of_days) as no_of_days'),
        DB::raw('SUM(leave_entitlements.days_used) as days_used'),
        DB::raw('SUM(leave_entitlements.no_of_days - leave_entitlements.days_used) as remaing_date'),
               )
    ->where('personale_id' , Auth::user()->id)
    ->groupBy('personales.firstname')
    ->get();
    // dd(  $emp_details);
        $leave = new Leave;
        $leaves = LeaveEntitlement::all();
        $personals = Personale::active()->get();
        $leave_types = LeaveType::all();
        // $emp_details = "";
        $leave->start_date = '0000-00-00';
        $leave->end_date = '0000-00-00';
        $eth_year = EthYear::all();
        $eth_month = EthMonth::all();
        $eth_date = EthDate::all();

        return view('hrm.leave.create')
            ->with('leave', $leave)
            ->with('leaves', $leaves)
            ->with('personals', $personals)
            ->with('leave_types', $leave_types)
            ->with('emp_details', $emp_details)
            ->with('eth_year', $eth_year)
            ->with('eth_month', $eth_month)
            ->with('eth_date', $eth_date);
    }


    public function store(Request $request )
    {
         $request->validate([
            'personale_id' =>  'required|numeric',
            'leave_type_id_' =>  'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'note' => '',
        ]);
        //auto in initialization
        $auto_id = 0;
        if( Leave::all()->count()){
            $auto_id= Leave::max('auto_id');
            $auto_id += 1;
}else{
    $auto_id=1;
 }

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $personale_id = $request->personale_id;
        $holydays = Holiday::all();
        $hodlyday_days = [];
        foreach($holydays as $hd){
            $hodlyday_days[] =   $hd->date;
        }
        // dd($hodlyday_days);
        $emp_details = DB::table('leave_entitlements')
            ->leftjoin('personales', 'personales.id', '=', 'leave_entitlements.personale_id')
            ->select(
                'personales.firstname AS name',

                DB::raw('SUM(leave_entitlements.no_of_days) as no_of_days'),
                DB::raw('SUM(leave_entitlements.days_used) as days_used'),
                DB::raw('SUM(leave_entitlements.no_of_days - leave_entitlements.days_used) as remaing_date'),
                    )
            ->where('personale_id', $personale_id)
            ->groupBy('personales.firstname')
            ->get();

        $datetime1 = Carbon::parse($start_date);
        $datetime2 = Carbon::parse($end_date );
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        // $days_used = 0
// it check the date the employee have and requested
if(  $days < $emp_details[0]->remaing_date ){
    $total_leave = 0;
    // dd("date comparison wokes");
    for ($i=0;  $i <=  $days  ; $i++) {
        $leave = new Leave;
        if( $i == 0 ){
                  $leave->request_date =   $datetime1;

        if( $datetime1->isWeekend()){
                $leave->length_hours =  0;
                $leave->length_days =  0;
            }else{
                $formatted_date = $datetime1->format("Y-m-d");
                if(in_array(  $formatted_date , $hodlyday_days)){
                    $leave->length_hours =  0;
                    $leave->length_days =  0;
                }
                else{
                    $leave->length_hours =  8;
                    $leave->length_days =  1;
                }
            }
        }else{
         $esti=    $leave->request_date =   $datetime1->addDay();
              if( $esti->isWeekend()){
                $leave->length_hours =  0;
                $leave->length_days =  0;
            }else{
                $formatted_date = $datetime1->format("Y-m-d");
                if(in_array(  $formatted_date , $hodlyday_days)){
                    $leave->length_hours =  0;
                    $leave->length_days =  0;
                }
                else{
                    $leave->length_hours =  8;
                    $leave->length_days =  1;
                }
            }
        }
        $leave->auto_id =   $auto_id ;
        $leave->status =  1;
        $leave->comment =  "sssssssss";
        $leave->personale_id = $request->personale_id;
        $leave->leave_type_id = $request->leave_type_id_;
        $leave->start_time = 8;
        $leave->end_time = 8;
        // dd( $leave);
        $leave->save();
        $total_leave =  $total_leave +  $leave->length_days;

    }
    // dd(    $total_leave);

    $leave_entitlement = LeaveEntitlement::where('personale_id', $leave->personale_id)->get();

    foreach ($leave_entitlement as $key => $lt) {

        $reaming_date =  $lt->no_of_days - $lt->days_used;

        if($lt->no_of_days >=  $lt->days_used){
            $esti = LeaveEntitlement::where('personale_id', $leave->personale_id)->take($key + 1 )->increment('days_used', $total_leave );

                $leave_entitlement = LeaveEntitlement::where('personale_id', $leave->personale_id)
                ->increment('days_used', $total_leave );
            // }

        }else{
            dd("False");
            $leave_entitlement = LeaveEntitlement::where('personale_id', $leave->personale_id)
            ->increment('days_used',0 );
        }
        // dd($lt->days_used);
    }


    // $leave_entitlement = LeaveEntitlement::where('personale_id', $leave->personale_id)->increment('days_used' , $total_leave);
    // ->update(array('days_used', DB::raw('days_used + 1000')));
    // // dd( $leave_entitlement);
    // $leave_entitlement->days_used + $total_leave;
    // // dd( $leave_entitlement);
    // $leave_entitlement->save();

    // DB::table('leave_entitlements')
    // ->where('personale_id',$leave->personale_id)
    // ->update(['days_used'=> $total_leave]);

        Session::flash('success',  'Registered successfully');
        return redirect()->route('leave.index');
}else{
    Session::flash('error',  'Requested date above the given date');
    return redirect()->back();
}
    }
    public function edit($id)
    {
        $leave = Leave::findOrFail($id);
        $personals = Personale::all();
        $leave_types = LeaveType::all();
        $leave_periods = LeavePeriod::all();
        $eth_year = EthYear::all();
        $eth_month = EthMonth::all();
        $eth_date = EthDate::all();
        return view('hrm.leave.edit')
            ->with('leave', $leave)
            ->with('personals', $personals)
            ->with('leave_types', $leave_types)
            ->with('leave_periods', $leave_periods)
            ->with('eth_year', $eth_year)
            ->with('eth_month', $eth_month)
            ->with('eth_date', $eth_date);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'personale_id' =>  'required|numeric',
            'no_of_days' =>  'required|min:1|max:100',
            'leave_type_id_' => 'required|numeric',
            'days_used' => 'required|numeric',
            'note' => '',
            'leave_period_id_' => 'required|numeric'

        ]);

        $leave =   Leave::findOrFail($id);
        $leave->personale_id = $request->personale_id;
        $leave->no_of_days = $request->no_of_days;
        $leave->days_used = $request->days_used;
        $leave->leave_type_id = $request->leave_type_id_;
        $leave->leave_period_id = $request->leave_period_id_;
        $leave->note = $request->note;
        $leave->user_id = Auth::user()->id;
        $leave->save();
        Session::flash('success',  $leave->name . ' updated successfully');
        return redirect()->route('leave.index');
    }
    public function destroy($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->delete();
        return response()->json(['success' => 'leave deleted successfully']);
    }
    public function list_of_leave(Request $request)
    {
        $personale_id= $request->personale_id;
        if ($request->ajax()) {
            $leaves = LeaveEntitlement::where('personale_id', $personale_id)->get();
            // dd($leaves);
            $emp_details = DB::table('leave_entitlements')
            ->leftjoin('personales', 'personales.id', '=', 'leave_entitlements.personale_id')
            ->select(
                'personales.firstname AS name',

                DB::raw('SUM(leave_entitlements.no_of_days) as no_of_days'),
                DB::raw('SUM(leave_entitlements.days_used) as days_used'),
                DB::raw('SUM(leave_entitlements.no_of_days - leave_entitlements.days_used) as remaing_date'),
                       )
            ->where('personale_id', $personale_id)
            ->groupBy('personales.firstname')
            ->get();
        //    $emp_details->toArray();
            // dd();

              return view('hrm.leave.append')
                ->with('emp_details', $emp_details)
                ->with('leaves', $leaves);
        }
    }
    public function live_balance(Request $request)
    {
        $personale_id= $request->personale_id;
              $leaves = LeaveEntitlement::where('personale_id', $personale_id)->get();
            // dd($leaves);
            $emp_details = DB::table('leave_entitlements')
            ->leftjoin('personales', 'personales.id', '=', 'leave_entitlements.personale_id')
            ->leftjoin('leaves', 'personales.id', '=', 'leave_entitlements.personale_id')
            ->select(
                'personales.firstname AS name',

                DB::raw('SUM(leave_entitlements.no_of_days) as no_of_days'),
                DB::raw('SUM(leave_entitlements.days_used) as days_used'),
                DB::raw('SUM(leaves.length_days) as days_used_new'),
                DB::raw('SUM(leave_entitlements.no_of_days - leave_entitlements.days_used) as remaing_date'),
                       )
            ->where('personale_id', $personale_id)
            ->groupBy('personales.firstname')
            ->get();
        //    $emp_details->toArray();
            // dd();

              return view('hrm.leave.append')
                ->with('emp_details', $emp_details)
                ->with('leaves', $leaves);

            }
        }

