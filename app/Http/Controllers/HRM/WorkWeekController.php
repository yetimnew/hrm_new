<?php

namespace App\Http\Controllers\HRM;

use App\HRM\WorkWeek;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WorkWeekController extends Controller
{
    public function index()
    {
        $work_week = WorkWeek::orderBy('created_at', 'DESC')->first();
        // dd( $work_week);
        return view('hrm.work_week.index')->with('work_week', $work_week);
    }

    public function create()
    {

    }


    public function store(Request $request)
    {

    }

    public function edit($id)
    {

        $work_week = WorkWeek::findOrFail($id);
        return view('hrm.work_week.edit')
            ->with('work_week', $work_week);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [

            'mon' =>  'required|in:0,4,8',
            'tue' =>  'required|in:0,4,8',
            'wed' =>  'required|in:0,4,8',
            'thu' =>  'required|in:0,4,8',
            'fri' =>  'required|in:0,4,8',
            'sat' =>  'required|in:0,4,8',
            'sun' =>  'required|in:0,4,8',
        ]);

        $work_week = WorkWeek::findOrFail($id);
        $work_week->mon = $request->mon;
        $work_week->tue = $request->tue;
        $work_week->wed = $request->wed;
        $work_week->thu = $request->thu;
        $work_week->fri = $request->fri;
        $work_week->sat = $request->sat;
        $work_week->sun = $request->sun;
        $work_week->save();
        Session::flash('success',  ' updated successfully');
        return redirect()->route('work_week.index');
    }
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return response()->json(['success' => 'branch deleted successfully']);
    }
}

