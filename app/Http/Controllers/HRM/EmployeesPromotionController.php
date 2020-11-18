<?php

namespace App\Http\Controllers\HRM;

use Andegna\Constants;
use Andegna\DateTime as eth;
// use Andegna\DateTime;
use App\HRM\Department;
use App\HRM\EmployeesPromotion;
use App\HRM\JobTitle;
use App\HRM\PayGrade;
use App\HRM\PayGradeLevel;
use App\HRM\Personale;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Andegna\DateTime;
use DateTime;

class EmployeesPromotionController extends Controller
{
    public function index()
    {
        $promotions = EmployeesPromotion::orderBy('created_at', 'DESC')->get();
        // dd(  $promotions);
        return view('hrm.promotion.index')->with('promotions', $promotions);
    }


    public function create()
    {
        $promotion = new EmployeesPromotion;
        $employees = Personale::active()->orderBy('firstname')->get();
        $departments = Department::orderBy('name')->get();
        $job_titles = JobTitle::orderBy('name')->get();
        $pay_grades = PayGrade::orderBy('name')->get();
        $pay_grade_levels = PayGradeLevel::orderBy('name')->get();
        // $positions = Position::orderBy('created_at', 'DESC')->get();
        return view('hrm.promotion.create')
            ->with('employees', $employees)
            ->with('departments', $departments)
            ->with('job_titles', $job_titles)
            ->with('pay_grades', $pay_grades)
            ->with('pay_grade_levels', $pay_grade_levels)
            ->with('promotion', $promotion);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
           'personale_id' =>  'required',
            'department_id' =>  'required',
            'jobtitle_id' =>  'required',
            'pay_grade_id' =>  'required',
            'pay_grade_level_id' =>  'required',
            'start_date' =>  'required|date',
            'comment' =>  '',

        ]);

        // $gregorian = new eth( new DateTime($request->start_date));
        // dd(  $gregorian);
        // $ethiopic = Andegna\DateTimeFactory::fromDateTime($gregorian);
        // $gregorian = new DateTime($request->start_date);
        // dd( $gregorian);

        // just pass it to Andegna\DateTime constractor and you will get $ethiopian date
        // $ethipic = new eth($gregorian);
        // dd($ethipic->format(\Andegna\Constants::DATE_ETHIOPIAN));
        // dd($ethipic->format(DATE_COOKIE));
        // $neweth = $ethipic->format(Constants::DATE_ETHIOPIAN);
        // dd($neweth);
        // $neweth = $ethipic->toGregorian()->format(DATE_COOKIE);
        // dd(date('d/m/Y',strtotime($neweth)));
        // $neweth);

       $emp = Personale::where('id',$request->personale_id)->first();

       $id =  $emp->id;
       $department_id =  $emp->department_id;
       $jobtitle_id =  $emp->jobtitle_id;
       $pay_grade_id =  $emp->pay_grade_id;
       $pay_grade_level_id =  $emp->pay_grade_level_id;


       $promotion_old = new EmployeesPromotion;
       $promotion_old->personale_id =   $id;
       $promotion_old->department_id =   $department_id;
       $promotion_old->jobtitle_id = $jobtitle_id;
       $promotion_old->pay_grade_id = $pay_grade_id;
       $promotion_old->pay_grade_level_id =  $pay_grade_level_id;
       $promotion_old->start_date = $request->start_date;
       $promotion_old->comment = $request->comment;
       $promotion_old->save();

       $promotion = new EmployeesPromotion;

        $promotion->personale_id = $request->personale_id;
        $promotion->department_id = $request->department_id;
        $promotion->jobtitle_id = $request->jobtitle_id;
        $promotion->pay_grade_id = $request->pay_grade_id;
        $promotion->pay_grade_level_id = $request->pay_grade_level_id;
        $promotion->start_date = $request->start_date;
        $promotion->comment = $request->comment;
       $promotion->status = 1;

        $promotion->save();

        // $personale = Personale::findOrFail($id);
        // dd();
      $emp->department_id = $request->department_id;
      $emp->jobtitle_id = $request->jobtitle_id;
      $emp->pay_grade_id = $request->pay_grade_id;
      $emp->pay_grade_level_id = $request->pay_grade_level_id;
      $emp->save();

        Session::flash('success',  'Registered successfully');
        return redirect()->route('promotion.index');
    }

    public function edit($id)
    {
        $promotion = EmployeesPromotion::findOrFail($id);
        $employees = Personale::active()->orderBy('firstname')->get();
        $departments = Department::orderBy('name')->get();
        $job_titles = JobTitle::orderBy('name')->get();
        $pay_grades = PayGrade::orderBy('name')->get();
        $pay_grade_levels = PayGradeLevel::orderBy('name')->get();

        return view('hrm.promotion.edit')
        ->with('employees', $employees)
        ->with('departments', $departments)
        ->with('job_titles', $job_titles)
        ->with('pay_grades', $pay_grades)
        ->with('pay_grade_levels', $pay_grade_levels)
        ->with('promotion', $promotion);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'personale_id' =>  'required',
            'department_id' =>  'required',
            'jobtitle_id' =>  'required',
            'pay_grade_id' =>  'required',
            'pay_grade_level_id' =>  'required',
            'start_date' =>  'required|date',
            'comment' =>  '',

        ]);

        $promotion = EmployeesPromotion::findOrFail($id);
        $promotion->personale_id = $request->personale_id;
        $promotion->department_id = $request->department_id;
        $promotion->jobtitle_id = $request->jobtitle_id;
        $promotion->pay_grade_id = $request->pay_grade_id;
        $promotion->pay_grade_level_id = $request->pay_grade_level_id;
        $promotion->start_date = $request->start_date;
        $promotion->comment = $request->comment;

        $promotion->save();
        Session::flash('success',  $promotion->name . ' updated successfully');
        return redirect()->route('promotion.index');
    }


    public function destroy($id)
    {
        $promotion = EmployeesPromotion::findOrFail($id);
        $promotion->delete();
        return response()->json(['success' => 'promotion deleted successfully']);
    }
}
