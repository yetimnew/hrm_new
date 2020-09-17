<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Maintenance\DownTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DownTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downtimes = DownTime::orderBy('created_at', 'DESC')->get();
        return view('maintenance.downtime.index')->with('downtimes', $downtimes);
    }

    public function create()
    {
        $downtime = new DownTime();

        return view('maintenance.downtime.create')
            ->with('downtime', $downtime);
    }


    public function store(Request $request)
    {
        $this->validate($request, [

            'name' =>  'required|max:50',
            // 'comment' =>  'required|min:2',
        ]);

        $downtime = new downtime;
        $downtime->name = $request->name;
        $downtime->comment = $request->comment;

        $downtime->save();

        Session::flash('success',  $downtime->name .  ' registered successfully');
        return redirect()->route('downtime.index');
    }

    public function edit($id)
    {
        $downtime = DownTime::findOrFail($id);

        return view('maintenance.downtime.edit')
            ->with('downtime', $downtime);
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [

            'name' =>  'required|max:50',
            // 'comment' =>  'required|min:2',
        ]);

        $downtime = DownTime::findOrFail($id);
        $downtime->name = $request->name;
        $downtime->comment = $request->comment;

        $downtime->save();

        Session::flash('success',  $downtime->name .  ' Updated successfully');
        return redirect()->route('downtime.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $downtime = Downtime::findOrFail($id);
        $downtime->delete();
        Session::flash('success',  $downtime->name . ' Deleted successfully');
        return redirect()->route('downtime.index');
    }
}
