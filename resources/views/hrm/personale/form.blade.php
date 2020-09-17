<div class="row">
    <div class="col-md-6">
        <div class="form-group 	required">
            <label class="control-label">Driver ID</label>
            <div class="input-group-sm">
                <input name="did" type="text" id="did"
                    class="form-control select {{ $errors->has('did') ? ' is-invalid' : '' }}"
                    value="{{old('did') ?? $personale->driverid}}" onfocusout="validateDid()">
                @if ($errors->has('did'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('did') }}</strong>
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
                    value="{{old('firstname') ?? $personale->firstname}}" onfocusout="validateFirstName()">
                @if ($errors->has('firstname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="control-label">Father Name</label>

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
            <label class="control-label">Grand Father Name</label>

            <div class="input-group-sm">
                <input name="gfathername" type="text" id="gfathername"
                    class="form-control select {{ $errors->has('gfathername') ? ' is-invalid' : '' }}"
                    value="{{old('gfathername') ?? $personale->gfathername}}" onfocusout="validateGFatherName()">
                @if ($errors->has('gfathername'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('gfathername') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>


        <div class="row">
            <div class="col-6">
                <div class="form-group required">
                    <label class="control-label" for="sex">Sex</label>

                    <select name="sex" id="sex" required
                        class="form-control form-control-sm {{ $errors->has('sex') ? ' is-invalid' : '' }}"
                        onfocusout="validatedepartment()">

                        @if ($personale->sex == 1)
                        <option class="dropup" value="0" selected>Male </option>
                        <option class="dropup" value="1">Fmale</option>
                        @endif
                        @if ($personale->LoadType == 0)
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
            </div>
            <div class="col-6">
                <div class="form-group required">
                    <label class="control-label">Driver</label>

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

        </div>

        <div class="form-group required">
            <label class="control-label">Birth Date</label>
            <div class="input-group input-group-sm">
                <input name="bdate" type="text" id="bdate"
                    class="form-control  {{ $errors->has('bdate') ? ' is-invalid' : '' }}"
                    value="{{old('bdate') ?? $personale->birthdate}}" onfocusout="validateBdate()">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                            aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('bdate'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('bdate') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>

        <div class="form-group">
            <label class="control-label">Zone</label>

            <div class="input-group-sm">
                <input name="zone" type="text" id="zone"
                    class="form-control form-control-sm {{ $errors->has('zone') ? ' is-invalid' : '' }}"
                    value="{{old('zone') ?? $personale->zone}}" onfocusout="validateZone()">
                @if ($errors->has('zone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('zone') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Worda</label>

            <div class="input-group-sm">
                <input name="woreda" type="text" id="woreda"
                    class="form-control select {{ $errors->has('woreda') ? ' is-invalid' : '' }}"
                    value="{{old('woreda') ?? $personale->woreda}}" onfocusout="validateWoreda()">
                @if ($errors->has('woreda'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('woreda') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <!--                                          the right side begins here-->
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label"> Kebele</label>

            <div class="input-group-sm">
                <input name="kebele" type="text" id="kebele"
                    class="form-control select {{ $errors->has('kebele') ? ' is-invalid' : '' }}"
                    value="{{old('kebele') ?? $personale->kebele}}" onfocusout="validateKebele()">
                @if ($errors->has('kebele'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('kebele') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label"> House Number</label>

            <div class="input-group-sm">
                <input name="hn" type="text" id="hn"
                    class="form-control select {{ $errors->has('hn') ? ' is-invalid' : '' }}"
                    value="{{old('hn') ?? $personale->housenumber}}" onfocusout="validateHn()">
                @if ($errors->has('hn'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('hn') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label"> Mobile Number</label>

            <div class="input-group-sm">
                <input name="mob" type="text" id="mob"
                    class="form-control select {{ $errors->has('mob') ? ' is-invalid' : '' }}"
                    value="{{old('mob') ?? $personale->mobile}}" onfocusout="validateMob()">
                @if ($errors->has('mob'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mob') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="control-label" for="hd">Birth Date</label>
            <div class="input-group input-group-sm">
                <input name="hd" type="text" id="hd" class="form-control  {{ $errors->has('hd') ? ' is-invalid' : '' }}"
                    value="{{old('hd') ?? $personale->hireddate}}" onfocusout="validatehd()">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                            aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('hd'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('hd') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>


        <div class="form-group  required">
            <label class="control-label" for="customer">Department Name</label>
            <div class="input-group-sm">
                <select name="department" id="department"
                    class="form-control {{ $errors->has('department') ? ' is-invalid' : '' }}"
                    onfocusout="validatedepartment()">

                    <option class="dropup" value="" selected> Select One</option>
                    @foreach ($departments as $department)
                    <option class="dropup" value="{{$department->id}}"
                        {{ $department->id == $personale->department_id ? 'selected' : '' }}> {{$department->name}}
                    </option>
                    @endforeach

                </select>
                @if ($errors->has('department'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('department') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group  required">
            <label class="control-label" for="job">Job Title</label>
            <div class="input-group-sm">
                <select name="job" id="job" class="form-control {{ $errors->has('job') ? ' is-invalid' : '' }}"
                    onfocusout="validatejob()">
                    <option class="dropup" value="" selected> Select One</option>

                    @foreach ($positions as $job)
                    <option class="dropup" value="{{$job->id}}"
                        {{ $job->id == $personale->position_id ? 'selected' : '' }}>
                        {{$job->name}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('job'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('job') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        @section('scripts')
        <script>
            $("#bdate").datetimepicker({
            timepicker:false,
            datepicker:true,
            format: "Y-m-d"
            // format: "YYYY-MM-DD H:mm a"

        });
            $("#hd").datetimepicker({
            timepicker:false,
            datepicker:true,
            format: "Y-m-d"
            // format: "YYYY-MM-DD H:mm a"

        });
        </script>
        @endsection
