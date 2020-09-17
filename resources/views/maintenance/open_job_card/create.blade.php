@extends( 'master.app' )
@section( 'title', 'TIMS | Open Job Card Registration' )

@section( 'content' )

<div class="col-md-12">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Create Job Card</li>
        </ol>
    </nav>
    <div class="card text-left">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <h2>Open Job Card </h2>
                {{-- <!-- @can('driver create') --> --}}
                <div class="ml-auto">
                    <a href="{{route('open_job_card.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
                {{-- <!-- @endcan --> --}}
            </div>

        </div>
        <div class="card-body">

            <form method="post" action="{{route('open_job_card.store')}}" class="form-horizontal my-select"
                id="driver_reg" novalidate>
                @csrf
                @include('maintenance.open_job_card.form')
        </div>
        <div class="d-flex align-items-center mt-4">
            <div class="form-group 	required ">
                <label class="control-label" for="job"></label>
                This Field must have value</div>
            {{-- @can('customer create') --}}

            <div class="form-group ml-auto">
                <button type="submit" class="btn btn-primary" name="save"> <i class="fas fa-save mr-1"
                        aria-hidden="true"></i>Save</button>

            </div>

            </form>
        </div>
    </div>

    <div class="card-footer">

    </div>


</div>
</div>

@endsection
