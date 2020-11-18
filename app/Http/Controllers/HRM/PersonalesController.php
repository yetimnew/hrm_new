<?php

namespace App\Http\Controllers\HRM;

use Image;
use App\HRM\PayGrade;
use App\HRM\Position;
use App\HRM\Education;
use App\HRM\Personale;
use App\HRM\Department;
use App\HRM\PayGradeLevel;
use App\HRM\WorkExperiance;
use Illuminate\Http\Request;
use App\HRM\EmployeesDependant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\HRM\EmployeesEmergencyContact;
use App\HRM\EmployeesPromotion;
use App\HRM\JobTitle;
use Illuminate\Support\Facades\Session;
use Andegna\Constants;
use Andegna\DateTimeFactory as fact;
use Andegna\DateTime as eth;
use Andegna\Converter\FromJdnConverter;
use Andegna\DateTime;
use App\EthDate;
use App\EthMonth;
use App\EthYear;
use Exception;
use Symfony\Component\VarDumper\Cloner\Data;

class PersonalesController extends Controller
{

    public function index()
    {
        $personales = Personale::with(['department', 'jobtitle'])->orderBy('created_at', 'DESC')->get();
        return view('hrm.personale.index')->with('personales', $personales);
    }


    public function create()
    {
        $personale = new Personale;
        $personale->birthdate = '0000-00-00';
        $personale->hireddate = '0000-00-00';
        $departments = Department::orderBy('created_at', 'DESC')->get();
        $positions = JobTitle::all();
        $pay_grades = PayGrade::orderBy('created_at', 'DESC')->get();
        $pay_grade_levels = PayGradeLevel::orderBy('created_at', 'DESC')->get();
        $eth_year = EthYear::all();
        $eth_month = EthMonth::all();
        $eth_date = EthDate::all();

        return view('hrm.personale.create')
            ->with('departments', $departments)
            ->with('positions', $positions)
            ->with('pay_grades', $pay_grades)
            ->with('pay_grade_levels', $pay_grade_levels)
            ->with('personale', $personale)
            ->with('eth_year', $eth_year)
            ->with('eth_month', $eth_month)
            ->with('eth_date', $eth_date);
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
            'dddate' => 'required|min:1|max:30',
            'ddmonth' =>  'required|min:1|max:12',
            'ddyear' => 'required|numeric',
            'hdate' =>  'required|min:1|max:30',
            'hmonth' => 'required|min:1|max:12',
            'hyear' =>  'required|numeric',
            'driver' => 'required',
            'pay_grade_id' => 'required',
            'pay_grade_level_id' => 'required',
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {
            $ethio_birthdate = \Andegna\DateTimeFactory::of($request->ddyear,   $request->ddmonth, $request->dddate);
            $ethio_hiredate = \Andegna\DateTimeFactory::of($request->hyear,   $request->hmonth, $request->hdate);
          } catch (Exception $e) {
                  Session::flash('error', 'Invalid date forma of birth date or hire date');
                  return redirect()->back();
          }

        $ethio_ddate =  $ethio_birthdate->getYear() .'-'. $ethio_birthdate->getMonth() .'-'. $ethio_birthdate->getDay() ;
        $ethio_hdate =  $ethio_hiredate->getYear() .'-'. $ethio_hiredate->getMonth() .'-'. $ethio_hiredate->getDay() ;


        $personale = new Personale();
        $personale->driverid = $request->driverid;
        $personale->firstname = $request->firstname;
        $personale->fathername = $request->fathername;
        $personale->gfathername = $request->gfathername;
        $personale->sex = $request->sex;
        $personale->birthdate =$ethio_ddate;
        $personale->hireddate =$ethio_hdate;
        $personale->driver = $request->driver;
        $personale->pay_grade_id = $request->pay_grade_id;
        $personale->pay_grade_level_id = $request->pay_grade_level_id;
        $personale->department_id = $request->department_id;
        $personale->jobtitle_id = $request->position_id;
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
        if ($request->hasFile('image')) {
            $image       = $request->file('image');
            $filename    = time() . $image->getClientOriginalName();
            //Fullsize
            $image->move(public_path() . '/images/user_image/', $filename);
            $image_resize = Image::make(public_path() . '/images/user_image/' . $filename);
            $image_resize->fit(300, 300);
            $image_resize->save(public_path('images/thumbnail/' . $filename));
            $personale->image =  $filename;
        }
        $personale->save();
        Session::flash('success', 'Employee registered successfully');
        return redirect()->route('personale.index');
    }

    public function show($id)
    {
        $personale = Personale::with(['pay_grade', 'department'])->findOrFail($id);
        // dd( $personale);
        $departments = Department::all();
        $positions = JobTitle::all();
        $emergency_dependant = EmployeesDependant::where('personale_id', $personale->id)->get();
        $emergency_contact = EmployeesEmergencyContact::where('personale_id', $personale->id)->get();
        $experiences = WorkExperiance::where('personale_id', $personale->id)->get();
        $educations = Education::where('personale_id', $personale->id)->get();
        $promotion = EmployeesPromotion::where('personale_id',$id)->get();



        return view('hrm.personale.show')
            ->with('departments', $departments)
            ->with('positions', $positions)
            ->with('emergency_dependant', $emergency_dependant)
            ->with('emergency_contact', $emergency_contact)
            ->with('experiences', $experiences)
            ->with('educations', $educations)
            ->with('personale', $personale)
            ->with('promotion', $promotion);
    }

    public function edit($id)
    {
        $personale = Personale::findOrFail($id);
        $personale = Personale::findOrFail($id);
        $eth_year = EthYear::all();
        $eth_month = EthMonth::all();
        $eth_date = EthDate::all();

        $departments = Department::all();
        $positions = JobTitle::all();
        $pay_grades = PayGrade::orderBy('created_at', 'DESC')->get();
        $pay_grade_levels = PayGradeLevel::orderBy('created_at', 'DESC')->get();

        return view('hrm.personale.edit')
            ->with('personale', $personale)
            ->with('departments', $departments)
            ->with('positions', $positions)
            ->with('pay_grades', $pay_grades)
            ->with('pay_grade_levels', $pay_grade_levels)
            ->with('eth_year', $eth_year)
            ->with('eth_month', $eth_month)
            ->with('eth_date', $eth_date);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'driverid' =>  'required',
            'firstname' =>  'required|min:2',
            'fathername' =>  'required||min:2',
            'gfathername' =>  'required||min:2',
            'sex' => 'required',
            'dddate' => 'required|min:1|max:30',
            'ddmonth' =>  'required|min:1|max:12',
            'ddyear' => 'required|numeric',
            'hdate' =>  'required|min:1|max:30',
            'hmonth' => 'required|min:1|max:12',
            'hyear' =>  'required|numeric',
            'driver' => 'required',
            'pay_grade_id' => 'required',
            'pay_grade_level_id' => 'required',
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        try {
            $ethio_birthdate = \Andegna\DateTimeFactory::of($request->ddyear,   $request->ddmonth, $request->dddate);
            $ethio_hiredate = \Andegna\DateTimeFactory::of($request->hyear,   $request->hmonth, $request->hdate);
          } catch (Exception $e) {
                  Session::flash('error', 'Invalid date forma of birth date');
                  return redirect()->back();
          }

        $ethio_ddate =  $ethio_birthdate->getYear() .'-'. $ethio_birthdate->getMonth() .'-'. $ethio_birthdate->getDay() ;
        $ethio_hdate =  $ethio_hiredate->getYear() .'-'. $ethio_hiredate->getMonth() .'-'. $ethio_hiredate->getDay() ;

        $personale = Personale::findOrFail($id);
        $personale->driverid = $request->driverid;
        $personale->firstname = $request->firstname;
        $personale->fathername = $request->fathername;
        $personale->gfathername = $request->gfathername;
        $personale->sex = $request->sex;
        $personale->birthdate =$ethio_ddate;
        $personale->hireddate =$ethio_hdate;
        $personale->driver = $request->driver;
        $personale->pay_grade_id = $request->pay_grade_id;
        $personale->pay_grade_level_id = $request->pay_grade_level_id;
        $personale->department_id = $request->department_id;
        $personale->jobtitle_id = $request->position_id;
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
        if ($request->hasFile('image')) {
            $image       = $request->file('image');
            $filename    = time() . $image->getClientOriginalName();
            //Fullsize
            $image->move(public_path() . '/images/user_image/', $filename);
            $image_resize = Image::make(public_path() . '/images/user_image/' . $filename);
            $image_resize->fit(300, 300);
            $image_resize->save(public_path('images/thumbnail/' . $filename));
            $personale->image =  $filename;
        }
        $personale->save();
        Session::flash('success',  $personale->driverid . ' updated successfully');
        return redirect()->route('personale.show', $personale->id);
    }


    public function destroy($id)
    {
        $personale = Personale::findOrFail($id);
       $employee_dependents=  EmployeesDependant::where('personale_id', $personale->id)->count();
    //    dd(  $employee_dependents);
       if( $employee_dependents ){
        Session::flash('error',  $personale->driverid . ' Not Deleted!  First Delete all dependents');
        return redirect()->route('personale.show', $personale->id);
       }
      $emergency_contact=  EmployeesEmergencyContact::where('personale_id', $personale->id)->count();
      if( $emergency_contact ){
        Session::flash('error',  $personale->driverid . ' Not Deleted!  First Delete all Emergency Contact');
        return redirect()->route('personale.show', $personale->id);
       }
       $experiances =  WorkExperiance::where('personale_id', $personale->id)->count();
       if( $experiances ){
        Session::flash('error',  $personale->driverid . ' Not Deleted!  First Delete all Experiances');
        return redirect()->route('personale.show', $personale->id);
       }
       $education =  Education::where('personale_id', $personale->id)->count();
       if( $education ){
        Session::flash('error',  $personale->driverid . ' Not Deleted!  First Delete all Educations');
        return redirect()->route('personale.show', $personale->id);
       }
       $promotion =  EmployeesPromotion::where('personale_id', $personale->id)->count();
       if( $promotion ){
        Session::flash('error',  $personale->driverid . ' Not Deleted!  First Delete all Promotion');
        return redirect()->route('personale.show', $personale->id);
       }

        $personale->delete();
        if ($personale->image) {
            unlink(public_path() .  '/images/user_image/' . $personale->image);
            unlink(public_path() .  '/images/thumbnail/' . $personale->image);
        }

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
    public function pay_grade_level(Request $request)
    {
        if ($request->ajax()) {
            $personale = new Personale;
            // dd($request->all());
            $pay_grade_id = $request->pay_grade_id;

            $pay_grade_levels = DB::table('pay_grade_levels')->where('pay_grade_id', $pay_grade_id)->orderBy('name')->get();
            // dd($pay_grade_levels);
            return view('hrm.personale.pay_grade_level')
                ->with('personale', $personale)
                ->with('pay_grade_levels', $pay_grade_levels);
        }
    }
}
