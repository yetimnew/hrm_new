<?php

namespace App\Http\Controllers\HRM;

use App\HRM\Department;
use App\HRM\PayGrade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PayGradeController extends Controller
{
    public function index()
    {
        $pay_grades = PayGrade::orderBy('created_at', 'DESC')->get();
        return view('hrm.pay_grade.index')->with('pay_grades', $pay_grades);
    }

    public function create()
    {
        $pay_grade = new PayGrade;
        return view('hrm.pay_grade.create')
            ->with('pay_grade', $pay_grade);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data =  $this->validate($request, [
            'name' =>  'required|unique:pay_grades,name',
            'comment' =>  '',

        ]);

        // $pay_grade = pay_grade::create($data);
        $pay_grade = new PayGrade;
        $pay_grade->name = $request->name;
        $pay_grade->comment = $request->comment;

        $pay_grade->save();
        Session::flash('success',  $pay_grade->name .  ' registered successfully');
        return redirect()->route('pay_grade.index');
    }

    public function edit($id)
    {

        $pay_grade = PayGrade::findOrFail($id);
        return view('hrm.pay_grade.edit')
            ->with('pay_grade', $pay_grade);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' =>  'required|unique:pay_grades,name',
            'comment' =>  '',
        ]);

        $pay_grade = PayGrade::findOrFail($id);
        $pay_grade->name = $request->name;
        $pay_grade->comment = $request->comment;

        $pay_grade->save();
        Session::flash('success',  $pay_grade->name . ' updated successfully');
        return redirect()->route('pay_grade.index');
    }
    public function destroy($id)
    {
        $pay_grade = PayGrade::findOrFail($id);
        $pay_grade->delete();
        return response()->json(['success' => 'pay_grade deleted successfully']);
    }
}
