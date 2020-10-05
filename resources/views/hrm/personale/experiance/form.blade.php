<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <label class="control-label" for="name">Employer Name</label>
            <div class="input-group input-group-sm">
                <input name="employer" type="text" id="employer"
                    class="form-control  {{ $errors->has('employer') ? ' is-invalid' : '' }}"
                    value="{{old('employer') ?? $experience->employer}}" onfocusout="validateemployer()">

                @if ($errors->has('employer'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('employer') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>

        <div class="form-group">
            <label class="control-label" for="job_title">Job Title</label>
            <div class="input-group input-group-sm">
                <input name="job_title" type="text" id="job_title"
                    class="form-control  {{ $errors->has('job_title') ? ' is-invalid' : '' }}"
                    value="{{old('job_title') ?? $experience->job_title}}" onfocusout="validatejob_title()">

                @if ($errors->has('job_title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('job_title') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>

        <div class="form-group required">
            <label class="control-label" for="from_date">Start Date</label>
            <div class="input-group input-group-sm">
                <input name="from_date" type="text" id="from_date"
                    class="form-control  {{ $errors->has('from_date') ? ' is-invalid' : '' }}"
                    value="{{old('from_date') ?? $experience->from_date}}" onfocusout="validatefrom_date()">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                            aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('from_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('from_date') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label" for="to_date">End Date</label>
            <div class="input-group input-group-sm">
                <input name="to_date" type="text" id="to_date"
                    class="form-control  {{ $errors->has('to_date') ? ' is-invalid' : '' }}"
                    value="{{old('to_date') ?? $experience->to_date}}" onfocusout="validateto_date()">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                            aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('to_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('to_date') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group ">
            <label class="control-label">Comment</label>

            <div class="input-group">
                <textarea name="comment" rows="5"
                    class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}"
                    id="comment">{{ old('comment') ?? $experience->comment}}</textarea>
                @if ($errors->has('comment'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('comment') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        @section('scripts')
        <script>
            $("#from_date").datetimepicker({
            timepicker:false,
            datepicker:true,
            format: "Y-m-d"
            // format: "YYYY-MM-DD H:mm a"

        });
            $("#to_date").datetimepicker({
            timepicker:false,
            datepicker:true,
            format: "Y-m-d"
            // format: "YYYY-MM-DD H:mm a"

        });

        </script>
        @endsection
