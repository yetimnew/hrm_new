@extends( 'master.app' )
@section( 'title', 'TIMS | Open Job Card Update' )
@section( 'content' )

<div class="col-md-12">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Downtime Update</li>
    </ol>

    <div class="card text-left">

        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Downtime Update <strong class="blue">{{$workshop->name}}</strong></h2>
                {{-- @can('driver edit') --}}
                <div class="ml-auto">
                    <a href="{{route('workshop.index')}}" class="btn btn-outline-primary">
                        <i class="fas fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
                {{-- @endcan --}}
            </div>

        </div>
        <div class="card-body">
            <form method="post" action="{{route('workshop.update',$workshop->id)}}" class="form-horizontal"
                id="driver_reg">
                @csrf
                @method('PATCH')
                @include('maintenance.workshop.form')

                <div class="d-flex align-items-center mt-4">
                    <div class="form-group 	required ">
                        <label class="control-label" for="job"></label>
                        This Field must have value</div>
                    <div class="form-group ml-auto">
                        <button type="submit" class="btn btn-primary" name="save"> <i class="fas fa-save mr-1"
                                aria-hidden="true"></i>Save Updates</button>

                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer">

        </div>

    </div>
</div>

@endsection
