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
