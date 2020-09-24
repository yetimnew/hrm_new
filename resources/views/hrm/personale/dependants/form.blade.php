<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        {{-- {{dd($employee)}} --}}

        {{-- <input name="personale_id" type="hidden" id="personale_id" value="{{$employee->id}}"> --}}
        <div class="form-group">
            <label class="control-label" for="name">Dependant Name</label>
            <div class="input-group input-group-sm">
                <input name="name" type="text" id="name"
                    class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}"
                    value="{{old('name') ?? $employees_dependant->name}}" onfocusout="validatename()">

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
                    value="{{old('relationship') ?? $employees_dependant->relationship}}"
                    onfocusout="validaterelationship()">

                @if ($errors->has('relationship'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('relationship') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label" for="relationship_type">relationship_type</label>

            <select name="relationship_type" id="relationship_type" required
                class="form-control form-control-sm {{ $errors->has('relationship_type') ? ' is-invalid' : '' }}"
                onfocusout="validatedepartment()">
                @if ($employees_dependant->relationship_type == 1)
                <option class="dropup" value="0" selected>Child </option>
                <option class="dropup" value="1">Other</option>
                @else
                <option class="dropup" value="1" selected>Other</option>
                <option class="dropup" value="0">Child</option>
                @endif

            </select>

            @if ($errors->has('relationship_type'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('relationship_type') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>


        <div class="form-group required">
            <label class="control-label" for="date_of_birth">Birth Date</label>
            <div class="input-group input-group-sm">
                <input name="date_of_birth" type="text" id="date_of_birth"
                    class="form-control  {{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}"
                    value="{{old('date_of_birth') ?? $employees_dependant->date_of_birth}}"
                    onfocusout="validatedate_of_birth()">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                            aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('date_of_birth'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('date_of_birth') }}</strong>
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
