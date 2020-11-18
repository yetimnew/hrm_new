@extends( 'master.app' )
@section( 'title', 'TIMS | Driver' )

@section('content')
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
    <div class="container">
        <div class="row bg-white has-shadow">
            <div class="card text-left col-md-12">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4>All personales </h4>
                        {{-- @can('customer create') --}}

                        <div class="ml-auto">
                            <a href="{{route('personale.create')}}" class="btn btn-outline-primary btn-sm"><i
                                    class="fas fa-plus mr-1"></i>Add Employees</a>

                        </div>
                        {{-- @endcan --}}
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table-sm table table-bordered table-sm table-striped" id="personales">
                            <thead>
                                <tr>
                                    <th class="m-1 b-1" width="3%">No</th>
                                    <th class="m-1 b-1">Image</th>
                                    <th class="m-1 b-1">ID</th>
                                    <th class="m-1 b-1"> Full Name</th>
                                    <th class="m-1 b-1"> Department</th>
                                    <th class="m-1 b-1">Job Title</th>
                                    <th class="m-1 b-1">HireDate</th>
                                    <th class="m-1 b-1">Status</th>
                                    {{-- @can('driver edit') --}}
                                    <th class="m-1 b-1" width="3%">details</th>
                                    {{-- @endcan --}}


                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0 ?>
                                @if ($personales->count()> 0)
                                @foreach ($personales as $personale)
                                <tr>
                                    <td class='p-1'>{{++$no}}</td>
                                    <td class='p-1'><img src="/images/thumbnail/{{ $personale->image }}" alt=""
                                            class="rounded-circle" width="40" height="40"></td>
                                    <td class='p-1'>{{$personale->driverid}}</td>
                                    <td class='p-1'>{{$personale->fullname}}</td>
                                    <td class='p-1'>{{$personale->department->name}}</td>
                                    <td class='p-1'>{{$personale->jobtitle->name }}</td>
                                    <td class='p-1'>{{$personale->hireddate}}</td>
                                    <td class='p-1'>{{$personale->status}}</td>
                                    {{-- @can('driver edit') --}}
                                    <td class='p-1 text-center' data-toggle="tooltip" data-placement="top"
                                        title="details">
                                        <a href="{{route('personale.show', $personale->id)}}"><i
                                                class="fas fa-edit"></i></a>
                                    </td>
                                    {{-- @endcan --}}
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class='m-1 p-1 text-center' colspan="15">No Data Avilable</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</section>



@endsection
@section('scripts')
<script>
    $(document).ready( function () {
        $('#personales').DataTable();
                } );
</script>

@endsection
