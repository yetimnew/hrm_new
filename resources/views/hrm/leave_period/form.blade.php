<div class="form-group 	required">
    <label class="control-label">Leave Period Name</label>
    <div class="input-group-sm">
        <input name="name" type="text" id="name"
            class="form-control  input-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"
            value="{{old('name') ?? $leave_period->name}}" onfocusout="validatename()">
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
<h4>Start Date</h4>
<div class="row">
    <div class="col-md-4">
        <div class="form-group required ">
            <label class="control-label">Date</label>
            <select name="ddate" class="form-control {{ $errors->has('ddate') ? ' is-invalid' : '' }} select" id="ddate"
                onfocusout="validatestart_date()">
                <option class="dropup" value=""> Select One</option>
                @foreach ($eth_date as $ey)
                    <option class="dropup" value="{{$ey->number}}"   {{$ey->number == $leave_period->EthDate ? 'selected' : '' }}>
                        {{$ey->number}}
                    </option>
                @endforeach
          </select>
            @if ($errors->has('start_date'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('start_date') }}</strong>
            </span>
            @endif

            <span class="invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-4">
    <div class="form-group required ">
        <label class="control-label" for="ddmonth">Month</label>
        <select name="ddmonth" class="form-control {{ $errors->has('ddmonth') ? ' is-invalid' : '' }} select" id="ddmonth"
            onfocusout="validateddmonth()">
            <option class="dropup" value=""> Select One</option>
            @foreach ($eth_month as $em)
            <option class="dropup" value="{{$em->id}}"   {{$em->number == $leave_period->EthMonth ? 'selected' : '' }}>
                {{$em->name}}
            </option>
            @endforeach

        </select>
        @if ($errors->has('ddmonth'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('ddmonth') }}</strong>
        </span>
        @endif

        <span class="invalid-feedback" role="alert"></span>
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group required ">
    <label class="control-label" for="ddyear">Year</label>
    <div class="input-group">
        <select name="ddyear" class="form-control {{ $errors->has('ddyear') ? ' is-invalid' : '' }} select" id="ddyear"
            onfocusout="validatestart_date()">
        <option class="dropup" value=""> Select One</option>
        @foreach ($eth_year as $eyear)
            <option class="dropup" value="{{$eyear->number}}"   {{$eyear->number == $leave_period->EthYear ? 'selected' : '' }}>
                {{$eyear->number}}
            </option>
        @endforeach
    </select>
           @if($errors->has('ddyear'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('ddyear') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
</div>
</div>

<h4>End Date</h4>
<div class="row">
<div class="col-md-4">
    <div class="form-group required ">
        <label class="control-label">Date</label>
        <select name="hdate" class="form-control {{ $errors->has('hdate') ? ' is-invalid' : '' }} select" id="hdate"
            onfocusout="validatehdate()">
            <option class="dropup" value=""> Select One</option>
            @foreach ($eth_date as $ey)
            <option class="dropup" value="{{$ey->number}}"   {{$ey->number == $leave_period->EthHDate ? 'selected' : '' }}>
                {{$ey->number}}
            </option>
        @endforeach
        </select>
        @if ($errors->has('hdate'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('hdate') }}</strong>
        </span>
        @endif

        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
<div class="col-md-4">
<div class="form-group required ">
    <label class="control-label" for="hmonth">Month</label>
    <select name="hmonth" class="form-control {{ $errors->has('hmonth') ? ' is-invalid' : '' }} select" id="hmonth"
        onfocusout="validatehmonth()">
        @foreach ($eth_month as $em)
        <option class="dropup" value="{{$em->id}}"   {{$em->number == $leave_period->EthHMonth ? 'selected' : '' }}>
            {{$em->name}}
        </option>
        @endforeach

    </select>
    @if ($errors->has('hmonth'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hmonth') }}</strong>
    </span>
    @endif
    <span class="invalid-feedback" role="alert"></span>
</div>
</div>
<div class="col-md-4">
<div class="form-group required ">
<label class="control-label" for="hyear">Year</label>
<div class="input-group">

    <select name="hyear" class="form-control {{ $errors->has('hyear') ? ' is-invalid' : '' }} select" id="hyear"
        onfocusout="validatehdate()">
        <option class="dropup" value=""> Select One</option>
        @foreach ($eth_year as $eyear)
        <option class="dropup" value="{{$eyear->number}}"   {{$eyear->number == $leave_period->EthHYear ? 'selected' : '' }}>
            {{$eyear->number}}
        </option>
    @endforeach
    </select>
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hyear') }}</strong>
    </span>
    <span class="invalid-feedback" role="alert"></span>
</div>

</div>
</div>
</div>

