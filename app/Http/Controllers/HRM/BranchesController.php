<?php

namespace App\Http\Controllers\HRM;

use App\HRM\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function index()
    {
        $branches = Branch::orderBy('created_at', 'DESC')->get();
        return view('hrm.branch.index')->with('branches', $branches);
    }

    public function create()
    {
        $branch = new Branch;
        // $positions = Position::orderBy('created_at', 'DESC')->get();
        return view('hrm.branch.create')
            ->with('branch', $branch);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data =  $this->validate($request, [

            'name' =>  'required|unique:branches,name',
            'city' =>  'required',
            'address' =>  '',
            'phone' =>  '',
            'fax' =>  '',

        ]);

        // $branch = Branch::create($data);
        $branch = new Branch;
        $branch->name = $request->name;
        $branch->city = $request->city;
        $branch->address = $request->address;
        $branch->phone = $request->phone;
        $branch->fax = $request->fax;

        $branch->save();


        Session::flash('success',  $branch->name .  ' registered successfully');
        return redirect()->route('branch.index');
    }

    public function edit($id)
    {

        $branch = Branch::findOrFail($id);
        return view('hrm.branch.edit')
            ->with('branch', $branch);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' =>  'required|unique:branches,name,' . $id,
            'city' =>  'required',
            'address' =>  '',
            'phone' =>  '',
            'fax' =>  '',

        ]);

        $branch = Branch::findOrFail($id);
        $branch->name = $request->name;
        $branch->city = $request->city;
        $branch->address = $request->address;
        $branch->phone = $request->phone;
        $branch->fax = $request->fax;

        $branch->save();
        Session::flash('success',  $branch->name . ' updated successfully');
        return redirect()->route('branch.index');
    }
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return response()->json(['success' => 'branch deleted successfully']);
    }
}
