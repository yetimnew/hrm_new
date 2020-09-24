<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        {{-- {{dd($employee)}} --}}

        {{-- <input name="personale_id" type="hidden" id="personale_id" value="{{$employee->id}}"> --}}
        <div class="form-group">
            <label class="control-label" for="name"> Name</label>
            <div class="input-group input-group-sm">
                <input name="name" type="text" id="name"
                    class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}"
                    value="{{old('name') ?? $emergency_contact->name}}" onfocusout="validatename()">

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>


        <div class="form-group">
            <label class="control-label" for="relationship">relationship</label>
            <div class="input-group input-group-sm">
                <input name="relationship" type="text" id="relationship"
                    class="form-control  {{ $errors->has('relationship') ? ' is-invalid' : '' }}"
                    value="{{old('relationship') ?? $emergency_contact->relationship}}"
                    onfocusout="validaterelationship()">

                @if ($errors->has('relationship'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('relationship') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label" for="mobile">mobile</label>
            <div class="input-group input-group-sm">
                <input name="mobile" type="text" id="mobile"
                    class="form-control  {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                    value="{{old('mobile') ?? $emergency_contact->mobile}}" onfocusout="validatemobile()">

                @if ($errors->has('mobile'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mobile') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label" for="home_telephone">home_telephone</label>
            <div class="input-group input-group-sm">
                <input name="home_telephone" type="text" id="home_telephone"
                    class="form-control  {{ $errors->has('home_telephone') ? ' is-invalid' : '' }}"
                    value="{{old('home_telephone') ?? $emergency_contact->home_telephone}}"
                    onfocusout="validatehome_telephone()">

                @if ($errors->has('home_telephone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('home_telephone') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label" for="work_telephone">work_telephone</label>
            <div class="input-group input-group-sm">
                <input name="work_telephone" type="text" id="work_telephone"
                    class="form-control  {{ $errors->has('work_telephone') ? ' is-invalid' : '' }}"
                    value="{{old('work_telephone') ?? $emergency_contact->work_telephone}}"
                    onfocusout="validatework_telephone()">

                @if ($errors->has('work_telephone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('work_telephone') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>


        @section('scripts')
        <script>
            $("#date_of_birth").datetimepicker({
            timepicker:false,
            datepicker:true,
            format: "Y-m-d"
            // format: "YYYY-MM-DD H:mm a"

        });

        </script>
        @endsection
