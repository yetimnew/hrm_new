<?php

namespace App\Http\Controllers\HRM;

use App\EthDate;
use App\EthYear;
use App\EthMonth;
use Illuminate\Http\Request;
use App\HRM\LeaveEntitlement;
use App\HRM\LeavePeriod;
use App\HRM\LeaveType;
use App\HRM\Personale;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LeaveEntitlementController extends Controller
{
    public function index()
    {
        $leave_entitlements = LeaveEntitlement::all();
        return view('hrm.leave_entitlement.index')->with('leave_entitlements', $leave_entitlements);
    }

    public function create()
    {
        $leave_entitlement = new LeaveEntitlement;
        $leave_entitlements = LeaveEntitlement::all();
        $personals = Personale::active()->get();
        $leave_types = LeaveType::all();
        $leave_periods = LeavePeriod::all();
        $leave_entitlement->start_date = '0000-00-00';
        $leave_entitlement->end_date = '0000-00-00';
        $eth_year = EthYear::all();
        $eth_month = EthMonth::all();
        $eth_date = EthDate::all();

        return view('hrm.leave_entitlement.create')
            ->with('leave_entitlement', $leave_entitlement)
            ->with('leave_entitlements', $leave_entitlements)
            ->with('personals', $personals)
            ->with('leave_types', $leave_types)
            ->with('leave_periods', $leave_periods)
            ->with('eth_year', $eth_year)
            ->with('eth_month', $eth_month)
            ->with('eth_date', $eth_date);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data =  $this->validate($request, [
            'personale_id' =>  'required|numeric',
            'no_of_days' =>  'required|min:1|max:100',
            'leave_type_id_' => 'required|numeric',
            'days_used' => 'required|numeric',
            'note' => '',
            'leave_period_id_' => 'required|numeric'

        ]);
        $leave_entitlement = LeaveEntitlement::where('personale_id',$request->personale_id)->first();
        $leave_entitlement_where = LeaveEntitlement::where('personale_id',$request->personale_id)
        ->where('leave_type_id',$request->leave_type_id_)
        ->where('leave_period_id',$request->leave_period_id_)
        ->first();


        if(isset($leave_entitlement_where)){
            $leave_entitlement_update = LeaveEntitlement::findOrFail($leave_entitlement_where->id);
            $leave_entitlement_update->personale_id = $request ->personale_id;
            $leave_entitlement_update->no_of_days = $request ->no_of_days + $leave_entitlement_where->no_of_days;
            $leave_entitlement_update->leave_type_id = $request ->leave_type_id_;
            $leave_entitlement_update->days_used = $request ->days_used + $leave_entitlement_where->days_used;
            $leave_entitlement_update->note = $request ->note;
            $leave_entitlement_update->leave_period_id = $request ->leave_period_id_;
            $leave_entitlement_update->user_id = Auth::user()->id;
            $leave_entitlement_update->save();

            Session::flash('success',  $leave_entitlement->no_of_days .'  added  '. $request ->no_of_days. '  Registered successfully');
            return redirect()->route('leave_entitlement.index');
        }else{
        $leave_entitlement = new LeaveEntitlement;
        $leave_entitlement->personale_id = $request->personale_id;
        $leave_entitlement->no_of_days = $request->no_of_days;
        $leave_entitlement->days_used = $request->days_used;
        $leave_entitlement->leave_type_id = $request->leave_type_id_;
        $leave_entitlement->leave_period_id = $request->leave_period_id_;
        $leave_entitlement->note = $request->note;
        $leave_entitlement->user_id = Auth::user()->id;
        $leave_entitlement->save();

        Session::flash('success',  'Registered successfully');
        return redirect()->route('leave_entitlement.index');
        }

    }

    public function edit($id)
    {

        $leave_entitlement = LeaveEntitlement::findOrFail($id);
        $personals = Personale::all();
        $leave_types = LeaveType::all();
        $leave_periods = LeavePeriod::all();
        $eth_year = EthYear::all();
        $eth_month = EthMonth::all();
        $eth_date = EthDate::all();
        return view('hrm.leave_entitlement.edit')
            ->with('leave_entitlement', $leave_entitlement)
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

        $leave_entitlement =   LeaveEntitlement::findOrFail($id);
        $leave_entitlement->personale_id = $request->personale_id;
        $leave_entitlement->no_of_days = $request->no_of_days;
        $leave_entitlement->days_used = $request->days_used;
        $leave_entitlement->leave_type_id = $request->leave_type_id_;
        $leave_entitlement->leave_period_id = $request->leave_period_id_;
        $leave_entitlement->note = $request->note;
        $leave_entitlement->user_id = Auth::user()->id;
        $leave_entitlement->save();
        Session::flash('success',  $leave_entitlement->name . ' updated successfully');
        return redirect()->route('leave_entitlement.index');
    }
    public function destroy($id)
    {
        $leave_entitlement = LeaveEntitlement::findOrFail($id);
        $leave_entitlement->delete();
        return response()->json(['success' => 'leave_entitlement deleted successfully']);
    }
    public function list_of_leave(Request $request)
    {
        $personale_id= $request->personale_id;
        if ($request->ajax()) {
            // $leave_entitlement = new LeaveEntitlement;
            //   $personale_id = $request->personale_id;

            $leave_entitlements = LeaveEntitlement::where('personale_id', $personale_id)->get();
              return view('hrm.leave_entitlement.append')
            //   return  $leave_entitlements;
                // ->with('leave_entitlement', $leave_entitlement)
                ->with('leave_entitlements', $leave_entitlements);
        }
    }
}
