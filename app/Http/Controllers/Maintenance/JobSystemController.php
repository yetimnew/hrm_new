<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Maintenance\JobSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobSystemController extends Controller
{

    public function index()
    {
        $jobsystems = JobSystem::orderBy('created_at', 'DESC')->get();
        return view('maintenance.job_system.index')->with('jobsystems', $jobsystems);
    }

    public function create()
    {
        $jobsystem = new JobSystem();
        return view('maintenance.job_system.create')
            ->with('jobsystem', $jobsystem);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required|max:50',
            // 'comment' =>  'required|min:2',
        ]);

        $jobsystem = new JobSystem;
        $jobsystem->name = $request->name;
        $jobsystem->comment = $request->comment;

        $jobsystem->save();

        Session::flash('success',  $jobsystem->name .  ' registered successfully');
        return redirect()->route('job_system.index');
    }


    public function edit($id)
    {
        $jobsystem = JobSystem::findOrFail($id);

        return view('maintenance.job_system.edit')
            ->with('jobsystem', $jobsystem);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>  'required|max:50',
            // 'comment' =>  'required|min:2',
        ]);

        $jobsystem = JobSystem::findOrFail($id);
        $jobsystem->name = $request->name;
        $jobsystem->comment = $request->comment;

        $jobsystem->save();

        Session::flash('success',  $jobsystem->name .  ' Updated successfully');
        return redirect()->route('job_system.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobsystem = JobSystem::findOrFail($id);
        $jobsystem->delete();
        Session::flash('success',  $jobsystem->name . ' Deleted successfully');
        return redirect()->route('job_system.index');
    }
}
