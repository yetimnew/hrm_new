<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group 	required">
            <label class="control-label">Driver ID</label>
            <div class="input-group-sm">
                <input name="driverid" type="text" id="driverid"
                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
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


        <div class="form-group required">
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

        <div class="form-group required">
            <label class="control-label" for="birthdate">Birth Date</label>
            <div class="input-group input-group-sm">
                <input name="birthdate" type="text" id="birthdate"
                    class="form-control  {{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                    value="{{old('birthdate') ?? $personale->birthdate}}" onfocusout="validatebirthdate()">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                            aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('birthdate'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('birthdate') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label" for="hireddate">Hired Date</label>
            <div class="input-group input-group-sm">
                <input name="hireddate" type="text" id="hireddate"
                    class="form-control  {{ $errors->has('hireddate') ? ' is-invalid' : '' }}"
                    value="{{old('hireddate') ?? $personale->hireddate}}" onfocusout="validatehireddate()">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                            aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('hireddate'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('hireddate') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
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
    </div>


    <div class="col-lg-4 col-md-6 col-sm-12">


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
                        {{ $posistion->id == $personale->position_id ? 'selected' : '' }}>
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
            <label class="control-label" for="employment_status">employment_status</label>

            <select name="employment_status" id="employment_status" required
                class="form-control form-control-sm {{ $errors->has('employment_status') ? ' is-invalid' : '' }}"
                onfocusout="validatedepartment()">

                @if ($personale->employment_status == 1)
                <option class="dropup" value="1" selected>Permanent</option>
                <option class="dropup" value="0">Contract</option>
                @else
                <option class="dropup" value="0" selected>Contract</option>
                <option class="dropup" value="1">Permanent</option>
                @endif


            </select>

            @if ($errors->has('employment_status'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('employment_status') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
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
                        value="{{old('housenumber') ?? $personale->housenumber}}" onfocusout="validatehousenumber()">

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
        </script>
        @endsection
