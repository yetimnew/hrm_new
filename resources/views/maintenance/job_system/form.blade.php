<div class="form-group 	required">
    <label class="control-label">Name</label>
    <div class="input-group">
        <input name="name" type="text" id="name"
            class="form-control select {{ $errors->has('name') ? ' is-invalid' : '' }}"
            value="{{old('name') ??  $jobsystem->name}}" onfocusout="validatename()">
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

</div>
<div class="form-group required">
    <label class="control-label">Comment</label>

    <div class="input-group">
        <input name="comment" type="text" id="comment"
            class="form-control select {{ $errors->has('comment') ? ' is-invalid' : '' }}"
            value="{{old('comment')  ??  $jobsystem->comment}}" onfocusout="validatecomment()">
        @if ($errors->has('comment'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('comment') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
