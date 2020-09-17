<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Maintenance\JobIdent;
use App\Maintenance\JobSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobIdentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobidents = JobIdent::with('jobsystem')->orderBy('created_at', 'DESC')->get();
        // dd($jobidents);
        return view('maintenance.job_ident.index')->with('jobidents', $jobidents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobident = new JobIdent;
        $jobsystems = JobSystem::all();
        return view('maintenance.job_ident.create')
            ->with('jobsystems', $jobsystems)
            ->with('jobident', $jobident);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required|max:50',
            'jobsystem' =>  'required',
            'mechanic_hours' =>  'required',
            'ass_mechanic_hours' =>  'required',
            'comment' =>  '',

            // 'comment' =>  'required|min:2',
        ]);

        $jobident = new JobIdent;
        $jobident->name = $request->name;
        $jobident->job_system_id = $request->jobsystem;
        $jobident->mechanic_hours = $request->mechanic_hours;
        $jobident->ass_mechanic_hours = $request->ass_mechanic_hours;
        $jobident->comment = $request->comment;

        $jobident->save();
        Session::flash('success',  $jobident->name .  ' registered successfully');
        return redirect()->route('job_ident.index');
    }


    public function edit($id)
    {
        $jobident = JobIdent::findOrFail($id);
        $jobsystems = JobSystem::all();

        return view('maintenance.job_ident.edit')
            ->with('jobsystems', $jobsystems)
            ->with('jobident', $jobident);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>  'required|max:50',
            'jobsystem' =>  'required',
            'mechanic_hours' =>  'required',
            'ass_mechanic_hours' =>  'required',
            'comment' =>  '',

            // 'comment' =>  'required|min:2',
        ]);

        $jobident = JobIdent::findOrFail($id);
        $jobident->name = $request->name;
        $jobident->job_system_id = $request->jobsystem;
        $jobident->mechanic_hours = $request->mechanic_hours;
        $jobident->ass_mechanic_hours = $request->ass_mechanic_hours;
        $jobident->comment = $request->comment;

        $jobident->save();
        Session::flash('success',  $jobident->name .  ' Updated successfully');
        return redirect()->route('job_ident.index');
    }

    public function destroy($id)
    {
        $jobident = JobIdent::findOrFail($id);
        $jobident->delete();
        Session::flash('success',  $jobident->name . ' Deleted successfully');
        return redirect()->route('job_ident.index');
    }
}
