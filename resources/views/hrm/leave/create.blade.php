@extends( 'master.app' )
@section( 'title', 'TIMS | Driver Registration' )

@section( 'content' )

<div class="col-md-12">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Employee Registration</li>
        </ol>
    </nav>
    <div class="card text-left">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <h2>leave Registration</h2>
                {{-- <!-- @can('driver create') --> --}}
                <div class="ml-auto">
                    <a href="{{route('leave.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
                {{-- <!-- @endcan --> --}}
            </div>

        </div>
        <div class="card-body">
            <h1>Create Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            {{-- <form method="post" action="{{route('leave.store')}}" class="form-horizontal" id="driver_reg" novalidate>
                @csrf
                @include('hrm.leave.form')
                <div class="d-flex align-items-center mt-4">
                    <div class="form-group 	required ">
                        <label class="control-label" for="job"></label>
                        This Field must have value</div> --}}
                    {{-- @can('customer create') --}}

                    {{-- <div class="form-group ml-auto">
                        <button type="submit" class="btn btn-primary" name="save"> <i class="fas fa-save mr-1"
                                aria-hidden="true"></i>Save</button>

                    </div>
                </div>

        </form> --}}
        <example-component></example-component>
        </div>

        <div class="card-footer">
            <div id="append_pay_grade_level">
                @include('hrm.leave.append')
            </div>

            @section('scripts')
            <script>
            $('#personale_id').change(function(){
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            let personale_id= $(this).val();
            $.ajax({
            type:'post',
            url: '/hrm/leave/append',
            data: {personale_id:personale_id},
            success: function(res){
            // console.log(res)
            $('#append_pay_grade_level').html(res);
            },
            error: function(){
            console.log("eror")
            }
            });
            });
            </script>
            @endsection
        </div>

    </div>
</div>

@endsection
