<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Maintenance\JobCardType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobCarTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jcts = JobCardType::orderBy('created_at', 'DESC')->get();
        return view('maintenance.job_card_type.index')->with('jcts', $jcts);
    }

    public function create()
    {
        $jct = new JobCardType();
        return view('maintenance.job_card_type.create')
            ->with('jct', $jct);
    }


    public function store(Request $request)
    {
        $this->validate($request, [

            'name' =>  'required|max:50',
            // 'comment' =>  'required|min:2',
        ]);

        $jct = new JobCardType;
        $jct->name = $request->name;
        $jct->comment = $request->comment;

        $jct->save();

        Session::flash('success',  $jct->name .  ' registered successfully');
        return redirect()->route('job_card_type.index');
    }


    public function edit($id)
    {
        $jct = JobCardType::findOrFail($id);

        return view('maintenance.job_card_type.edit')
            ->with('jct', $jct);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' =>  'required|max:50',
            // 'comment' =>  'required|min:2',
        ]);

        $jct = JobCardType::findOrFail($id);
        $jct->name = $request->name;
        $jct->comment = $request->comment;

        $jct->save();

        Session::flash('success',  $jct->name .  ' Updated successfully');
        return redirect()->route('job_card_type.index');
    }

    public function destroy($id)
    {

        $jct = JobCardType::findOrFail($id);
        $jct->delete();
        Session::flash('success',  $jct->name . ' Deleted successfully');
        return redirect()->route('job_card_type.index');
    }
}
