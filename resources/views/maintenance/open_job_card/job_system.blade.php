<div class="form-group  required">
    <label class="control-label" for="job_ident">Job Idents</label>
    <div class="input-group">
        <select name="job_ident[]" id="job_ident"
            class="form-control {{ $errors->has('job_ident') ? ' is-invalid' : '' }}" onfocusout="validatemechnic()"
            multiple>
            <option class="dropup" value="" selected> Select One</option>
            {{-- <ol> --}}


            @foreach ($job_idents as $job_ident)
            <option class="dropup" value="{{$job_ident->id}}"
                {{ $job_ident->id == $ojc->job_system_id ? 'selected' : '' }}>
                {{$job_ident->name}}
            </option>
            {{-- <li> {{$job_ident->name}}</li> --}}
            @endforeach
            {{-- </ol> --}}
        </select>
        @if ($errors->has('job_ident'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('job_ident') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>
