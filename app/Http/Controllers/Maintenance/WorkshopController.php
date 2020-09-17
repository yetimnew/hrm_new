<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Maintenance\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = Workshop::orderBy('created_at', 'DESC')->get();
        return view('maintenance.workshop.index')->with('workshops', $workshops);
    }


    public function create()
    {
        $workshop = new Workshop;
        return view('maintenance.workshop.create')
            ->with('workshop', $workshop);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required|max:50',
            // 'comment' =>  'required|min:2',
        ]);

        $workshop = new Workshop;
        $workshop->name = $request->name;
        $workshop->comment = $request->comment;

        $workshop->save();

        Session::flash('success',  $workshop->name .  ' registered successfully');
        return redirect()->route('workshop.index');
    }


    public function edit($id)
    {
        $workshop = Workshop::findOrFail($id);

        return view('maintenance.workshop.edit')
            ->with('workshop', $workshop);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>  'required|max:50',
            // 'comment' =>  'required|min:2',
        ]);

        $workshop = Workshop::findOrFail($id);
        $workshop->name = $request->name;
        $workshop->comment = $request->comment;

        $workshop->save();

        Session::flash('success',  $workshop->name .  ' Updated successfully');
        return redirect()->route('workshop.index');
    }


    public function destroy($id)
    {
        $workshop = Workshop::findOrFail($id);
        $workshop->delete();
        Session::flash('success',  $workshop->name . ' Deleted successfully');
        return redirect()->route('workshop.index');
    }
}
