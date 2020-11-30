

    <div class="col-12">
        <div class="form-group row required ">
            <label class="col-3 col-form-label">Monday</label>
             <div class="col-sm-9">
                <select name="mon" class="form-control {{ $errors->has('mon') ? ' is-invalid' : '' }} select" id="mon"
                onfocusout="validatemon()">
                <option class="dropup" value="8"  {{ $work_week->mon == 8  ? 'selected' : '' }}> Full Day</option>
                <option class="dropup" value="4"  {{ $work_week->mon ==  4 ? 'selected' : '' }}>Half Day</option>
                <option class="dropup" value="0"  {{ $work_week->mon == 0  ? 'selected' : '' }}> Non-working Day</option>
          </select>
             </div>
            @if ($errors->has('mon'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('mon') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group row required ">
            <label class="col-sm-3 col-form-label" for="tue">Tusday</label>
             <div class="col-sm-9">
            <select name="tue" class="form-control {{ $errors->has('tue') ? ' is-invalid' : '' }} select" id="tue"
                onfocusout="validatetue()">
                <option class="dropup" value="8"  {{ $work_week->tue == 8  ? 'selected' : '' }}> Full Day</option>
                <option class="dropup" value="4"  {{ $work_week->tue ==  4 ? 'selected' : '' }}>Half Day</option>
                <option class="dropup" value="0"  {{ $work_week->tue == 0  ? 'selected' : '' }}> Non-working Day</option>
          </select>
             </div>
            @if ($errors->has('tue'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tue') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group row required ">
            <label class="col-sm-3 col-form-label" for="wed">Wensday</label>
             <div class="col-sm-9">
            <select name="wed" class="form-control {{ $errors->has('wed') ? ' is-invalid' : '' }} select" id="wed"
                onfocusout="validatewed()">
                <option class="dropup" value="8"  {{ $work_week->wed == 8  ? 'selected' : '' }}> Full Day</option>
                <option class="dropup" value="4"  {{ $work_week->wed ==  4 ? 'selected' : '' }}>Half Day</option>
                <option class="dropup" value="0"  {{ $work_week->wed == 0  ? 'selected' : '' }}> Non-working Day</option>
          </select>
             </div>
            @if ($errors->has('wed'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('wed') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group row required ">
            <label class="col-sm-3 col-form-label" for="thu">Thursday</label>
             <div class="col-sm-9">
            <select name="thu" class="form-control {{ $errors->has('thu') ? ' is-invalid' : '' }} select" id="thu"
                onfocusout="validatethu()">
                <option class="dropup" value="8"  {{ $work_week->thu == 8  ? 'selected' : '' }}> Full Day</option>
                <option class="dropup" value="4"  {{ $work_week->thu ==  4 ? 'selected' : '' }}>Half Day</option>
                <option class="dropup" value="0"  {{ $work_week->thu == 0  ? 'selected' : '' }}> Non-working Day</option>
          </select>
             </div>
            @if ($errors->has('thu'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('thu') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group row required ">
            <label class="col-sm-3 col-form-label" for="fri">Friday</label>
             <div class="col-sm-9">
            <select name="fri" class="form-control {{ $errors->has('fri') ? ' is-invalid' : '' }} select" id="fri"
                onfocusout="validatefri()">
                <option class="dropup" value="8"  {{ $work_week->fri == 8  ? 'selected' : '' }}> Full Day</option>
                <option class="dropup" value="4"  {{ $work_week->fri ==  4 ? 'selected' : '' }}>Half Day</option>
                <option class="dropup" value="0"  {{ $work_week->fri == 0  ? 'selected' : '' }}> Non-working Day</option>
          </select>
             </div>
            @if ($errors->has('fri'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('fri') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group row required ">
            <label class="col-sm-3 col-form-label" for="sat">Saterday</label>
             <div class="col-sm-9">
            <select name="sat" class="form-control {{ $errors->has('sat') ? ' is-invalid' : '' }} select" id="sat"
                onfocusout="validatesat()">
                <option class="dropup" value="8"  {{ $work_week->sat == 8  ? 'selected' : '' }}> Full Day</option>
                <option class="dropup" value="4"  {{ $work_week->sat ==  4 ? 'selected' : '' }}>Half Day</option>
                <option class="dropup" value="0"  {{ $work_week->sat == 0  ? 'selected' : '' }}> Non-working Day</option>
          </select>
             </div>
            @if ($errors->has('sat'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('sat') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group row required ">
            <label class="col-sm-3 col-form-label" for="sun">Sunday</label>
             <div class="col-sm-9">
            <select name="sun" class="form-control {{ $errors->has('sun') ? ' is-invalid' : '' }} select" id="sun"
                onfocusout="validatesun()">
                <option class="dropup" value="8"  {{ $work_week->sun == 8  ? 'selected' : '' }}> Full Day</option>
                <option class="dropup" value="4"  {{ $work_week->sun ==  4 ? 'selected' : '' }}>Half Day</option>
                <option class="dropup" value="0"  {{ $work_week->sun == 0  ? 'selected' : '' }}> Non-working Day</option>
          </select>
             </div>
            @if ($errors->has('sun'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('sun') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </div>

