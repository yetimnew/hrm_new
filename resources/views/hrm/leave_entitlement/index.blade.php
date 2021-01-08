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
            <div class="col-md-12">
                <div class="card text-left col-md-12">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4>All leave_entitlements</h4>
                            {{-- @can('customer create') --}}

                            <div class="ml-auto">
                                <a href="{{route('leave_entitlement.create')}}" class="btn btn-outline-primary btn-sm"><i
                                        class="fas fa-plus mr-1"></i>Add Leave Entitlment</a>

                            </div>
                            {{-- @endcan --}}
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table-sm table table-bordered table-sm table-striped" id="personales">
                                <thead>
                                    <tr>
                                        <th class="m-1 b-1" width="3%">ተ/ቁ</th>
                                        <th class="m-1 b-1">ሙሉ ስም</th>
                                        <th class="m-1 b-1"> የፍቃድ ብዛት</th>
                                        <th class="m-1 b-1"> የተጠቀመው ፍቃድ</th>
                                        <th class="m-1 b-1"> የፍቃድ ዓይነት</th>
                                        <th class="m-1 b-1"> በጀት ዓመት</th>
                                        <th class="m-1 b-1"> ምርመራ</th>
                                        <th class="m-1 b-1" width="3%">Edit</th>
                                        <th class="m-1 b-1" width="3%">Delete</th>
                                        {{-- @endcan --}}


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0 ?>
                                    @if ($leave_entitlements->count() > 0)
                                    @foreach ($leave_entitlements as $leave_entitlement)
                                    <tr>
                                        <input type="hidden" class="deleted_value_id" value="{{$leave_entitlement->id}}">
                                        <td class='p-1'>{{++$no}}</td>
                                        <td class='p-1'>{{$leave_entitlement->personal->fullname}}</td>
                                        <td class='p-1'>{{$leave_entitlement->no_of_days}}</td>
                                        <td class='p-1'>{{$leave_entitlement->days_used}}</td>
                                        <td class='p-1'>{{$leave_entitlement->leave_type->name}}</td>
                                        <td class='p-1'>{{$leave_entitlement->leave_period->name}}</td>
                                        <td class='p-1'>{{$leave_entitlement->note}}</td>

                                        {{-- @can('driver edit') --}}
                                        <td class='p-1 text-center' data-toggle="tooltip" data-placement="top"
                                            title="edit">
                                            <a href="{{route('leave_entitlement.edit', $leave_entitlement->id)}}"><i
                                                    class="fas fa-edit"></i></a>
                                        </td>
                                        <td class='p-1 text-center' data-toggle="tooltip" data-placement="top"
                                            title="delete">
                                            <button id="delete_leave_entitlement" class="delete_leave_entitlement red"> <i
                                                    class="fas fa-trash" aria-hidden="true"></i></button>
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
    </div>
</section>
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

            $('.delete_leave_entitlement').click(function (e) {

    e.preventDefault();
    var deleted_id = $(this).closest("tr").find('.deleted_value_id').val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this record!",
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
                var urlPath = '/hrm/leave_entitlement/'+ deleted_id;
                // alert(urlPath);

                $.ajax({
                    type: "DELETE",
                    url:  urlPath,
                    data: data,
                    dataType: "JSON",
                    success: function (response) {
                        // swal("Your imaginary file is safe!");
                        console.log(response.success);
                        swal(response.success, {
                        icon: 'success',
                        }).then((result)=>{
                            location.reload();
                        });
                    },
                    error:function(){
                        swal("Your imaginary file is safe!");
                    }
                });

            }
            });

            });
            } );


</script>

@endsection
