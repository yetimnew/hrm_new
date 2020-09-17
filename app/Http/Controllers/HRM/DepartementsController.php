<?php

namespace App\Http\Controllers\HRM;

use App\HRM\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartementsController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('created_at', 'DESC')->get();
        return view('hrm.department.index')->with('departments', $departments);
    }


    public function create()
    {
        $department = new Department;
        // $positions = Position::orderBy('created_at', 'DESC')->get();
        return view('hrm.department.create')
            ->with('department', $department);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [

            'name' =>  'required|unique:departments,name'

        ]);

        $department = new Department;
        $department->name = $request->name;
        $department->comment = $request->description;

        $department->save();

        Session::flash('success',  $department->name .  ' registerd successfuly');
        return redirect()->route('department.index');
    }


    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('hrm.department.show')
            ->with('department', $department);
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('hrm.department.edit')

            ->with('department', $department);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' =>  'required'

        ]);

        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->comment = $request->description;

        $department->save();
        Session::flash('success',  $department->name . ' updated successfuly');
        return redirect()->route('department.index');
    }


    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        Session::flash('success',  $department->name . ' Deleted successfuly');
        return redirect()->route('department.index');
    }
}
