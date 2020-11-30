<div class="form-group 	required">
    <label class="control-label">Description</label>
    <div class="input-group-sm">
        <input name="name" type="text" id="name"
            class="form-control  input-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"
            value="{{old('name') ?? $holiday->description}}" onfocusout="validatename()">
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
<h4>Birth Date</h4>
<div class="row">
    <div class="col-md-4">
        <div class="form-group required ">
            <label class="control-label">Date</label>
            <select name="dddate" class="form-control {{ $errors->has('dddate') ? ' is-invalid' : '' }} select" id="dddate"
                onfocusout="validatedddate()">
                <option class="dropup" value=""> Select One</option>
                @foreach ($eth_date as $ey)
                    <option class="dropup" value="{{$ey->number}}"   {{$ey->number == $holiday->EthDate ? 'selected' : '' }}>
                        {{$ey->number}}
                    </option>
                @endforeach
          </select>
            @if ($errors->has('dddate'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('dddate') }}</strong>
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
            <option class="dropup" value="{{$em->id}}"   {{$em->number == $holiday->EthMonth ? 'selected' : '' }}>
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
            onfocusout="validatedddate()">
        <option class="dropup" value=""> Select One</option>
        @foreach ($eth_year as $eyear)
            <option class="dropup" value="{{$eyear->number}}"   {{$eyear->number == $holiday->EthYear ? 'selected' : '' }}>
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

<div class="form-group required">
    <label class="control-label m-2" for="recurring">Repeats Annually</label> <br>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="checkbox" id="recurring" name="recurring" class="form-check-input" value="1"
            {{ ($holiday->recurring =="1" ) ? "checked" : "" }}>
            {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> --}}
    </div>


    @if ($errors->has('recurring'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('recurring') }}</strong>
    </span>
    @endif
    <span class="invalid-feedback" role="alert"></span>
</div>
