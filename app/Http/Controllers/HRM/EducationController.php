<?php

namespace App\Http\Controllers\HRM;

use App\HRM\Education;
use App\HRM\Personale;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
    }


    public function create($id)
    {
        $employee = Personale::where('id', $id)->first();
        $education = new Education;
        return view('hrm.personale.education.create')
            ->with('education', $education)
            ->with('employee', $employee);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data =  $this->validate($request, [
            'personale_id' =>  'required',
            'name' =>  'required',
            'institute' =>  'required',
            'minor' =>  'required',
            'score' =>  'required',
            'award' =>  'required',
            'start_date' =>  'required',
            'end_date' =>  'required',
            'comment' =>  '',
        ]);

        // $experiance = WorkExperiance::create($data);
        $education = new Education;
        $education->personale_id = $request->personale_id;
        $education->name = $request->name;
        $education->institute = $request->institute;
        $education->minor = $request->minor;
        $education->score = $request->score;
        $education->award = $request->award;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->end_date = $request->end_date;
        $education->save();


        Session::flash('success',  ' education registered successfully');
        return redirect()->route('personale.show', $education->personale_id);
        // return redirect()->route('education.index');
    }



    public function edit($id)
    {
        $education = Education::findOrFail($id);
        $employee = Personale::where('id',  $education->personale_id)->first();

        return view('hrm.personale.education.edit')

            ->with('employee', $employee)
            ->with('education', $education);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'personale_id' =>  'required',
            'name' =>  'required',
            'institute' =>  'required',
            'minor' =>  'required',
            'score' =>  'required',
            'award' =>  'required',
            'start_date' =>  'required',
            'end_date' =>  'required',
            'comment' =>  '',

        ]);

        $education = Education::findOrFail($id);
        $education->personale_id = $request->personale_id;
        $education->name = $request->name;
        $education->institute = $request->institute;
        $education->minor = $request->minor;
        $education->score = $request->score;
        $education->award = $request->award;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->end_date = $request->end_date;

        $education->save();
        Session::flash('success',  $education->name . ' updated successfully');
        return redirect()->route('personale.show', $education->personale_id);
    }


    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();
        Session::flash('success',   ' educations Deleted successfully');
        return redirect()->back();
        // return response()->json(['success' => 'experiance deleted successfully']);
    }
}
