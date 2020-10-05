<div class="form-group 	required">
    <label class="control-label">Branch Name</label>
    <div class="input-group-sm">
        <input name="name" type="text" id="name"
            class="form-control  input-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"
            value="{{old('name') ?? $branch->name}}" onfocusout="validatename()">
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
<div class="form-group 	required">
    <label class="control-label" for="city">City</label>
    <div class="input-group-sm">
        <input name="city" type="text" id="city"
            class="form-control  input-sm {{ $errors->has('city') ? ' is-invalid' : '' }}"
            value="{{old('city') ?? $branch->city}}" onfocusout="validatecity()">
        @if ($errors->has('city'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('city') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
<div class="form-group ">
    <label class="control-label">Address</label>
    <div class="input-group-sm">
        <input name="address" type="text" id="address"
            class="form-control  input-sm {{ $errors->has('address') ? ' is-invalid' : '' }}"
            value="{{old('address') ?? $branch->address}}" onfocusout="validateaddress()">
        @if ($errors->has('address'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('address') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
<div class="form-group ">
    <label class="control-label" for="phone">Phone</label>
    <div class="input-group-sm">
        <input name="phone" type="text" id="phone"
            class="form-control  input-sm {{ $errors->has('phone') ? ' is-invalid' : '' }}"
            value="{{old('phone') ?? $branch->phone}}" onfocusout="validatephone()">
        @if ($errors->has('phone'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
<div class="form-group ">
    <label class="control-label" for="fax">Fax</label>
    <div class="input-group-sm">
        <input name="fax" type="text" id="fax"
            class="form-control  input-sm {{ $errors->has('fax') ? ' is-invalid' : '' }}"
            value="{{old('fax') ?? $branch->fax}}" onfocusout="validatefax()">
        @if ($errors->has('fax'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('fax') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
