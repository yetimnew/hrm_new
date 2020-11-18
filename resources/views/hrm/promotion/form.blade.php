<div class="form-group  required">
    <label class="control-label" for="personale_id">Employee's Name</label>
    <div class="input-group-sm">
        <select name="personale_id" id="personale_id"
            class="form-control {{ $errors->has('personale_id') ? ' is-invalid' : '' }}"
            onfocusout="validatepersonale_id()">
            <option class="dropup" value="" selected disabled> Select One</option>
            @if ($employees->count() > 0)
            @foreach ($employees as $employee)
            <option class="dropup" value="{{$employee->id}}"
                {{ $employee->id == $promotion->personale_id ? 'selected' : '' }}>
                {{$employee->fullname}}
            </option>
            @endforeach
            @endif

        </select>
        @if ($errors->has('personale_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('personale_id') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
<div class="form-group  required">
    <label class="control-label" for="department_id">Departements Name</label>
    <div class="input-group-sm">
        <select name="department_id" id="department_id"
            class="form-control {{ $errors->has('department_id') ? ' is-invalid' : '' }}"
            onfocusout="validatedepartment_id()">
            <option class="dropup" value="" selected disabled> Select One</option>
            @if ($departments->count() > 0)
            @foreach ($departments as $department)
            <option class="dropup" value="{{$department->id}}"
                {{ $department->id == $promotion->department_id ? 'selected' : '' }}>
                {{$department->name}}
            </option>
            @endforeach
            @endif

        </select>
        @if ($errors->has('department_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('department_id') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
<div class="form-group  required">
    <label class="control-label" for="jobtitle_id">Job Title Name</label>
    <div class="input-group-sm">
        <select name="jobtitle_id" id="jobtitle_id"
            class="form-control {{ $errors->has('jobtitle_id') ? ' is-invalid' : '' }}"
            onfocusout="validatejobtitle_id()">
            <option class="dropup" value="" selected disabled> Select One</option>
            @foreach ($job_titles as $job_title)
            <option class="dropup" value="{{$job_title->id}}"
                {{ $job_title->id == $promotion->jobtitle_id ? 'selected' : '' }}>
                {{$job_title->name}}
            </option>
            @endforeach

        </select>
        @if ($errors->has('jobtitle_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('jobtitle_id') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
<div class="form-group  required">
    <label class="control-label" for="pay_grade_id">Pay Grade</label>
    <div class="input-group-sm">
        <select name="pay_grade_id" id="pay_grade_id"
            class="form-control {{ $errors->has('pay_grade_id') ? ' is-invalid' : '' }}"
            onfocusout="validatepay_grade_id()">
            <option class="dropup" value="" selected disabled> Select One</option>
            @if ($pay_grades->count() > 0)
            @foreach ($pay_grades as $pay_grade)
            <option class="dropup" value="{{$pay_grade->id}}"
                {{ $pay_grade->id == $promotion->pay_grade_id ? 'selected' : '' }}>
                {{$pay_grade->name}}
            </option>
            @endforeach
            @endif

        </select>
        @if ($errors->has('pay_grade_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('pay_grade_id') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
<div class="form-group  required">
    <label class="control-label" for="pay_grade_level_id">Pay Grade Levels</label>
    <div class="input-group-sm">
        <select name="pay_grade_level_id" id="pay_grade_level_id"
            class="form-control {{ $errors->has('pay_grade_level_id') ? ' is-invalid' : '' }}"
            onfocusout="validatepay_grade_level_id()">
            <option class="dropup" value="" selected disabled> Select One</option>
            @if ($pay_grade_levels->count() > 0)
            @foreach ($pay_grade_levels as $pay_grade_level)
            <option class="dropup" value="{{$pay_grade_level->id}}"
                {{ $pay_grade_level->id == $promotion->pay_grade_level_id ? 'selected' : '' }}>
                {{$pay_grade_level->pay_grade_id}} -- {{$pay_grade_level->name}}
            </option>
            @endforeach
            @endif
        </select>
        @if ($errors->has('pay_grade_level_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('pay_grade_level_id') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
<div class="form-group required">
    <label class="control-label" for="start_date">Start  Date</label>
    <div class="input-group input-group-sm">
        <input name="start_date" type="text" id="start_date"
            class="form-control  {{ $errors->has('start_date') ? ' is-invalid' : '' }}"
            value="{{old('start_date') ?? $promotion->start_date}}" onfocusout="validatestart_date()">
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                    aria-hidden="true"></i></span>
        </div>
        @if ($errors->has('start_date'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('start_date') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
<div class="form-group ">
    <label class="control-label">Comment</label>

    <div class="input-group">
        <textarea name="comment" rows="5"
            class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}"
            id="comment">{{ old('comment') ?? $promotion->comment}}</textarea>
        @if ($errors->has('comment'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('comment') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
@section('scripts')
<script>
    $("#start_date").datetimepicker({
timepicker:false,
datepicker:true,
format: "Y-m-d"
// format: "YYYY-MM-DD H:mm a"

});
</script>
@endsection



