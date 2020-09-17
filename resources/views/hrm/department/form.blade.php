<div class="form-group 	required">
    <label class="control-label">Department Name</label>
    <div class="input-group-sm">
        <input name="name" type="text" id="name"
            class="form-control  input-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"
            value="{{old('name') ?? $department->name}}" onfocusout="validatename()">
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
<div class="form-group ">
    <label class="control-label">Description</label>

    <div class="input-group-sm">
        <input name="description" type="text" id="description"
            class="form-control input-sm {{ $errors->has('description') ? ' is-invalid' : '' }}"
            value="{{old('description') ?? $department->comment}}" onfocusout="validatedescription()">
        @if ($errors->has('description'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
