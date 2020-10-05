@extends( 'master.app' )
@section( 'title', 'TIMS | Driver Registration' )

@section( 'content' )

<div class="col-md-12">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Employee Dependants Registration</li>
        </ol>
    </nav>
    <div class="card text-left">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <h4>Employee Dependants Registration</h4>
                {{-- <!-- @can('driver create') --> --}}
                <div class="ml-auto">
                    <a href="{{route('personale.index')}}" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
                {{-- <!-- @endcan --> --}}
            </div>

        </div>
        <div class="card-body">
            <form method="POST" action="{{route('education.store')}}" class="form-horizontal" id="driver_reg">
                @csrf
                {{-- @method('HEAD') --}}
                <div class="form-group">
                    <label class="control-label" for="personale_id">Employee ID</label>
                    <div class="input-group input-group-sm">
                        <input name="personale_id" type="text" id="personale_id" class="form-control"
                            value="{{$employee->driverid}}" disabled>


                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label" for="personale_id">Employee Full Name</label>
                    <div class="input-group input-group-sm">
                        <input name="personale_id" type="text" id="personale_id" class="form-control"
                            value="{{$employee->fullname}}" disabled>


                    </div>

                </div>
                <input name="personale_id" type="hidden" id="personale_id" value="{{$employee->id}}">
                @include('hrm.personale.education.form')
        </div>
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
    </div>
</div>

<div class="card-footer">

</div>

</form>
</div>
</div>

@endsection
