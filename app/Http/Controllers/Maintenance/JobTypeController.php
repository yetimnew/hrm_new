<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Maintenance\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobTypeController extends Controller
{

    public function index()
    {
        $jobtypes = JobType::orderBy('created_at', 'DESC')->get();
        return view('maintenance.job_type.index')->with('jobtypes', $jobtypes);
    }


    public function create()
    {
        $jobtype = new JobType;
        return view('maintenance.job_type.create')
            ->with('jobtype', $jobtype);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required|max:50',
            // 'comment' =>  'required|min:2',
        ]);

        $jobtype = new JobType;
        $jobtype->name = $request->name;
        $jobtype->comment = $request->comment;

        $jobtype->save();

        Session::flash('success',  $jobtype->name .  ' registered successfully');
        return redirect()->route('job_type.index');
    }


    public function edit($id)
    {
        $jobtype = JobType::findOrFail($id);

        return view('maintenance.job_type.edit')
            ->with('jobtype', $jobtype);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>  'required|max:50',
            // 'comment' =>  'required|min:2',
        ]);

        $jobtype = JobType::findOrFail($id);
        $jobtype->name = $request->name;
        $jobtype->comment = $request->comment;

        $jobtype->save();

        Session::flash('success',  $jobtype->name .  ' Updated successfully');
        return redirect()->route('job_type.index');
    }


    public function destroy($id)
    {
        $jobtype = JobType::findOrFail($id);
        $jobtype->delete();
        Session::flash('success',  $jobtype->name . ' Deleted successfully');
        return redirect()->route('job_type.index');
    }
}
