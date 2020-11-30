@extends( 'master.app' )
@section( 'title', 'TIMS | Truck Update' )
@section( 'content' )

<header class="page-header">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>
</header>
<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <div class="col-md-12">
                <div class="card text-left col-md-12">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4>Personale Update <strong class="blue">{{$leave_type->name}}</strong></h4>
                            {{-- @can('driver edit') --}}
                            <div class="ml-auto">
                                <a href="{{route('leave_type.index')}}" class="btn btn-outline-primary btn-sm">
                                    <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                            </div>
                            {{-- @endcan --}}
                        </div>

                    </div>
                    <div class="card-body">

                        <form method="post" action="{{route('leave_type.update',$leave_type->id)}}" class="form-horizontal"
                            id="driver_reg" novalidate>
                            @csrf
                            @method('PATCH')
                            @include('hrm.leave_type.form')

                            <div class="d-flex align-items-center mt-4">
                                <div class="form-group 	required ">
                                    <label class="control-label" for="job"></label>
                                    This Field must have value</div>
                                {{-- @can('customer create') --}}

                                <div class="form-group ml-auto">
                                    <button type="submit" class="btn btn-primary btn-sm" name="save"> <i
                                            class="fas fa-save mr-1" aria-hidden="true"></i>Save Update</button>

                                </div>
                            </div>


                            <div class="card-footer">

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
