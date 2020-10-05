<?php

namespace App\Http\Controllers\HRM;

use App\HRM\EmployeesEmergencyContact;
use App\HRM\Personale;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeesEmergencyContactController extends Controller
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
        $emergency_contact = new EmployeesEmergencyContact;
        $employee = Personale::findOrFail($id);
        // dd($employee);

        return view('hrm.personale.emergency_contact.create')

            ->with('emergency_contact', $emergency_contact)
            ->with('employee', $employee);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data =  $this->validate($request, [

            'personale_id' =>  'required',
            'name' =>  'required',
            'relationship' =>  'required',
            'mobile' =>  'required',
            'home_telephone' =>  'required',
            'work_telephone' =>  'required',


        ]);

        $emergency_contact = new EmployeesEmergencyContact;
        $emergency_contact->personale_id = $request->personale_id;
        $emergency_contact->name = $request->name;
        $emergency_contact->relationship = $request->relationship;
        $emergency_contact->mobile = $request->mobile;
        $emergency_contact->home_telephone = $request->home_telephone;
        $emergency_contact->work_telephone = $request->work_telephone;

        $emergency_contact->save();

        Session::flash('success', 'Emergency Contact registered successfully');
        return redirect()->route('personale.show', $emergency_contact->personale_id);
    }


    public function edit($id)
    {
        $emergency_contact = EmployeesEmergencyContact::findOrFail($id);
        $employee = Personale::where('id',  $emergency_contact->personale_id)->first();
        return view('hrm.personale.emergency_contact.edit')

            ->with('emergency_contact', $emergency_contact)
            ->with('employee', $employee);
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        $emergency_contact = EmployeesEmergencyContact::findOrFail($id);
        $this->validate($request, [
            'personale_id' =>  'required',
            'name' =>  'required',
            'relationship' =>  'required',
            'mobile' =>  'required',
            'home_telephone' =>  'required',
            'work_telephone' =>  'required',
        ]);
        // $emergency_contact = EmployeesDependant::findOrFail($id);
        $emergency_contact->personale_id = $request->personale_id;
        $emergency_contact->name = $request->name;
        $emergency_contact->relationship = $request->relationship;
        $emergency_contact->mobile = $request->mobile;
        $emergency_contact->home_telephone = $request->home_telephone;
        $emergency_contact->work_telephone = $request->work_telephone;
        $emergency_contact->save();
        Session::flash('success', 'Emergency Contact updated successfully');
        return redirect()->route('personale.show', $emergency_contact->personale_id);
    }


    public function destroy($id)
    {
        $employees_dependant = EmployeesEmergencyContact::findOrFail($id);
        $employees_dependant->delete();
        Session::flash('success',  $employees_dependant->name . ' Deleted successfully');
        return redirect()->back();
    }
}
