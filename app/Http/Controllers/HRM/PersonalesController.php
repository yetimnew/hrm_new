<?php

namespace App\Http\Controllers\HRM;

use App\HRM\Department;
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

            'did' =>  'required|unique:personales,driverid',
            'firstname' =>  'required|min:2',
            'fathername' =>  'required||min:2',
            'gfathername' =>  'required||min:2',
            'sex' => 'required',
            'driver' => 'required',
            'bdate' =>  'required|date',
            'zone' =>  'required',
            'woreda' =>  'required',
            'kebele' =>  'required',
            'hn' =>  'required',
            'mob' =>  'required',
            'hd' =>  'required|date',
            'department' =>  'required',
            'job' =>  'required',

        ]);

        $personale = new Personale;
        $personale->driverid = $request->did;
        $personale->firstname = $request->firstname;
        $personale->fathername = $request->fathername;
        $personale->gfathername = $request->gfathername;
        $personale->sex = $request->sex;
        $personale->birthdate = $request->bdate;
        $personale->zone = $request->zone;
        $personale->woreda = $request->woreda;
        $personale->kebele = $request->kebele;
        $personale->housenumber = $request->hn;
        $personale->mobile = $request->mob;
        $personale->hireddate = $request->hd;
        $personale->driver = $request->driver;
        $personale->department_id = $request->department;
        $personale->position_id = $request->job;
        $personale->save();

        Session::flash('success',  $personale->driverid .  ' registerd successfuly');
        return redirect()->route('personale.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personale = Personale::findOrFail($id);
        return view('hrm.personale.show')
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
            'did' =>  'required',
            'firstname' =>  'required',
            'fathername' =>  'required',
            'gfathername' =>  'required',
            'sex' => 'required',
            'driver' => 'required',
            'bdate' =>  'required',
            'zone' =>  'required',
            'woreda' =>  'required',
            'kebele' =>  'required',
            'hn' =>  'required',
            'mob' =>  'required',
            'hd' =>  'required',
            'department' =>  'required',
            'job' =>  'required',
        ]);

        $personale = Personale::findOrFail($id);
        $personale->driverid = $request->did;
        $personale->firstname = $request->firstname;
        $personale->fathername = $request->fathername;
        $personale->gfathername = $request->gfathername;
        $personale->sex = $request->sex;
        $personale->birthdate = $request->bdate;
        $personale->zone = $request->zone;
        $personale->woreda = $request->woreda;
        $personale->kebele = $request->kebele;
        $personale->housenumber = $request->hn;
        $personale->mobile = $request->mob;
        $personale->hireddate = $request->hd;
        $personale->driver = $request->driver;
        $personale->department_id = $request->department;
        $personale->position_id = $request->job;

        $personale->save();
        Session::flash('success',  $personale->driverid . ' updated successfuly');
        return redirect()->route('personale.index');
    }


    public function destroy($id)
    {
        $personale = Personale::findOrFail($id);
        $personale->delete();
        Session::flash('success',  $personale->driverid . ' Deleted successfuly');
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
        Session::flash('success',  $personale->driverid . ' Deactivated successfuly');
        return redirect()->route('personale.index');
    }
    public function activate($id)
    {

        $personale = Personale::findOrFail($id);
        $personale->status = 1;

        $personale->save();
        Session::flash('success',  $personale->driverid . ' Activated successfuly');
        return redirect()->route('personale.index');
    }
}
