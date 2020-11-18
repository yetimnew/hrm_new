<?php

namespace App\Http\Controllers\HRM;

use App\HRM\Department;
use App\HRM\PayGrade;
use App\HRM\PayGradeLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class PayGradeLevelController extends Controller
{
    public function index()
    {
        $pay_grades_levels = PayGradeLevel::with('pay_grade')->orderBy('created_at', 'DESC')->get();

        return view('hrm.pay_grade_level.index')->with('pay_grades_levels', $pay_grades_levels);
    }

    public function create()
    {
        $pay_grade_level = new PayGradeLevel;
        $pay_grades = PayGrade::all();
        return view('hrm.pay_grade_level.create')
            ->with('pay_grades', $pay_grades)
            ->with('pay_grade_level', $pay_grade_level);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        // $pay_grade_id =  $request->pay_grade_id;
        $data =  $this->validate($request, [
            'name' => [
                'required',
                'max:255',
            ],
            'pay_grade_id' =>  'required',
            'salary' =>  'required',
            'comment' =>  ''

        ]);

        // $pay_grade_level = pay_grade_level::create($data);
        $pay_grade_level = new PayGradeLevel;
        $pay_grade_level->name = $request->name;
        $pay_grade_level->pay_grade_id = $request->pay_grade_id;
        $pay_grade_level->salary = $request->salary;
        $pay_grade_level->comment = $request->comment;

        $pay_grade_level->save();
        Session::flash('success',  $pay_grade_level->name .  ' registered successfully');
        return redirect()->route('pay_grade_level.index');
    }

    public function edit($id)
    {

        $pay_grade_level = PayGradeLevel::findOrFail($id);
        $pay_grades = PayGrade::all();
        return view('hrm.pay_grade_level.edit')
            ->with('pay_grades', $pay_grades)
            ->with('pay_grade_level', $pay_grade_level);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' =>  'required',
            'pay_grade_id' =>  'required',
            'salary' =>  'required',
            'comment' =>  '',
        ]);

        $pay_grade_level = PayGradeLevel::findOrFail($id);
        $pay_grade_level->name = $request->name;
        $pay_grade_level->pay_grade_id = $request->pay_grade_id;
        $pay_grade_level->salary = $request->salary;
        $pay_grade_level->comment = $request->comment;

        $pay_grade_level->save();
        Session::flash('success',  $pay_grade_level->name . ' updated successfully');
        return redirect()->route('pay_grade_level.index');
    }
    public function destroy($id)
    {
        $pay_grade_level = PayGradeLevel::findOrFail($id);
        $pay_grade_level->delete();
        return response()->json(['success' => 'pay_grade_level deleted successfully']);
    }
}
