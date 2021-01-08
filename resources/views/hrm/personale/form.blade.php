<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group 	required">
            <label class="control-label"> ID Number</label>
            <div class="input-group-sm">
                <input name="driverid" type="text" id="driverid"
                    class="form-control  {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                    value="{{old('driverid') ?? $personale->driverid}}" onfocusout="validatedriverid()">
                @if ($errors->has('driverid'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('driverid') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label">First Name</label>

            <div class="input-group-sm">
                <input name="firstname" type="text" id="firstname"
                    class="form-control select {{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                    value="{{old('firstname') ?? $personale->firstname}}" onfocusout="validatefirstname()">
                @if ($errors->has('firstname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="control-label" for="fathername">Father Name</label>

            <div class="input-group-sm">
                <input name="fathername" type="text" id="fathername"
                    class="form-control select {{ $errors->has('fathername') ? ' is-invalid' : '' }}"
                    value="{{old('fathername') ?? $personale->fathername}}" onfocusout="validatefathername()">
                @if ($errors->has('fathername'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fathername') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="control-label" for="gfathername">Grand Father Name</label>
            <div class="input-group-sm">
                <input name="gfathername" type="text" id="gfathername"
                    class="form-control select {{ $errors->has('gfathername') ? ' is-invalid' : '' }}"
                    value="{{old('gfathername') ?? $personale->gfathername}}" onfocusout="validategfathername()">
                @if ($errors->has('gfathername'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('gfathername') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>


        <div class="form-group required mb-4">
            <label class="control-label" for="sex">Sex</label>
            <select name="sex" id="sex" required
                class="form-control form-control-sm {{ $errors->has('sex') ? ' is-invalid' : '' }}"
                onfocusout="validatedepartment()">
                @if ($personale->sex == 1)
                <option class="dropup" value="0" selected>Male </option>
                <option class="dropup" value="1">Fmale</option>
                @else
                <option class="dropup" value="1" selected>Fmale</option>
                <option class="dropup" value="0">Male</option>
                @endif

            </select>
            @if ($errors->has('sex'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('sex') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>
        <h4>Birth Date</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group required ">
                    <label class="control-label">Date</label>
                    <select name="dddate" class="form-control {{ $errors->has('dddate') ? ' is-invalid' : '' }} select" id="dddate"
                        onfocusout="validatedddate()">
                        <option class="dropup" value=""> Select One</option>
                        @foreach ($eth_date as $ey)
                            <option class="dropup" value="{{$ey->number}}"   {{$ey->number == $personale->EthDate ? 'selected' : '' }}>
                                {{$ey->number}}
                            </option>
                        @endforeach
                  </select>
                    @if ($errors->has('dddate'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('dddate') }}</strong>
                    </span>
                    @endif

                    <span class="invalid-feedback" role="alert"></span>
                </div>
            </div>
            <div class="col-md-4">
            <div class="form-group required ">
                <label class="control-label" for="ddmonth">Month</label>
                <select name="ddmonth" class="form-control {{ $errors->has('ddmonth') ? ' is-invalid' : '' }} select" id="ddmonth"
                    onfocusout="validateddmonth()">
                    <option class="dropup" value=""> Select One</option>
                    @foreach ($eth_month as $em)
                    <option class="dropup" value="{{$em->id}}"   {{$em->number == $personale->EthMonth ? 'selected' : '' }}>
                        {{$em->name}}
                    </option>
                    @endforeach

                </select>
                @if ($errors->has('ddmonth'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ddmonth') }}</strong>
                </span>
                @endif

                <span class="invalid-feedback" role="alert"></span>
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group required ">
            <label class="control-label" for="ddyear">Year</label>
            <div class="input-group">
                <select name="ddyear" class="form-control {{ $errors->has('ddyear') ? ' is-invalid' : '' }} select" id="ddyear"
                    onfocusout="validatedddate()">
                <option class="dropup" value=""> Select One</option>
                @foreach ($eth_year as $eyear)
                    <option class="dropup" value="{{$eyear->number}}"   {{$eyear->number == $personale->EthYear ? 'selected' : '' }}>
                        {{$eyear->number}}
                    </option>
                @endforeach
            </select>
                   @if($errors->has('ddyear'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ddyear') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        </div>
    </div>
    <h4>Hired Date</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group required ">
                <label class="control-label" for="hdate">Date</label>
                <select name="hdate" class="form-control {{ $errors->has('hdate') ? ' is-invalid' : '' }} select" id="hdate"
                    onfocusout="validatehdate()">
                    <option class="dropup" value=""> Select One</option>
                    @foreach ($eth_date as $ey)
                    <option class="dropup" value="{{$ey->number}}"   {{$ey->number == $personale->EthHDate ? 'selected' : '' }}>
                        {{$ey->number}}
                    </option>
                @endforeach
                </select>
                @if ($errors->has('hdate'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('hdate') }}</strong>
                </span>
                @endif

                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="col-md-4">
        <div class="form-group required ">
            <label class="control-label" for="hmonth">Month</label>
            <select name="hmonth" class="form-control {{ $errors->has('hmonth') ? ' is-invalid' : '' }} select" id="hmonth"
                onfocusout="validatehmonth()">
                @foreach ($eth_month as $em)
                <option class="dropup" value="{{$em->id}}"   {{$em->number == $personale->EthHMonth ? 'selected' : '' }}>
                    {{$em->name}}
                </option>
                @endforeach

            </select>
            @if ($errors->has('hmonth'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('hmonth') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group required ">
        <label class="control-label" for="hyear">Year</label>
        <div class="input-group">

            <select name="hyear" class="form-control {{ $errors->has('hyear') ? ' is-invalid' : '' }} select" id="hyear"
                onfocusout="validatehdate()">
                <option class="dropup" value=""> Select One</option>
                @foreach ($eth_year as $eyear)
                <option class="dropup" value="{{$eyear->number}}"   {{$eyear->number == $personale->EthHYear ? 'selected' : '' }}>
                    {{$eyear->number}}
                </option>
            @endforeach
            </select>
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('hyear') }}</strong>
            </span>
            <span class="invalid-feedback" role="alert"></span>
        </div>

    </div>
    </div>
</div>

        <div class="form-group required">
            <label class="control-label" for="driver">Driver</label>

            <select name="driver" class="form-control form-control-sm" id="driver" required>
                @if ($personale->driver == 1)
                <option class="dropup" value="1" selected>Yes </option>
                <option class="dropup" value="0">No</option>
                @endif
                @if ($personale->driver == 0)
                <option class="dropup" value="0" selected>No </option>
                <option class="dropup" value="1">Yes</option>
                @endif

            </select>
        </div>
        <div class="form-group  required">
            <label class="control-label" for="pay_grade_id">Pay Grade</label>
            <div class="input-group-sm">
                <select name="pay_grade_id" id="pay_grade_id"
                    class="form-control {{ $errors->has('pay_grade_id') ? ' is-invalid' : '' }}"
                    onfocusout="validatepay_grade_id()">

                    <option class="dropup" value="" selected disabled> Select One</option>
                    @foreach ($pay_grades as $pay_grade)
                    <option class="dropup" value="{{$pay_grade->id}}"
                        {{ $pay_grade->id == $personale->pay_grade_id ? 'selected' : '' }}>
                        {{$pay_grade->name}}
                    </option>
                    @endforeach

                </select>
                @if ($errors->has('pay_grade_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('pay_grade_id') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div id="append_pay_grade_level">
            @include('hrm.personale.pay_grade_level')
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group required">
                <label class="control-label" for="penssionid">Penssion Number</label>
                <div class="input-group-sm">
                    <input name="penssionid" type="text" id="penssionid"
                        class="form-control select {{ $errors->has('penssionid') ? ' is-invalid' : '' }}"
                        value="{{old('penssionid') ?? $personale->penssionid}}" onfocusout="validatepenssionid()">
                    @if ($errors->has('penssionid'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('penssionid') }}</strong>
                    </span>
                    @endif
                    <span class="invalid-feedback" role="alert"></span>
                </div>
            </div>
            <div class="form-group required">
                <label class="control-label" for="tin_no">TIN Number</label>
                <div class="input-group-sm">
                    <input name="tin_no" type="number" id="tin_no"
                        class="form-control select {{ $errors->has('tin_no') ? ' is-invalid' : '' }}"
                        value="{{old('tin_no') ?? $personale->tin_no}}" onfocusout="validatetin_no()">
                    @if ($errors->has('tin_no'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tin_no') }}</strong>
                    </span>
                    @endif
                    <span class="invalid-feedback" role="alert"></span>
                </div>
            </div>


            <div class="form-group  required">
                <label class="control-label" for="department_id">Department Name</label>
                <div class="input-group-sm">
                    <select name="department_id" id="department_id"
                        class="form-control {{ $errors->has('department_id') ? ' is-invalid' : '' }}"
                        onfocusout="validatedepartment_id()">

                        <option class="dropup" value="" selected disabled> Select One</option>
                        @foreach ($departments as $department)
                        <option class="dropup" value="{{$department->id}}"
                            {{ $department->id == $personale->department_id ? 'selected' : '' }}>
                            {{$department->name}}
                        </option>
                        @endforeach

                    </select>
                    @if ($errors->has('department_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('department') }}</strong>
                    </span>
                    @endif
                    <span class="invalid-feedback" role="alert"></span>
                </div>
            </div>

            <div class="form-group  required">
                <label class="control-label" for="position_id">position_id Title</label>
                <div class="input-group-sm">
                    <select name="position_id" id="position_id"
                        class="form-control {{ $errors->has('position_id') ? ' is-invalid' : '' }}"
                        onfocusout="validateposition_id()">
                        <option class="dropup" value="" selected disabled> Select One</option>

                        @foreach ($positions as $posistion)
                        <option class="dropup" value="{{$posistion->id}}"
                            {{ $posistion->id == $personale->jobtitle_id ? 'selected' : '' }}>
                            {{$posistion->name}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('position_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('position_id') }}</strong>
                    </span>
                    @endif
                    <span class="invalid-feedback" role="alert"></span>
                </div>
            </div>

            <div class="form-group required">
                <label class="control-label m-2" for="employment_status">employment_status</label> <br>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="permanenet" name="employment_status" class="custom-control-input" value="1"
                        {{ ($personale->employment_status =="1" ) ? "checked" : "" }}>
                    <label class="custom-control-label" for="permanenet">Permanenet</label>
                </div>
                <div class=" custom-control custom-radio custom-control-inline">
                    <input type="radio" id="contract" name="employment_status" class="custom-control-input" value="0"
                        {{ ($personale->employment_status =="0" ) ? "checked" : "" }}>
                    <label class="custom-control-label" for="contract" onclick="myFunction()">Contract</label>
                </div>

                @if ($errors->has('employment_status'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('employment_status') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
            <div class="form-group" id="employment_status_div" style="display: none">
                <label for=""></label>
                <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group required">
                <label class="control-label" for="marital_status">marital_status</label>

                <select name="marital_status" id="marital_status" required
                    class="form-control form-control-sm {{ $errors->has('marital_status') ? ' is-invalid' : '' }}"
                    onfocusout="validatedepartment()">

                    @if ($personale->marital_status == 1)
                    <option class="dropup" value="1" selected>Single</option>
                    <option class="dropup" value="0">Maried</option>
                    @else
                    <option class="dropup" value="0" selected>Maried</option>
                    <option class="dropup" value="1">Single</option>
                    @endif
                </select>

                @if ($errors->has('marital_status'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('marital_status') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
            <div class="form-group required">
                <label class="control-label" for="image">Image</label>
                @if($personale->image)
                <img id="original" src="{{ url('/images/thumbnail/'.$personale->image) }}" height="70" width="70">
                @endif
                <div class="input-group input-group-sm">

                    <input name="image" type="file" id="image"
                        class="form-control  {{ $errors->has('image') ? ' is-invalid' : '' }}"
                        value="{{ $personale->image}}" onfocusout="validateimage()">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                                aria-hidden="true"></i></span>
                    </div>
                    @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
                    <span class="invalid-feedback" role="alert"></span>
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <fieldset class="border p-2">
                <legend class="w-auto">Contact Details</legend>
                <div class="form-group">
                    <label class="control-label" for="zone">zone</label>
                    <div class="input-group input-group-sm">
                        <input name="zone" type="text" id="zone"
                            class="form-control  {{ $errors->has('zone') ? ' is-invalid' : '' }}"
                            value="{{old('zone') ?? $personale->zone}}" onfocusout="validatezone()">

                        @if ($errors->has('zone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('zone') }}</strong>
                        </span>
                        @endif
                        <span class="invalid-feedback" role="alert"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label" for="woreda">woreda</label>
                    <div class="input-group input-group-sm">
                        <input name="woreda" type="text" id="woreda"
                            class="form-control  {{ $errors->has('woreda') ? ' is-invalid' : '' }}"
                            value="{{old('woreda') ?? $personale->woreda}}" onfocusout="validateworeda()">

                        @if ($errors->has('woreda'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('woreda') }}</strong>
                        </span>
                        @endif
                        <span class="invalid-feedback" role="alert"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label" for="city">city</label>
                    <div class="input-group input-group-sm">
                        <input name="city" type="text" id="city"
                            class="form-control  {{ $errors->has('city') ? ' is-invalid' : '' }}"
                            value="{{old('city') ?? $personale->city}}" onfocusout="validatecity()">

                        @if ($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                        <span class="invalid-feedback" role="alert"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label" for="sub_city">sub_city</label>
                    <div class="input-group input-group-sm">
                        <input name="sub_city" type="text" id="sub_city"
                            class="form-control  {{ $errors->has('sub_city') ? ' is-invalid' : '' }}"
                            value="{{old('sub_city') ?? $personale->sub_city}}" onfocusout="validatesub_city()">

                        @if ($errors->has('sub_city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sub_city') }}</strong>
                        </span>
                        @endif
                        <span class="invalid-feedback" role="alert"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label" for="kebele">kebele</label>
                    <div class="input-group input-group-sm">
                        <input name="kebele" type="text" id="kebele"
                            class="form-control  {{ $errors->has('kebele') ? ' is-invalid' : '' }}"
                            value="{{old('kebele') ?? $personale->kebele}}" onfocusout="validatekebele()">

                        @if ($errors->has('kebele'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('kebele') }}</strong>
                        </span>
                        @endif
                        <span class="invalid-feedback" role="alert"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label" for="housenumber">housenumber</label>
                    <div class="input-group input-group-sm">
                        <input name="housenumber" type="text" id="housenumber"
                            class="form-control  {{ $errors->has('housenumber') ? ' is-invalid' : '' }}"
                            value="{{old('housenumber') ?? $personale->housenumber}}"
                            onfocusout="validatehousenumber()">

                        @if ($errors->has('housenumber'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('housenumber') }}</strong>
                        </span>
                        @endif
                        <span class="invalid-feedback" role="alert"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label" for="mobile">mobile</label>
                    <div class="input-group input-group-sm">
                        <input name="mobile" type="text" id="mobile"
                            class="form-control  {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                            value="{{old('mobile') ?? $personale->mobile}}" onfocusout="validatemobile()">

                        @if ($errors->has('mobile'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                        @endif
                        <span class="invalid-feedback" role="alert"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label" for="home_telephone">home_telephone</label>
                    <div class="input-group input-group-sm">
                        <input name="home_telephone" type="text" id="home_telephone"
                            class="form-control  {{ $errors->has('home_telephone') ? ' is-invalid' : '' }}"
                            value="{{old('home_telephone') ?? $personale->home_telephone}}"
                            onfocusout="validatehome_telephone()">

                        @if ($errors->has('home_telephone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('home_telephone') }}</strong>
                        </span>
                        @endif
                        <span class="invalid-feedback" role="alert"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label" for="work_telephone">work_telephone</label>
                    <div class="input-group input-group-sm">
                        <input name="work_telephone" type="text" id="work_telephone"
                            class="form-control  {{ $errors->has('work_telephone') ? ' is-invalid' : '' }}"
                            value="{{old('work_telephone') ?? $personale->work_telephone}}"
                            onfocusout="validatework_telephone()">

                        @if ($errors->has('work_telephone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('work_telephone') }}</strong>
                        </span>
                        @endif
                        <span class="invalid-feedback" role="alert"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label" for="email">email</label>
                    <div class="input-group input-group-sm">
                        <input name="email" type="text" id="email"
                            class="form-control  {{ $errors->has('email') ? ' is-invalid' : '' }}"
                            value="{{old('email') ?? $personale->email}}" onfocusout="validateemail()">

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <span class="invalid-feedback" role="alert"></span>
                    </div>

                </div>
            </fieldset>

            @section('scripts')
            <script>
                $("#birthdate").datetimepicker({
            timepicker:false,
            datepicker:true,
            format: "Y-m-d"
            // format: "YYYY-MM-DD H:mm a"

        });
            $("#hireddate").datetimepicker({
            timepicker:false,
            datepicker:true,
            format: "Y-m-d"
            // format: "YYYY-MM-DD H:mm a"

        });
        function myFunction() {
            // alert();
  var contract = document.getElementById("contract");

//   console.log(contract.value)
  var text = document.getElementById("employment_status_div");
  if (contract.value == 0){
    text.style.display = "block";
  }
}

$('#pay_grade_id').change(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    let pay_grade_id= $(this).val();
    // console.log(pay_grade_id);
$.ajax({
    type:'post',
    url: '/hrm/personale/append',
    data: {pay_grade_id:pay_grade_id},
    success: function(res){
        console.log(res)
        $('#append_pay_grade_level').html(res);
    },
    error: function(){
        console.log("eror")
    }
});
});
            </script>
            @endsection
