@extends( 'master.app' )
@section( 'title', 'TIMS | Down Time Registration' )

@section( 'content' )

<div class="col-md-12">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Employee Registration</li>
        </ol>
    </nav>
    <div class="card text-left">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <h2>Down Time Registration</h2>
                <!-- @can('driver create') -->
                <div class="ml-auto">
                    <a href="{{route('downtime')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
                <!-- @endcan -->
            </div>

        </div>
        <div class="card-body">

            <form method="post" action="{{route('downtime.store')}}" class="form-horizontal" id="driver_reg" novalidate>
                @csrf
                @include('maintenance.downtime.form')
                <div class="d-flex align-items-center mb-4">
                    <div class="form-group 	required ">
                        <label class="control-label" for="job"></label>
                        This Field must have value</div>
                    {{-- @can('customer create') --}}

                    <div class="form-group ml-auto">
                        <button type="submit" class="btn btn-primary" name="save"> <i class="fas fa-save mr-1"
                                aria-hidden="true"></i>Save</button>

                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="card-footer">

</div>


</div>
</div>

@endsection
@section( 'javascript' )


@endsection
