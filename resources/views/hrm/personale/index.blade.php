@extends( 'master.app' )
@section( 'title', 'TIMS | Driver' )

@section( 'styles' )

<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}">
@endsection

@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
    </li>
    <li class="breadcrumb-item active">Driver</li>
</ol>

<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>All personales </h2>
                {{-- @can('customer create') --}}

                <div class="ml-auto">
                    <a href="{{route('personale.create')}}" class="btn btn-outline-primary"><i
                            class="fafa-plus mr-1"></i>Add Employees</a>

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
                            <th class="m-1 b-1">drivereID</th>
                            <th class="m-1 b-1"> Full Name</th>
                            <th class="m-1 b-1"> birthdate</th>
                            <th class="m-1 b-1">Telephone</th>
                            <th class="m-1 b-1">HireDate</th>
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
                            <td class='p-1'>{{$personale->driverid}}</td>
                            <td class='p-1'>{{$personale->fullname}}</td>
                            <td class='p-1 text-center'>{{$personale->birthdate}}</td>
                            <td class='p-1 text-center'>{{$personale->mobile}}</td>
                            <td class='p-1 text-center'>{{$personale->hireddate}}</td>
                            {{-- @can('driver edit') --}}
                            <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="details">
                                <a href="{{route('personale.show', $personale->id)}}"><i class="fa fa-edit"></i></a>
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


    @endsection
    @section('javascript')

    <script>
        $( document ).ready( function () {
				$( '#personales' ).DataTable( {

				"pageLength": 25,
				// "scrollY": 100,
				'columnDefs': [ {

				// 'targets': [11,12,13], /* column index */

				'orderable': false, /* true or false */

				}]
				});

			} );
    </script>
    @endsection
