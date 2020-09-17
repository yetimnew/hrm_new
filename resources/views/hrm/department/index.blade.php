@extends( 'master.app' )
@section( 'title', 'TIMS | Driver' )

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
                    <a href="{{route('department.create')}}" class="btn btn-outline-primary"><i
                            class="fas fa-plus mr-1"></i>Add department</a>

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
                            <th class="m-1 b-1">Name</th>
                            <th class="m-1 b-1"> Description</th>
                            <th class="m-1 b-1" width="3%">Edit</th>
                            <th class="m-1 b-1" width="3%">Delete</th>
                            {{-- @endcan --}}


                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0 ?>
                        @if ($departments->count()> 0)
                        @foreach ($departments as $department)
                        <tr>
                            <input type="hidden" class="deleted_value_id" value="{{$department->id}}">
                            <td class='p-1'>{{++$no}}</td>
                            <td class='p-1'>{{$department->name}}</td>
                            <td class='p-1'>{{$department->comment}}</td>
                            {{-- @can('driver edit') --}}
                            <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="details">
                                <a href="{{route('department.edit', $department->id)}}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td class='p-1 text-center' title="details">
                                <button type="submit" id="delete_department"
                                    class="btn btn-primary delete_department">Delete</button>
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
<!-- Modal -->

@endsection
@section('scripts')
<script type="application/javascript">
    $( document ).ready( function () {
                $( '#personales' ).DataTable();
                $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
$('.delete_department').click(function (e) {

    e.preventDefault();
    var deleted_id = $(this).closest("tr").find('.deleted_value_id').val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                var data = {
                    "_token": "{{ csrf_token() }}",
                    "id": deleted_id
                }
                var urlPath = 'hrm/department/destroy/'+ deleted_id;
                alert(urlPath);


                $.ajax({
                    type: "DELETE",
                    url:  urlPath,
                    data: data,
                    success: function (response) {
                        swal(response.status, {
                        icon: "success"
                        });
                    },
                    error:function(){
                        swal("Your imaginary file is safe!");
                    }
                });

            } else {
                swal("Your imaginary file is safe!");
            }
            });

            });
            } );

</script>

@endsection