@extends( 'master.app' )
@section( 'title', 'TIMS | Job Type' )

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
                <h2>All Jpb Card Type </h2>
                {{-- @can('customer create') --}}

                <div class="ml-auto">
                    <a href="{{route('job_type.create')}}" class="btn btn-outline-primary"><i
                            class="fas fa-plus mr-1"></i>Add Job Card Type</a>

                </div>
                {{-- @endcan --}}
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table-sm table table-bordered table-sm table-striped" id="job_type">
                    <thead>
                        <tr>
                            <th class="m-1 b-1" width="3%">No</th>
                            <th class="m-1 b-1">Name</th>
                            <th class="m-1 b-1"> Comments</th>
                            <th class="m-1 b-1">Status</th>
                            {{-- @can('driver edit') --}}
                            <th class="m-1 b-1" width="3%">Edit</th>
                            <th class="m-1 b-1" width="3%">Delete</th>
                            {{-- @endcan --}}


                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0 ?>
                        @if ($jobtypes->count()> 0)
                        @foreach ($jobtypes as $jobsystem)
                        <tr>
                            <td class='p-1'>{{++$no}}</td>
                            <td class='p-1'>{{$jobsystem->name}}</td>
                            <td class='p-1'>{{$jobsystem->comment}}</td>
                            <td class='p-1'>{{$jobsystem->status}}</td>

                            {{-- @can('driver edit') --}}
                            <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="details">
                                <a href="{{route('job_type.edit', $jobsystem->id)}}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="details">
                                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$jobsystem->id}})"
                                    data-target="#DeleteModal" class=""><i class="fas fa-trash red"></i>
                                </a>
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
    <!-- Modal -->
    <div id="DeleteModal" class="modal fade text-danger" role="dialog">
        <div class="modal-dialog ">
            <!-- Modal content-->
            <form action="" id="deleteForm" method="post">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h4 class="modal-title text-center text-white">DELETE CONFIRMATION</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <p class="text-center">Are You Sure Want To Delete ? Down time <span class="font-weight-bold">
                                {{$jobsystem->name}}</span> </p>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal"
                            onclick="formSubmit()">Yes, Delete</button>

                    </div>
                </div>
            </form>
        </div>
    </div>


    @endsection
    @section('scripts')

    <script>
        function deleteData(id){
         var id = id;
         var url = '{{ route("job_type.destroy", ":id") }}';
         url = url.replace(':id', id);

         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
    </script>
    <script>
        $(document).ready( function () {
        $('#job_type').DataTable();
                } );
    </script>
    @endsection
