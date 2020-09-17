<div class="row">
    <div class="col-md-6">
        <div class="form-group  required">
            <label class="control-label" for="job_card_type">Job Card Type</label>
            <div class="input-group">
                <select name="job_card_type" id="job_card_type"
                    class="form-control {{ $errors->has('job_card_type') ? ' is-invalid' : '' }}"
                    onfocusout="validatejob_card_type()">
                    <option class="dropup" value="" selected> Select One</option>
                    @foreach ($job_card_types as $job_card_type)
                    <option class="dropup" value="{{$job_card_type->id}}"
                        {{ $job_card_type->id == $ojc->job_card_type ? 'selected' : '' }}>
                        {{$job_card_type->name}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('job_card_type'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('job_card_type') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="control-label" for="Job_card_number">Job Card Number</label></label>
            <div class="input-group">
                <input name="Job_card_number" type="text"
                    class="form-control {{ $errors->has('Job_card_number') ? ' is-invalid' : '' }}" id="Job_card_number"
                    value="{{ old('Job_card_number' ) ?? $ojc->Job_card_number}}"
                    onfocusout="validateJob_card_number()">
                <div class="input-group-append">
                    <button type="button" id="toggle" class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </button>
                </div>
                @if($errors->has('Job_card_number'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('Job_card_number') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="control-label" for="opening_date">Opining Date</label>
            <div class="input-group">
                <input name="opening_date" type="text"
                    class="form-control {{ $errors->has('opening_date') ? ' is-invalid' : '' }}" id="opening_date"
                    value="{{ old('opening_date' ) ?? $ojc->opening_date}}" onfocusout="validateopening_date()">
                <div class="input-group-append">
                    <button type="button" id="toggle" class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </button>
                </div>
                @if($errors->has('opening_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('km_reading_date') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group  required">
            <label class="control-label" for="workshop_id">Workshop</label>
            <div class="input-group">
                <select name="workshop_id" id="workshop_id"
                    class="form-control {{ $errors->has('workshop_id') ? ' is-invalid' : '' }}"
                    onfocusout="validateworkshop_id()">
                    <option class="dropup" value="" selected> Select One</option>

                    @foreach ($workshops as $workshop)
                    <option class="dropup" value="{{$workshop->id}}"
                        {{ $workshop->id == $ojc->workshop_id ? 'selected' : '' }}>
                        {{$workshop->name}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('workshop_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('workshop_id') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group  required">
            <label class="control-label" for="customer">Customer</label>
            <div class="input-group">
                <select name="customer" id="customer"
                    class="form-control {{ $errors->has('customer') ? ' is-invalid' : '' }}"
                    onfocusout="validatecustomer()">
                    <option class="dropup" value="" selected> Select One</option>

                    @foreach ($customers as $customer)
                    <option class="dropup" value="{{$customer->id}}"
                        {{ $customer->id == $ojc->customer ? 'selected' : '' }}>
                        {{$customer->name}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('customer'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('customer') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group  required">
            <label class="control-label" for="trucks">Truck</label>
            <div class="input-group">
                <select name="trucks" id="trucks" class="form-control {{ $errors->has('trucks') ? ' is-invalid' : '' }}"
                    onfocusout="validatetrucks()">
                    <option class="dropup" value="" selected> Select One</option>

                    @foreach ($trucks as $truck)
                    <option class="dropup" value="{{$truck->id}}" {{ $truck->id == $ojc->trucks ? 'selected' : '' }}>
                        {{$truck->plate}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('trucks'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('trucks') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label">KM Reading</label>
            <div class="input-group">
                <input name="km_reading" type="number"
                    class="form-control {{ $errors->has('km_reading') ? ' is-invalid' : '' }}" id="km_reading"
                    value="{{ old('km_reading' ) ?? $ojc->km_reading}}" onfocusout="validatekm_reading()">

                @if($errors->has('km_reading'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('km_reading') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label">KM Reading Date</label>
            <div class="input-group">
                <input name="km_reading_date" type="text"
                    class="form-control {{ $errors->has('km_reading_date') ? ' is-invalid' : '' }}" id="km_reading_date"
                    value="{{ old('km_reading_date' ) ?? $ojc->km_reading_date}}"
                    onfocusout="validatekm_reading_date()">
                <div class="input-group-append">
                    <button type="button" id="toggle" class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </button>
                </div>
                @if($errors->has('km_reading_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('km_reading_date') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group  required">
            <label class="control-label" for="trucks">Driver Name</label>
            <div class="input-group">
                <select name="driver" id="driver" class="form-control {{ $errors->has('driver') ? ' is-invalid' : '' }}"
                    onfocusout="validatedriver()">
                    <option class="dropup" value="" selected> Select One</option>

                    @foreach ($drivers as $driver)
                    <option class="dropup" value="{{$driver->id}}"
                        {{ $driver->id == $ojc->driver_id ? 'selected' : '' }}>
                        {{$driver->fullname}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('driver'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('driver') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group  required">
            <label class="control-label" for="trucks">Mecanic Name</label>
            <div class="input-group">
                <select name="mechnic" id="mechnic"
                    class="form-control {{ $errors->has('mechnic') ? ' is-invalid' : '' }}"
                    onfocusout="validatemechnic()">
                    <option class="dropup" value="" selected> Select One</option>

                    @foreach ($mechanics as $mechnic)
                    <option class="dropup" value="{{$mechnic->id}}"
                        {{ $mechnic->id == $ojc->mechnic_id ? 'selected' : '' }}>
                        {{$mechnic->fullname}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('mechnic'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mechnic') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group  required">
            <label class="control-label" for="assistant_mechnic">Assistance Mecanic Name</label>
            <div class="input-group">
                <select name="assistant_mechnic" id="assistant_mechnic"
                    class="form-control {{ $errors->has('assistant_mechnic') ? ' is-invalid' : '' }}"
                    onfocusout="validatemechnic()">
                    <option class="dropup" value="" selected> Select One</option>

                    @foreach ($mechanics as $mechnic)
                    <option class="dropup" value="{{$mechnic->id}}"
                        {{ $mechnic->id == $ojc->mechnic_id ? 'selected' : '' }}>
                        {{$mechnic->fullname}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('assistant_mechnic'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('assistant_mechnic') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group  required">
            <label class="control-label" for="assistant_mechnic">Receptionist Name</label>
            <div class="input-group">
                <select name="receptionist" id="receptionist"
                    class="form-control {{ $errors->has('receptionist') ? ' is-invalid' : '' }}"
                    onfocusout="validatemechnic()">
                    <option class="dropup" value="" selected> Select One</option>

                    @foreach ($mechanics as $mechnic)
                    <option class="dropup" value="{{$mechnic->id}}"
                        {{ $mechnic->id == $ojc->mechnic_id ? 'selected' : '' }}>
                        {{$mechnic->fullname}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('receptionist'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('receptionist') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group  required">
            <label class="control-label" for="jobsystem ">Job System</label>
            <div class="input-group">
                <select name="jobsystem[]" id="jobsystem"
                    class="form-control {{ $errors->has('jobsystem') ? ' is-invalid' : '' }}"
                    onfocusout="validatemechnic()" multiple>
                    <option class="dropup" value="" selected> Select One</option>

                    @foreach ($job_systems as $jobsystem)
                    <option class="dropup" value="{{$jobsystem->id}}"
                        {{ $jobsystem->id == $ojc->job_system_id ? 'selected' : '' }}>
                        {{$jobsystem->name}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('jobsystem'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('jobsystem') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div id="appendJobSystem">
            @include('maintenance.open_job_card.job_system')
        </div>
        <div class="form-group ">
            <label class="control-label">Comment</label>

            <div class="input-group">
                <textarea name="comment" rows="5"
                    class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}"
                    id="comment">{{ old('comment') ?? $ojc->comment}}</textarea>
                @if ($errors->has('comment'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('comment') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
    </div>


    @section('scripts')
    <script>
        $(document).ready( function () {

    $("#km_reading_date").datetimepicker({
    timepicker:true,

    format: "Y-m-d"

});
    $("#opening_date").datetimepicker({
    timepicker:true,

    format: "Y-m-d"

});
$('#jobsystem').select2({
    placeholder: "Select Origin Place",
    allowClear: true,
    multiple: true
        });

$('#job_ident').select2({
    placeholder: "Select Origin Place",
    allowClear: true,
    multiple: true
        });

$('#jobsystem').change(function(){
    let jobsystem= $(this).val();
    // console.log(jobsystem);
$.ajax({
    type:'post',
    url: '/maintenance/open_job_card/append',
    data: {jobsystem:jobsystem},
    success: function(resp){
$('#appendJobSystem').html(resp);
    },
    error: function(){
        console.log("eror")
    }
});
});

    });
    </script>
    @endsection
