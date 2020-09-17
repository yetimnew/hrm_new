@extends( 'master.app' )
@section( 'title', 'TIMS | Job Ident' )

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
                <h2>All Job Ident Type </h2>
                {{-- @can('customer create') --}}

                <div class="ml-auto">
                    <a href="{{route('job_ident.create')}}" class="btn btn-outline-primary"><i
                            class="fas fa-plus mr-1"></i>Add Job Ident Type</a>

                </div>
                {{-- @endcan --}}
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table-sm table table-bordered table-sm table-striped" id="job_ident">
                    <thead>
                        <tr>
                            <th class="m-1 b-1" width="3%">No</th>
                            <th class="m-1 b-1">Name</th>
                            <th class="m-1 b-1">Job System</th>
                            <th class="m-1 b-1">Mechanic Hr</th>
                            <th class="m-1 b-1">Ass Mechanic Hr</th>
                            <th class="m-1 b-1">Ass Mechanic Hr</th>
                            <th class="m-1 b-1"> Comments</th>
                            {{-- @can('driver edit') --}}
                            <th class="m-1 b-1" width="3%">Edit</th>
                            <th class="m-1 b-1" width="3%">Delete</th>
                            {{-- @endcan --}}


                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0 ?>
                        @if ($jobidents->count()> 0)
                        @foreach ($jobidents as $jobident)
                        <tr>
                            <td class='p-1'>{{++$no}}</td>
                            <td class='p-1'>{{$jobident->name}}</td>
                            <td class='p-1'>{{$jobident->jobsystem->name ?? ''}}</td>
                            <td class='p-1 text-center'>{{$jobident->mechanic_hours_mercedes}}</td>
                            <td class='p-1 text-center'>{{$jobident->mechanic_hours_tracker}}</td>
                            <td class='p-1 text-center'>{{$jobident->mechanic_hours_190e}}</td>
                            <td class='p-1 text-center'>{{$jobident->ass_mechanic_renault}}</td>

                            {{-- @can('driver edit') --}}
                            <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="details">
                                <a href="{{route('job_ident.edit', $jobident->id)}}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="details">
                                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$jobident->id}})"
                                    data-target="#DeleteModal"><i class="fas fa-trash red"></i>
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
                                {{$jobident->name}}</span> </p>
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
</div>


@endsection
@section('scripts')

<script>
    function deleteData(id){
         var id = id;
         var url = '{{ route("job_ident.destroy", ":id") }}';
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
            $('#job_ident').DataTable();
                    });
</script>
@endsection
