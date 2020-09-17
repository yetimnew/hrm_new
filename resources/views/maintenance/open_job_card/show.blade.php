@extends( 'master.app' )
@section( 'title', 'TIMS | Job Card show' )
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
                <h2>Details Driver ID Number {{$ojc->driverid}} </h2>
                <div class="ml-auto">
                    <a href="{{route('open_job_card.index')}}" class="btn btn-outline-primary"> <i
                            class="fas fa-backward mr-1" aria-hidden="true"> Back</i> </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Job_card_number</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$ojc->Job_card_number}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">opening_date</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$ojc->opening_date}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Workshop Name</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label "> {{$ojc->workshop->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Truck Plate</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label "> {{$ojc->truck->plate}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Customer Name</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$ojc->customer->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">job_system_id</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">
                                <ol>
                                    @foreach ($job_systems as $job_system)
                                    <li>{{$job_system->name}}</li>
                                    @endforeach
                                </ol>
                            </h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">job_ident_id</label>
                        <div class="col-lg-8">
                            <p class="col-form-label ">
                                <ol>
                                    @foreach ($job_idents as $job_ident)
                                    <li>{{$job_ident->name}}</li>
                                    @endforeach
                                </ol>
                            </p>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">km_reading</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$ojc->km_reading}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">km_reading_date</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$ojc->km_reading_date}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Driver Name</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$ojc->driver->fullname}}</h4>
                        </div>
                    </div>

                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">mechanic_id</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$ojc->driver->fullname}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">ass_mechanic_id</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$ojc->driver->fullname}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">opening_clerk_id</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$ojc->driver->fullname}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">receptionist_id</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$ojc->driver->fullname}}</h4>
                        </div>
                    </div>

                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Coment</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$ojc->comment}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class='col-3'>
                        <a href="{{route('open_job_card.edit',$ojc->id)}}" class="btn btn-info"> <i
                                class="fas fa-edit"></i> Edit
                        </a>
                    </div>
                    <div class='col-4 m-1 p-1'>
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$ojc->id}})"
                            data-target="#DeleteModal" class="btn btn-danger"><i class="fas fa-trash"> </i>
                            Delete</a>
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
                                    class="font-weight-bold">
                                    {{$ojc->fullname}}</span> </p>
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
         var url = '{{ route("open_job_card.destroy", ":id") }}';
         url = url.replace(':id', id);

         $("#deleteForm").attr('action', url);
            }

            function formSubmit()
            {
                $("#deleteForm").submit();
            }
        </script>
        @endsection
