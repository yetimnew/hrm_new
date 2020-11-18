<div class="form-group  required">
    {{-- {{ dd($pay_grade_levels)}} --}}
    <label class="control-label" for="pay_grade_level_id">Pay Grade Level</label>
    <div class="input-group-sm">

        <select name="pay_grade_level_id" id="pay_grade_level_id"
            class="form-control {{ $errors->has('pay_grade_level_id') ? ' is-invalid' : '' }}"
            onfocusout="validatepay_grade_level_id()">

            <option class="dropup" value="" selected disabled> Select One</option>
            @foreach ($pay_grade_levels as $pay_grade_level)
            <option class="dropup" value="{{$pay_grade_level->id}}"
                {{ $pay_grade_level->id == $personale->pay_grade_level_id ? 'selected' : '' }}>
                {{$pay_grade_level->name}}
            </option>
            @endforeach
        </select>
        @if ($errors->has('pay_grade_level_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('pay_grade_level_id') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
</div>
