<?php

namespace App\Http\Controllers\HRM;

use App\HRM\LeaveType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{

    public function index()
    {
        $leave_types = LeaveType::all();
        return view('hrm.leave_type.index')->with('leave_types', $leave_types);
    }

    public function create()
    {
        $leave_type = new LeaveType;
        return view('hrm.leave_type.create')
            ->with('leave_type', $leave_type);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data =  $this->validate($request, [
            'name' =>  'required|unique:leave_types,name',
        ]);

        // $leave_type = leave_type::create($data);
        $leave_type = new LeaveType;
        $leave_type->name = $request->name;

        $leave_type->save();
        Session::flash('success',  $leave_type->name .  ' registered successfully');
        return redirect()->route('leave_type.index');
    }

    public function edit($id)
    {

        $leave_type = LeaveType::findOrFail($id);
        return view('hrm.leave_type.edit')
            ->with('leave_type', $leave_type);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' =>  'required|unique:leave_types,name,' . $id,

        ]);

        $leave_type = LeaveType::findOrFail($id);
        $leave_type->name = $request->name;

        $leave_type->save();
        Session::flash('success',  $leave_type->name . ' updated successfully');
        return redirect()->route('leave_type.index');
    }
    public function destroy($id)
    {
        $leave_type = LeaveType::findOrFail($id);
        $leave_type->delete();
        return response()->json(['success' => 'leave_type deleted successfully']);
    }
}
