<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <label class="control-label" for="name">Feild of Study</label>
            <div class="input-group input-group-sm">
                <input name="name" type="text" id="name"
                    class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}"
                    value="{{old('name') ?? $education->name}}" onfocusout="validatename()">

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>

        <div class="form-group">
            <label class="control-label" for="institute">Institute</label>
            <div class="input-group input-group-sm">
                <input name="institute" type="text" id="institute"
                    class="form-control  {{ $errors->has('institute') ? ' is-invalid' : '' }}"
                    value="{{old('institute') ?? $education->institute}}" onfocusout="validateinstitute()">

                @if ($errors->has('institute'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('institute') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label" for="institute">Institute</label>
            <div class="input-group input-group-sm">
                <input name="institute" type="text" id="institute"
                    class="form-control  {{ $errors->has('institute') ? ' is-invalid' : '' }}"
                    value="{{old('institute') ?? $education->institute}}" onfocusout="validateinstitute()">

                @if ($errors->has('institute'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('institute') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label" for="minor">minor</label>
            <div class="input-group input-group-sm">
                <input name="minor" type="text" id="minor"
                    class="form-control  {{ $errors->has('minor') ? ' is-invalid' : '' }}"
                    value="{{old('minor') ?? $education->minor}}" onfocusout="validateminor()">

                @if ($errors->has('minor'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('minor') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label" for="score">score</label>
            <div class="input-group input-group-sm">
                <input name="score" type="text" id="score"
                    class="form-control  {{ $errors->has('score') ? ' is-invalid' : '' }}"
                    value="{{old('score') ?? $education->score}}" onfocusout="validatescore()">

                @if ($errors->has('score'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('score') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label" for="award">award</label>
            <div class="input-group input-group-sm">
                <input name="award" type="text" id="award"
                    class="form-control  {{ $errors->has('award') ? ' is-invalid' : '' }}"
                    value="{{old('award') ?? $education->award}}" onfocusout="validateaward()">

                @if ($errors->has('award'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('award') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label" for="start_date">Start Date</label>
            <div class="input-group input-group-sm">
                <input name="start_date" type="text" id="start_date"
                    class="form-control  {{ $errors->has('start_date') ? ' is-invalid' : '' }}"
                    value="{{old('start_date') ?? $education->start_date}}" onfocusout="validatestart_date()">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                            aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('start_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label" for="end_date">End Date</label>
            <div class="input-group input-group-sm">
                <input name="end_date" type="text" id="end_date"
                    class="form-control  {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                    value="{{old('end_date') ?? $education->end_date}}" onfocusout="validateend_date()">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                            aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('end_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('end_date') }}</strong>
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
                    id="comment">{{ old('comment') ?? $education->comment}}</textarea>
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
            $("#start_date").datetimepicker({
            timepicker:false,
            datepicker:true,
            format: "Y-m-d"
            // format: "YYYY-MM-DD H:mm a"

        });
            $("#end_date").datetimepicker({
            timepicker:false,
            datepicker:true,
            format: "Y-m-d"
            // format: "YYYY-MM-DD H:mm a"

        });

        </script>
        @endsection
