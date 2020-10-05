<?php

namespace App\Http\Controllers\HRM;

use App\HRM\Personale;
use App\HRM\WorkExperiance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WorkExperianceController extends Controller
{
    public function index()
    {
    }


    public function create($id)
    {
        $employee = Personale::where('id', $id)->first();
        $experience = new WorkExperiance;
        return view('hrm.personale.experiance.create')
            ->with('experience', $experience)
            ->with('employee', $employee);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'personale_id' =>  'required',
            'employer' =>  'required',
            'job_title' =>  'required',
            'from_date' =>  'required',
            'to_date' =>  'required',
            'comment' =>  '',
        ]);

        // $experiance = WorkExperiance::create($data);
        $experiance = new WorkExperiance;
        $experiance->personale_id = $request->personale_id;
        $experiance->employer = $request->employer;
        $experiance->job_title = $request->job_title;
        $experiance->from_date = $request->from_date;
        $experiance->to_date = $request->to_date;
        $experiance->comment = $request->comment;
        $experiance->save();

        Session::flash('success', 'Emergency Contact registered successfully');
        return redirect()->route('personale.show', $experiance->personale_id);
        // return redirect()->route('experiance.index');
    }

    public function edit($id)
    {
        $experience = WorkExperiance::findOrFail($id);
        $employee = Personale::where('id',  $experience->personale_id)->first();
        return view('hrm.personale.experiance.edit')

            ->with('employee', $employee)
            ->with('experience', $experience);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'personale_id' =>  'required',
            'employer' =>  'required',
            'job_title' =>  'required',
            'from_date' =>  'required',
            'to_date' =>  'required',
            'comment' =>  '',

        ]);

        $experiance = WorkExperiance::findOrFail($id);
        $experiance->personale_id = $request->personale_id;
        $experiance->employer = $request->employer;
        $experiance->job_title = $request->job_title;
        $experiance->from_date = $request->from_date;
        $experiance->to_date = $request->to_date;
        $experiance->comment = $request->comment;

        $experiance->save();
        Session::flash('success',  $experiance->name . ' updated successfully');
        return redirect()->route('personale.show', $experiance->personale_id);
    }


    public function destroy($id)
    {
        $experiance = WorkExperiance::findOrFail($id);
        $experiance->delete();
        Session::flash('success',   ' Experiances Deleted successfully');
        return redirect()->back();
        // return response()->json(['success' => 'experiance deleted successfully']);
    }
}
