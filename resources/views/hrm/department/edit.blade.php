@extends( 'master.app' )
@section( 'title', 'TIMS | Truck Update' )
@section( 'content' )

<div class="col-md-12">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Personale Update</li>
    </ol>

    <div class="card text-left">

        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Personale Update <strong class="blue">{{$department->name}}</strong></h2>
                @can('driver edit')
                <div class="ml-auto">
                    <a href="{{route('department.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
                @endcan
            </div>

        </div>
        <div class="card-body">
            <form method="post" action="{{route('department.update',$department->id)}}" class="form-horizontal"
                id="driver_reg" novalidate>
                @csrf
                @method('PATCH')
                @include('hrm.department.form')

                <div class="d-flex align-items-center mt-4">
                    <div class="form-group 	required ">
                        <label class="control-label" for="job"></label>
                        This Field must have value</div>
                    {{-- @can('customer create') --}}

                    <div class="form-group ml-auto">
                        <button type="submit" class="btn btn-primary" name="save"> <i class="fas fa-save mr-1"
                                aria-hidden="true"></i>Save Update</button>

                    </div>
                </div>


                <div class="card-footer">

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
