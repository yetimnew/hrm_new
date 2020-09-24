<?php

namespace App\Http\Controllers\HRM;

use App\HRM\Department;
use App\HRM\EmployeesDependant;
use App\HRM\EmployeesEmergencyContact;
use App\Http\Controllers\Controller;
use App\HRM\Personale;
use App\HRM\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PersonalesController extends Controller
{

    public function index()
    {
        $personales = Personale::with(['department', 'position'])->orderBy('created_at', 'DESC')->get();
        return view('hrm.personale.index')->with('personales', $personales);
    }


    public function create()
    {
        $personale = new Personale;
        $departments = Department::orderBy('created_at', 'DESC')->get();
        $positions = Position::orderBy('created_at', 'DESC')->get();
        return view('hrm.personale.create')
            ->with('departments', $departments)
            ->with('positions', $positions)
            ->with('personale', $personale);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'driverid' =>  'required|unique:personales,driverid',
            'firstname' =>  'required|min:2',
            'fathername' =>  'required||min:2',
            'gfathername' =>  'required||min:2',
            'sex' => 'required',
            'birthdate' =>  'required|date',
            'hireddate' =>  'required|date',
            'driver' => 'required',
            'department_id' =>  'required',
            'position_id' =>  'required',
            'employment_status' =>  'required',
            'marital_status' =>  'required',
            'zone' =>  '',
            'woreda' =>  '',
            'city' =>  '',
            'sub_city' =>  '',
            'kebele' =>  '',
            'housenumber' =>  '',
            'mobile' =>  '',
            'home_telephone' =>  '',
            'work_telephone' =>  '',
            'email' =>  '',

        ]);

        $personale = new Personale;
        $personale->driverid = $request->driverid;
        $personale->firstname = $request->firstname;
        $personale->fathername = $request->fathername;
        $personale->gfathername = $request->gfathername;
        $personale->sex = $request->sex;
        $personale->birthdate = $request->birthdate;
        $personale->hireddate = $request->hireddate;
        $personale->driver = $request->driver;
        $personale->department_id = $request->department_id;
        $personale->position_id = $request->position_id;
        $personale->employment_status = $request->employment_status;
        $personale->marital_status = $request->marital_status;
        $personale->zone = $request->zone;
        $personale->woreda = $request->woreda;
        $personale->city = $request->city;
        $personale->sub_city = $request->sub_city;
        $personale->kebele = $request->kebele;
        $personale->housenumber = $request->housenumber;
        $personale->mobile = $request->mobile;
        $personale->home_telephone = $request->home_telephone;
        $personale->work_telephone = $request->work_telephone;
        $personale->email = $request->email;


        $personale->save();

        Session::flash('success', 'Employee registered successfully');
        return redirect()->route('personale.index');
    }

    public function show($id)
    {
        $personale = Personale::findOrFail($id);
        $departments = Department::all();
        $positions = Position::all();
        $emergency_dependant = EmployeesDependant::where('personale_id', $personale->id)->get();
        $emergency_contact = EmployeesEmergencyContact::where('personale_id', $personale->id)->get();
        // dd($emergency_dependant);

        return view('hrm.personale.show')
            ->with('departments', $departments)
            ->with('positions', $positions)
            ->with('emergency_dependant', $emergency_dependant)
            ->with('emergency_contact', $emergency_contact)
            ->with('personale', $personale);
    }

    public function edit($id)
    {
        $personale = Personale::findOrFail($id);
        $departments = Department::all();
        $positions = Position::all();
        return view('hrm.personale.edit')
            ->with('personale', $personale)
            ->with('departments', $departments)
            ->with('positions', $positions);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'driverid' =>  'required',
            'firstname' =>  'required|min:2',
            'fathername' =>  'required||min:2',
            'gfathername' =>  'required||min:2',
            'sex' => 'required',
            'birthdate' =>  'required|date',
            'hireddate' =>  'required|date',
            'driver' => 'required',
            'department_id' =>  'required',
            'position_id' =>  'required',
            'employment_status' =>  'required',
            'marital_status' =>  'required',
            'zone' =>  '',
            'woreda' =>  '',
            'city' =>  '',
            'sub_city' =>  '',
            'kebele' =>  '',
            'housenumber' =>  '',
            'mobile' =>  '',
            'home_telephone' =>  '',
            'work_telephone' =>  '',
            'email' =>  '',
        ]);


        $personale = Personale::findOrFail($id);
        $personale->driverid = $request->driverid;
        $personale->firstname = $request->firstname;
        $personale->fathername = $request->fathername;
        $personale->gfathername = $request->gfathername;
        $personale->sex = $request->sex;
        $personale->birthdate = $request->birthdate;
        $personale->hireddate = $request->hireddate;
        $personale->driver = $request->driver;
        $personale->department_id = $request->department_id;
        $personale->position_id = $request->position_id;
        $personale->employment_status = $request->employment_status;
        $personale->marital_status = $request->marital_status;
        $personale->zone = $request->zone;
        $personale->woreda = $request->woreda;
        $personale->city = $request->city;
        $personale->sub_city = $request->sub_city;
        $personale->kebele = $request->kebele;
        $personale->housenumber = $request->housenumber;
        $personale->mobile = $request->mobile;
        $personale->home_telephone = $request->home_telephone;
        $personale->work_telephone = $request->work_telephone;
        $personale->email = $request->email;

        $personale->save();
        Session::flash('success',  $personale->driverid . ' updated successfully');
        return redirect()->route('personale.show', $personale->id);
    }


    public function destroy($id)
    {
        $personale = Personale::findOrFail($id);
        $personale->delete();
        Session::flash('success',  $personale->driverid . ' Deleted successfully');
        return redirect()->route('personale.index');
    }
    public function deactivate($id)
    {
        // dd($id);
        $personale = Personale::findOrFail($id);
        return view('hrm.personale.deactivate')
            ->with('personale', $personale);
    }
    public function deactivate_store(Request $request, $id)
    {
        // dd($request->all());
        $personale = Personale::findOrFail($id);
        $personale->status = 0;
        $personale->comment = $request->comment;

        $personale->save();
        Session::flash('success',  $personale->driverid . ' Deactivated successfully');
        return redirect()->route('personale.show', $personale->id);
    }
    public function activate($id)
    {

        $personale = Personale::findOrFail($id);
        $personale->status = 1;

        $personale->save();
        Session::flash('success',  $personale->driverid . ' Activated successfully');
        return redirect()->route('personale.show', $personale->id);
    }
    public function contact_details()
    {
    }
}
