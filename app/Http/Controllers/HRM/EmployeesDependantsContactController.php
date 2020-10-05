<?php

namespace App\Http\Controllers\HRM;

use App\HRM\EmployeesDependant;
use App\HRM\Personale;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeesDependantsContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        // dd($id);
        $employees_dependant = new EmployeesDependant;
        $employee = Personale::findOrFail($id);

        return view('hrm.personale.dependants.create')

            ->with('employees_dependant', $employees_dependant)
            ->with('employee', $employee);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data =  $this->validate($request, [

            'personale_id' =>  'required',
            'name' =>  'required',
            'relationship' =>  'required',
            'relationship_type' =>  'required',
            'date_of_birth' =>  'required|date',


        ]);

        $employees_dependant = new EmployeesDependant;
        $employees_dependant->personale_id = $request->personale_id;
        $employees_dependant->name = $request->name;
        $employees_dependant->relationship = $request->relationship;
        $employees_dependant->relationship_type = $request->relationship_type;
        $employees_dependant->date_of_birth = $request->date_of_birth;

        $employees_dependant->save();

        Session::flash('success', 'Dependant registered successfully');
        return redirect()->route('personale.show', $employees_dependant->personale_id);
    }


    public function edit($id)
    {
        $employees_dependant = EmployeesDependant::findOrFail($id);
        $employee = Personale::where('id',  $employees_dependant->personale_id)->first();
        return view('hrm.personale.dependants.edit')

            ->with('employees_dependant', $employees_dependant)
            ->with('employee', $employee);
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        $employees_dependant = EmployeesDependant::findOrFail($id);
        // $personale = EmployeesDependant::where('personale_id', $employees_dependant->personale_id)->first();

        // dd($employee->personale_id);

        $this->validate($request, [

            'personale_id' =>  'required',
            'name' =>  'required',
            'relationship' =>  'required',
            'relationship_type' =>  'required',
            'date_of_birth' =>  'required|date',


        ]);
        // $employees_dependant = EmployeesDependant::findOrFail($id);
        $employees_dependant->personale_id = $request->personale_id;
        $employees_dependant->name = $request->name;
        $employees_dependant->relationship = $request->relationship;
        $employees_dependant->relationship_type = $request->relationship_type;
        $employees_dependant->date_of_birth = $request->date_of_birth;

        $employees_dependant->save();
        Session::flash('success', 'Dependant updated successfully');
        return redirect()->route('personale.show', $employees_dependant->personale_id);
    }


    public function destroy($id)
    {
        $employees_dependant = EmployeesDependant::findOrFail($id);
        $employees_dependant->delete();
        Session::flash('success',  $employees_dependant->name . ' Deleted successfully');
        return redirect()->back();
    }
}
