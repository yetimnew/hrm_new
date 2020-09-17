@extends( 'master.app' )
@section( 'title', 'TIMS | Driver Registration' )

@section( 'content' )

<div class="col-md-12">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Driver Registration</li>
            {{--
			<li class="breadcrumb-item active" aria-current="page">Data</li> --}}
        </ol>
    </nav>
    <div class="card text-left">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <h2>Driver Registration</h2>
                @can('driver create')
                <div class="ml-auto">
                    <a href="{{route('driver')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>


                </div>
                @endcan
            </div>

        </div>
        <div class="card-body">
            <form method="post" action="{{route('personale.deactivate_store',$personale->id)}}" class="form-horizontal"
                id="driver_reg" novalidate>
                @csrf
                @method('post')

                <div class="form-group ">
                    <label class="control-label">Do You wnat to deactivate?</label>
                    <div class="form-group">
                        <label class="control-label">Enter the reson to activate</label>
                        <textarea name="comment" rows="5"
                            class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}"
                            id="comment">{{$personale->comment}}</textarea>
                        @if ($errors->has('comment'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                        @endif
                        <span class="invalid-feedback" role="alert"></span>
                    </div>
                    <br>
                    @if ($errors->has('hd'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('hd') }}</strong>
                    </span>
                    @endif
                    <span class="invalid-feedback" role="alert"></span>
                </div>


                <div class="form-group required">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>

                </div>
        </div>

    </div>
</div>
<div class="card-footer">

</div>

</form>
</div>
</div>

@endsection
@section( 'javascript' )


@endsection
