@extends( 'master.app' )
@section( 'title', 'TIMS | Personale show' )
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
    </li>
    <li class="breadcrumb-item active">Personale</li>
    <li class="breadcrumb-item active">Show</li>
</ol>


<div class="col-md-12">
    <div class="card text-left">

        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Details Driver ID Number {{$personale->driverid}} </h2>
                <div class="ml-auto">
                    <a href="{{route('personale')}}" class="btn btn-outline-primary"> <i class="fa fa-backward mr-1"
                            aria-hidden="true"> Back</i> </a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">ID Number</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$personale->driverid}}</h4>
                        </div>
                    </div>

                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Full Name</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$personale->fullname}}</h4>
                        </div>
                    </div>

                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Sex</label>
                        <div class="col-lg-8">


                            <h4 class="col-form-label "> {{$personale->sex}}</h4>

                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Birth Date</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$personale->birthdate}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Sub City</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$personale->zone}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Worda</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$personale->woreda}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Keble</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$personale->kebele}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">House Number</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$personale->housenumber}}</h4>
                        </div>
                    </div>


                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Hired Date</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$personale->hireddate}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Driver ?</label>
                        <div class="col-lg-8">

                            @if ($personale->driver == 1)

                            <h4 class="col-form-label ">Driver</h4>
                            @else
                            <h4 class="col-form-label ">Not Driver</h4>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Department</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$personale->department->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Job's Title</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$personale->position->name}}</h4>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-4">
                        <div class='ml-1 p-1'>
                            <a href="{{route('personale.edit',$personale->id)}}" class="btn btn-info"> <i
                                    class="fa fa-edit"></i> Edit </a>
                        </div>
                    </div>

                    <div class='m-1 p-1'>
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$personale->id}})"
                            data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- Button trigger modal -->

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
                            <p class="text-center">Are You Sure Want To Delete ? Employee <span
                                    class="font-weight-bold"> {{$personale->fullname}}</span> </p>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="" class="btn btn-danger" data-dismiss="modal"
                                    onclick="formSubmit()">Yes, Delete</button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @endsection
        @section('javascript')
        <script>
            function deleteData(id)
     {
         var id = id;
         var url = '{{ route("personale.destroy", ":id") }}';
		//  http://localhost:8000/personale/destroy/:id

         url = url.replace(':id', id);

         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
        </script>
        @endsection
