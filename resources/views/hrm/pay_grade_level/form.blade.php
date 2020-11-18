<div class="form-group 	required">
    <label class="control-label">pay_grade_level Name</label>
    <div class="input-group-sm">
        <input name="name" type="text" id="name"
            class="form-control  input-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"
            value="{{old('name') ?? $pay_grade_level->name}}" onfocusout="validatename()">
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
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
            @foreach ($pay_grades as $pay_grade)
            <option class="dropup" value="{{$pay_grade->id}}"
                {{ $pay_grade->id == $pay_grade_level->pay_grade_id ? 'selected' : '' }}>
                {{$pay_grade->name}}
            </option>
            @endforeach

        </select>
        @if ($errors->has('pay_grade_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('department') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>

<div class="form-group 	required">
    <label class="control-label" for="salary">Salary</label>
    <div class="input-group-sm">
        <input name="salary" type="number" id="salary"
            class="form-control  input-sm {{ $errors->has('salary') ? ' is-invalid' : '' }}"
            value="{{old('salary') ?? $pay_grade_level->salary}}" min="0" onfocusout="validatesalary()">
        @if ($errors->has('salary'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('salary') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>

<div class="form-group ">
    <label class="control-label">comment</label>
    <div class="input-group">
        <textarea name="comment" rows="5" class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}"
            id="comment">{{ old('comment') ?? $pay_grade_level->comment}}</textarea>
        @if ($errors->has('comment'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('comment') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
