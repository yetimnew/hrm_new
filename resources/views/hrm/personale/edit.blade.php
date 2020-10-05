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
                <h2>Personale Update <strong class="blue">{{$personale->name}}</strong></h2>
                {{-- @can('driver edit') --}}
                <div class="ml-auto">
                    <a href="{{route('personale.show',$personale->id)}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
                {{-- @endcan --}}
            </div>

        </div>
        <div class="card-body">
            <form method="post" action="{{route('personale.update',$personale->id)}}" class="form-horizontal"
                id="driver_reg" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('hrm.personale.form')

                <div class="form-group d-flex  required">

                    <div class="ml-auto">
                        <button type="submit" class="btn btn-el btn-outline-primary ml-auto" name="save">
                            Save update</button>
                    </div>

                </div>
        </div>
    </div>

    <div class="card-footer">

    </div>
    </form>
</div>
</div>
</div>

@endsection
@section('scripts')

@endsection
