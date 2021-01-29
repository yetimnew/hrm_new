
<div class="row">
    <div class="col-sm 12 col-md-6 col-lg-6">
        <div class="form-group  required">
            <label class="control-label" for="personale_id">የሰራተኛ ሥም</label>
            <div class="input-group-sm">
                <select name="personale_id" id="personale_id"
                    class="form-control {{ $errors->has('personale_id') ? ' is-invalid' : '' }}"
                    onfocusout="validatepersonale_id()">

                    <option class="dropup" value="" selected disabled> Select One</option>
                    @foreach ($personals as $personale)
                    <option class="dropup" value="{{$personale->id}}"
                        {{ $personale->id == $leave->personale_id ? 'selected' : '' }}>
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
                        {{ $leave_type->id == $leave->leave_type_id  ? 'selected' : '' }}>
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
            <label class="control-label" for="start_date">Start Date</label>
            <div class="input-group-sm">
                <input name="start_date" type="date" id="start_date"
                    class="form-control  input-sm {{ $errors->has('start_date') ? ' is-invalid' : '' }}"
                    value="{{old('start_date') ?? $leave->start_date}}" onfocusout="validatestart_date()">
                @if ($errors->has('start_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
    </div>
    <div class="col-sm 12 col-md-6 col-lg-6">


        <div class="form-group 	required">
            <label class="control-label" for="end_date">{{__( 'End Date')}}</label>
            <div class="input-group-sm">
                <input name="end_date" type="date" id="end_date"
                    class="form-control  input-sm {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                    value="{{old('end_date') ?? $leave->end_date}}" onfocusout="validateend_date()">
                @if ($errors->has('end_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('end_date') }}</strong>
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
                    id="note">{{ old('note') ?? $leave->note}}</textarea>
                @if ($errors->has('note'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('note') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

    </div>
    </div>




