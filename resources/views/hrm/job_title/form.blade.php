<div class="form-group 	required">
    <label class="control-label">job_title Name</label>
    <div class="input-group-sm">
        <input name="name" type="text" id="name"
            class="form-control  input-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"
            value="{{old('name') ?? $job_title->name}}" onfocusout="validatename()">
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
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
                {{ $department->id == $job_title->department_id ? 'selected' : '' }}>
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


<div class="form-group 	required">
    <label class="control-label" for="given_number">given_number</label>
    <div class="input-group-sm">
        <input name="given_number" type="text" id="given_number"
            class="form-control  input-sm {{ $errors->has('given_number') ? ' is-invalid' : '' }}"
            value="{{old('given_number') ?? $job_title->given_number}}" onfocusout="validategiven_number()"
            placeholder="1">
        @if ($errors->has('given_number'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('given_number') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
<div class="form-group ">
    <label class="control-label">job_description</label>
    <div class="input-group">
        <textarea name="job_description" rows="5"
            class="form-control {{ $errors->has('job_description') ? ' is-invalid' : '' }}"
            id="job_description">{{ old('job_description') ?? $job_title->job_description}}</textarea>
        @if ($errors->has('job_description'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('job_description') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
