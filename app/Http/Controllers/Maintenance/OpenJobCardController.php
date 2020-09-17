<?php

namespace App\Http\Controllers\Maintenance;

use App\HRM\Personale;
use App\Http\Controllers\Controller;
use App\Maintenance\Customer;
use App\Maintenance\JobCardType;
use App\Maintenance\JobIdent;
use App\Maintenance\JobSystem;
use App\Maintenance\OpenJobCard;
use App\Maintenance\Workshop;
use App\Operation\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OpenJobCardController extends Controller
{

    public function index()
    {
        $ojcs = OpenJobCard::orderBy('created_at', 'DESC')->get();
        // $job_idnets = JobIdent::where('id', $ojcs->job_ident_id)->get();
        // dd($ojcs);
        // $jsondd = json_decode($ojcs->job_system_id);
        // dd($jsondd);
        // dd($ojcs->job_system_id);
        // dd($ojcs->job_system_id);
        // $job_system = JobSystem::whereIn('id',  $jsondd)->first();
        // dd($job_system->name);
        return view('maintenance.open_job_card.index')
            // ->with('job_idnets', $job_idnets)
            ->with('ojcs', $ojcs);
    }

    public function create()
    {
        $ojc = new OpenJobCard;
        $workshops = Workshop::all();
        $trucks = Truck::all();
        $customers = Customer::all();
        $drivers = Personale::driver()->get();
        $mechanics = Personale::where('department_id', 2)->get();
        $job_systems = JobSystem::all();
        $job_idents = JobIdent::all();
        $job_card_types = JobCardType::all();
        return view('maintenance.open_job_card.create')
            ->with('trucks', $trucks)
            ->with('workshops', $workshops)
            ->with('customers', $customers)
            ->with('drivers', $drivers)
            ->with('mechanics', $mechanics)
            ->with('job_systems', $job_systems)
            ->with('job_idents', $job_idents)
            ->with('job_card_types', $job_card_types)
            ->with('ojc', $ojc);
    }


    public function store(Request $request)
    {
        $ojc = new OpenJobCard();
        $json_job_system = json_encode($request->jobsystem);
        $json_job_ident = json_encode($request->job_ident);
        $ojc->Job_card_number = $request->Job_card_number;
        $ojc->opening_date = $request->opening_date;
        $ojc->workshop_id = $request->workshop_id;
        $ojc->truck_id = $request->trucks;
        $ojc->customer_id = $request->customer;
        $ojc->job_system_id = $json_job_system;
        $ojc->job_ident_id =  $json_job_ident;
        $ojc->km_reading = $request->km_reading;
        $ojc->km_reading_date = $request->km_reading_date;
        $ojc->driver_id = $request->driver;
        $ojc->mechanic_id = $request->mechnic;
        $ojc->ass_mechanic_id = $request->assistant_mechnic;
        $ojc->receptionist_id = $request->receptionist;
        $ojc->save();
        Session::flash('success',  $ojc->Job_card_number .  'Job Card Created successfully');
        return redirect()->route('open_job_card.index');
        // $items = DB::table('job_idents')->whereIn('job_system_id', $request->jobsystem)->get();
        // dd($items);
    }

    public function show($id)
    {
        $ojc = OpenJobCard::findOrFail($id);

        $job_systems = JobSystem::whereIn('id', json_decode($ojc->job_system_id))->get();
        $job_idents = JobIdent::whereIn('id', json_decode($ojc->job_ident_id))->get();
        // dd($job_system);
        return view('maintenance.open_job_card.show')
            ->with('job_systems', $job_systems)
            ->with('job_idents', $job_idents)
            ->with('ojc', $ojc);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function jobIdent(Request $request)
    {
        if ($request->ajax()) {
            // dd($request->jobsystem);
            $job_idents = DB::table('job_idents')->whereIn('job_system_id', $request->jobsystem)->orderBy('name')->get();
            // dd($jbo_idents);
            return view('maintenance.open_job_card.job_system')
                ->with('job_idents', $job_idents);
        }
        // $arr = $request->all;
        // dd($arr);
        // return $jbo_idents;
    }
}
