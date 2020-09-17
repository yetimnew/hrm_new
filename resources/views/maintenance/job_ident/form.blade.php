<div class="form-group 	required">
    <label class="control-label">Name</label>
    <div class="input-group">
        <input name="name" type="text" id="name"
            class="form-control select {{ $errors->has('name') ? ' is-invalid' : '' }}"
            value="{{old('name') ??  $jobident->name}}" onfocusout="validatename()">
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>

<div class="form-group  required">
    <label class="control-label" for="job">Job Title</label>
    <div class="input-group">
        <select name="jobsystem" id="jobsystem"
            class="form-control {{ $errors->has('jobsystem') ? ' is-invalid' : '' }}" onfocusout="validatejobsystem()">
            <option class="dropup" value="" selected> Select One</option>

            @foreach ($jobsystems as $jobsystem)
            <option class="dropup" value="{{$jobsystem->id}}"
                {{ $jobsystem->id == $jobident->job_system_id ? 'selected' : '' }}>
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

<div class="form-group 	required">
    <label class="control-label">Mechanic Hour</label>
    <div class="input-group">
        <input name="mechanic_hours" type="number" id="mechanic_hours"
            class="form-control select {{ $errors->has('mechanic_hours') ? ' is-invalid' : '' }}"
            value="{{old('mechanic_hours') ??  $jobident->mechanic_hours}}" onfocusout="validatemechanic_hours()">
        @if ($errors->has('mechanic_hours'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('mechanic_hours') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>

<div class="form-group 	required">
    <label class="control-label">Assistant Mechanic Hour</label>
    <div class="input-group">
        <input name="ass_mechanic_hours" type="number" id="ass_mechanic_hours"
            class="form-control select {{ $errors->has('ass_mechanic_hours') ? ' is-invalid' : '' }}"
            value="{{old('ass_mechanic_hours') ??  $jobident->ass_mechanic_hours}}"
            onfocusout="validateass_mechanic_hours()">
        @if ($errors->has('ass_mechanic_hours'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('ass_mechanic_hours') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
<div class="form-group row">
    <label for="comment">Comment</label>
    <textarea name="comment" rows="5" class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}"
        id="comment">{{ old('comment') ?? $jobident->comment}}</textarea>
    @if ($errors->has('comment'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('comment') }}</strong>
    </span>
    @endif
    <span class="invalid-feedback" role="alert"></span>
</div>
