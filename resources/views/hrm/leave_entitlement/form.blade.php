<div class="form-group  required">
    <label class="control-label" for="personale_id">የሰራተኛ ሥም</label>
    <div class="input-group-sm">
        <select name="personale_id" id="personale_id"
            class="form-control {{ $errors->has('personale_id') ? ' is-invalid' : '' }}"
            onfocusout="validatepersonale_id()">

            <option class="dropup" value="" selected disabled> Select One</option>
            @foreach ($personals as $personale)
            <option class="dropup" value="{{$personale->id}}"
                {{ $personale->id == $leave_entitlement->personale_id ? 'selected' : '' }}>
                {{$personale->fullname}}
            </option>
            @endforeach

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
    <label class="control-label" for="leave_type_id ">የፍቃድ ዓይነት</label>
    <div class="input-group-sm">
        <select name="leave_type_id " id="leave_type_id "
            class="form-control {{ $errors->has('leave_type_id ') ? ' is-invalid' : '' }}"
            onfocusout="validateleave_type_id ()">

            <option class="dropup" value="" selected disabled> Select One</option>
            @foreach ($leave_types as $leave_type)
            <option class="dropup" value="{{$leave_type->id}}"
                {{ $leave_type->id == $leave_entitlement->leave_type_id  ? 'selected' : '' }}>
                {{$leave_type->name}}
            </option>
            @endforeach

        </select>
        @if ($errors->has('leave_type_id '))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('leave_type_id ') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>

<div class="form-group 	required">
    <label class="control-label" for="no_of_days">ያለው ዕረፍት ብዛት</label>
    <div class="input-group-sm">
        <input name="no_of_days" type="number" id="no_of_days"
            class="form-control  input-sm {{ $errors->has('no_of_days') ? ' is-invalid' : '' }}"
            value="{{old('no_of_days') ?? $leave_entitlement->no_of_days}}" onfocusout="validateno_of_days()">
        @if ($errors->has('no_of_days'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('no_of_days') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>

<div class="form-group 	required">
    <label class="control-label" for="days_used">የተጠቀመው ፍቃድ ብዛት</label>
    <div class="input-group-sm">
        <input name="days_used" type="number" id="days_used"
            class="form-control  input-sm {{ $errors->has('days_used') ? ' is-invalid' : '' }}"
            value="{{old('days_used') ?? $leave_entitlement->days_used}}" onfocusout="validatedays_used()">
        @if ($errors->has('days_used'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('days_used') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
<div class="form-group  required">
    <label class="control-label" for="leave_period_id ">በጀት ዓመት</label>
    <div class="input-group-sm">
        <select name="leave_period_id " id="leave_period_id "
            class="form-control {{ $errors->has('leave_period_id ') ? ' is-invalid' : '' }}"
            onfocusout="validateleave_period_id ()">

            <option class="dropup" value="" selected disabled> Select One</option>
            @foreach ($leave_periods as $leave_period)
            <option class="dropup" value="{{$leave_period->id}}"
                {{$leave_period->id == $leave_entitlement->leave_period_id  ? 'selected' : '' }}>
                {{$leave_period->name}}
            </option>
            @endforeach

        </select>
        @if ($errors->has('leave_period_id '))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('leave_period_id ') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>

<div class="form-group ">
    <label class="control-label" for="note">ማስታወሻ</label>
    <div class="input-group">
        <textarea name="note" rows="5"
            class="form-control {{ $errors->has('note') ? ' is-invalid' : '' }}"
            id="note">{{ old('note') ?? $leave_entitlement->note}}</textarea>
        @if ($errors->has('note'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('note') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>



