@extends( 'master.app' )
@section( 'title', 'TIMS | Personale show' )
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
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <h4>Details Driver ID Number {{$personale->driverid}} </h4>
                    <div class="ml-auto">
                        <a href="{{route('personale.index')}}" class="btn btn-outline-primary"> <i
                                class="fas fa-backward mr-1" aria-hidden="true"> Back</i> </a>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-group 	required">
                    <label class="control-label">Driver ID</label>
                    <div class="input-group-sm">
                        <input name="driverid" type="text" id="driverid"
                            class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                            value="{{old('driverid') ?? $personale->driverid}}" disabled>

                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label">First Name</label>

                    <div class="input-group-sm">
                        <input name="firstname" type="text" id="firstname"
                            class="form-control select {{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                            value="{{old('firstname') ?? $personale->firstname}}" disabled>


                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="fathername">Father Name</label>

                    <div class="input-group-sm">
                        <input name="fathername" type="text" id="fathername"
                            class="form-control select {{ $errors->has('fathername') ? ' is-invalid' : '' }}"
                            value="{{old('fathername') ?? $personale->fathername}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="gfathername">Grand Father Name</label>
                    <div class="input-group-sm">
                        <input name="gfathername" type="text" id="gfathername"
                            class="form-control select {{ $errors->has('gfathername') ? ' is-invalid' : '' }}"
                            value="{{old('gfathername') ?? $personale->gfathername}}" disabled>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="sex">Sex</label>
                    <select name="sex" id="sex" required
                        class="form-control form-control-sm {{ $errors->has('sex') ? ' is-invalid' : '' }}" disabled>
                        @if ($personale->sex == 1)
                        <option class="dropup" value="0" selected>Male </option>
                        <option class="dropup" value="1">Fmale</option>
                        @else
                        <option class="dropup" value="1" selected>Fmale</option>
                        <option class="dropup" value="0">Male</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="birthdate">Birth Date</label>
                    <div class="input-group input-group-sm">
                        <input name="birthdate" type="text" id="birthdate"
                            class="form-control  {{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                            value="{{old('birthdate') ?? $personale->birthdate}}" disabled>

                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label" for="hireddate">Hired Date</label>
                    <div class="input-group input-group-sm">
                        <input name="hireddate" type="text" id="hireddate"
                            class="form-control"
                            value="{{old('hireddate') ?? $personale->hireddate}}" disabled>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label" for="driver">Driver</label>

                    <select name="driver" class="form-control form-control-sm" id="driver" required>
                        @if ($personale->driver == 1)
                        <option class="dropup" value="1" selected disabled>Yes </option>
                        @endif
                        @if ($personale->driver == 0)
                        <option class="dropup" value="0" selected disabled>No </option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="hireddate">Pay Grade</label>
                    <div class="input-group input-group-sm">
                        <input name="hireddate" type="text" id="hireddate"
                            class="form-control"
                            value="{{old('hireddate') ?? $personale->pay_grade->name}}" disabled>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="hireddate">Pay Grade Level</label>
                    <div class="input-group input-group-sm">
                        <input name="hireddate" type="text" id="hireddate"
                            class="form-control"
                            value="{{old('hireddate') ??   $personale->pay_grade->pay_grade_levels }}" disabled>


                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-group  required">
                    <label class="control-label" for="department_id">Department Name</label>
                    <div class="input-group-sm">
                        <select name="department_id" id="department_id"
                            class="form-control {{ $errors->has('department_id') ? ' is-invalid' : '' }}" disabled>
                            <option class="dropup" value="" selected disabled> {{$personale->department->name}}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group  required">
                    <label class="control-label" for="position_id">position_id Title</label>
                    <div class="input-group-sm">
                        <select name="position_id" id="position_id"
                            class="form-control {{ $errors->has('position_id') ? ' is-invalid' : '' }}" disabled>
                            <option class="dropup" value="" selected disabled> {{$personale->jobtitle->name}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="employment_status">employment_status</label>
                    <select name="employment_status" id="employment_status" required
                        class="form-control form-control-sm {{ $errors->has('employment_status') ? ' is-invalid' : '' }}"
                        disabled>
                        @if ($personale->employment_status == 1)
                        <option class="dropup" value="1" selected>Permanent</option>
                        @else
                        <option class="dropup" value="0" selected>Contract</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="status">status</label>
                    <div class="input-group input-group-sm">
                        @if ($personale->status == 1)
                        <div class="alert alert-primary" role="alert">
                            Active
                        </div>
                        @else
                        <div class="alert alert-danger" role="alert">
                            Inactive
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="marital_status">marital_status</label>

                    <select name="marital_status" id="marital_status" required
                        class="form-control form-control-sm {{ $errors->has('marital_status') ? ' is-invalid' : '' }}"
                        disabled>
                        @if ($personale->marital_status == 1)
                        <option class="dropup" value="1" selected>Single</option>
                        @else
                        <option class="dropup" value="0" selected>Maried</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="birthdate">Image</label>

                    <img src="/images/thumbnail/{{ $personale->image }}" alt="" class="rounded mx-auto d-block"
                        width="200" height="200">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <fieldset class="border p-2">
                    <legend class="w-auto">Contact Details</legend>
                    <div class="form-group">
                        <label class="control-label" for="zone">zone</label>
                        <div class="input-group input-group-sm">
                            <input name="zone" type="text" id="zone"
                                class="form-control  {{ $errors->has('zone') ? ' is-invalid' : '' }}"
                                value="{{old('zone') ?? $personale->zone}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="woreda">woreda</label>
                        <div class="input-group input-group-sm">
                            <input name="woreda" type="text" id="woreda"
                                class="form-control  {{ $errors->has('woreda') ? ' is-invalid' : '' }}"
                                value="{{old('woreda') ?? $personale->woreda}}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="city">city</label>
                            <div class="input-group input-group-sm">
                                <input name="city" type="text" id="city"
                                    class="form-control  {{ $errors->has('city') ? ' is-invalid' : '' }}"
                                    value="{{old('city') ?? $personale->city}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="sub_city">sub_city</label>
                                <div class="input-group input-group-sm">
                                    <input name="sub_city" type="text" id="sub_city"
                                        class="form-control  {{ $errors->has('sub_city') ? ' is-invalid' : '' }}"
                                        value="{{old('sub_city') ?? $personale->sub_city}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="kebele">kebele</label>
                                <div class="input-group input-group-sm">
                                    <input name="kebele" type="text" id="kebele"
                                        class="form-control  {{ $errors->has('kebele') ? ' is-invalid' : '' }}"
                                        value="{{old('kebele') ?? $personale->kebele}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="housenumber">housenumber</label>
                                <div class="input-group input-group-sm">
                                    <input name="housenumber" type="text" id="housenumber"
                                        class="form-control  {{ $errors->has('housenumber') ? ' is-invalid' : '' }}"
                                        value="{{old('housenumber') ?? $personale->housenumber}}" disabled>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="mobile">mobile</label>
                                <div class="input-group input-group-sm">
                                    <input name="mobile" type="text" id="mobile"
                                        class="form-control  {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                        value="{{old('mobile') ?? $personale->mobile}}" disabled>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="home_telephone">home_telephone</label>
                                <div class="input-group input-group-sm">
                                    <input name="home_telephone" type="text" id="home_telephone"
                                        class="form-control  {{ $errors->has('home_telephone') ? ' is-invalid' : '' }}"
                                        value="{{old('home_telephone') ?? $personale->home_telephone}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="work_telephone">work_telephone</label>
                                <div class="input-group input-group-sm">
                                    <input name="work_telephone" type="text" id="work_telephone"
                                        class="form-control  {{ $errors->has('work_telephone') ? ' is-invalid' : '' }}"
                                        value="{{old('work_telephone') ?? $personale->work_telephone}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">email</label>
                                <div class="input-group input-group-sm">
                                    <input name="email" type="text" id="email"
                                        class="form-control  {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        value="{{old('email') ?? $personale->email}}" disabled>
                                </div>
                            </div>
                </fieldset>
                <div class="row">
                    <div class='col-4'>
                        <a href="{{route('personale.edit',$personale->id)}}" class="btn btn-info btn-sm btn-block"> <i
                                class="fas fa-edit"></i> Edit </a>
                    </div>
                    @if ($personale->status == 0)
                    <div class="col-4">
                        <form method="post" action="{{route('personale.activate',$personale->id)}}"
                            class="form-horizontal" id="driver_reg" novalidate>
                            @csrf
                            @method('POST')
                            <div>
                                <button type="submit" class="btn btn-primary  btn-sm btn-block" name="save"><i
                                        class="fas fa-signal"> </i>
                                    Activate</button>
                            </div>
                        </form>

                    </div>
                    @endif
                    @if ($personale->status == 1)
                    <div class='col-4 '>
                        <a href="{{route('personale.deactivate',$personale->id)}}"
                            class="btn btn-el btn-outline-primary ml-auto btn-sm"> <i class="fa fa-edit"></i>
                            Deactivate
                        </a>
                    </div>
                    @endif
                    <div class='col-4 '>
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$personale->id}})"
                            data-target="#DeleteModal" class="btn btn-danger btn-sm"><i class="fas fa-trash"> </i>
                            Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if ($personale->active)
{{ dd("is active")}}
@endif
<section class="dashboard-counts no-padding-bottom">
    <div class="container">
        <div class="row bg-white has-shadow">
            <div class="col-12 m-3">
                <div class="d-flex align-items-center">
                    <h4>All Dependants </h4>
                    {{-- @can('customer create') --}}
                    <div class="ml-auto mr-2">
                        <a href="{{route('employees_dependant.create', $personale->id)}}"
                            class="btn btn-outline-primary btn-sm"><i class="fas fa-plus mr-1"></i>Add Dependants</a>
                    </div>
                    {{-- @endcan --}}
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Relashihip</th>
                        <th scope="col">relashiship type</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($emergency_dependant->count() > 0)
                    <?php $no = 1 ?>

                    @foreach ($emergency_dependant as $item)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->relationship}}</td>
                        <td>{{$item->relationship_type}}</td>
                        <td>{{$item->date_of_birth}}</td>
                        <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="edit">
                            <a href="{{route('employees_dependant.edit', $item->id)}}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td class='p-1 text-center'>
                            <form method="POST" action="{{route('employees_dependant.destroy', $item->id)}}"
                                id="deactivate1-form-{{$item->id}}" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="btn btn-sm" type="submit" onclick="if(confirm('Are you sure to delete Dependant? if your answer is yes you don\'t restore it. ')){
                            event.preventDefault();
                            document.getElementById('deactivate1-form-{{$item->id}}').submit();
                                }else{
                                    event.preventDefault();
                                }"> <i class="fas fa-trash red"></i>

                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class='m-1 p-1 text-center' colspan="12">No Dependant Data Avilable</td>
                    </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</section>
<section class="dashboard-counts no-padding-bottom">
    <div class="container">
        <div class="row bg-white has-shadow">
            <div class="col-12 m-3">
                <div class="d-flex align-items-center">
                    <h4>All Emergency Contact </h4>
                    {{-- @can('customer create') --}}

                    <div class="ml-auto mr-2">
                        <a href="{{route('emergence_contact.create', $personale->id)}}"
                            class="btn btn-outline-primary btn-sm"><i class="fas fa-plus mr-1"></i>Add Emergency
                            contact</a>

                    </div>
                    {{-- @endcan --}}
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Relashihip</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Home Telephone</th>
                        <th scope="col">Work Telephone</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($emergency_contact->count()> 0)
                    <?php $no = 1 ?>
                    @foreach ($emergency_contact as $ec)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$ec->name}}</td>
                        <td>{{$ec->relationship}}</td>
                        <td>{{$ec->mobile}}</td>
                        <td>{{$ec->home_telephone}}</td>
                        <td>{{$ec->work_telephone}}</td>
                        <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="edit">
                            <a href="{{route('emergence_contact.edit', $ec->id)}}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td class='p-1 text-center'>
                            <form method="POST" action="{{route('emergence_contact.destroy', $ec->id)}}"
                                id="deactivate-form-{{$ec->id}}" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="btn btn-sm" type="submit" onclick="if(confirm('Are you sure to delete Emergency Contact? if your answer is yes you don\'t restore it. ')){
                            event.preventDefault();
                            document.getElementById('deactivate-form-{{$ec->id}}').submit();
                                }else{
                                    event.preventDefault();
                                }"> <i class="fas fa-trash red"></i>

                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class='m-1 p-1 text-center' colspan="12">No Data Avilable</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
<section class="dashboard-counts no-padding-bottom">
    <div class="container">
        <div class="row bg-white has-shadow">
            <div class="col-12 m-3">
                <div class="d-flex align-items-center">
                    <h4>Experiance Details </h4>
                    {{-- @can('customer create') --}}

                    <div class="ml-auto mr-2">
                        <a href="{{route('experience.create', $personale->id)}}"
                            class="btn btn-outline-primary btn-sm"><i class="fas fa-plus mr-1"></i>Add
                            Experiance</a>

                    </div>
                    {{-- @endcan --}}
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Employer</th>
                        <th scope="col">job_title</th>
                        <th scope="col">from_date</th>
                        <th scope="col">to_date</th>
                        <th scope="col">comment</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($experiences ->count()> 0)
                    <?php $no = 1 ?>
                    @foreach ($experiences as $ec)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$ec->employer}}</td>
                        <td>{{$ec->job_title}}</td>
                        <td>{{$ec->from_date}}</td>
                        <td>{{$ec->to_date}}</td>
                        <td>{{$ec->comment}}</td>

                        <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="edit">
                            <a href="{{route('experience.edit', $ec->id)}}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td class='p-1 text-center'>
                            <form method="POST" action="{{route('experience.destroy', $ec->id)}}"
                                id="deactivate-form3-{{$ec->id}}" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="btn btn-sm" type="submit" onclick="if(confirm('Are you sure to delete  Experiance? if your answer is yes you don\'t restore it. ')){
                            event.preventDefault();
                            document.getElementById('deactivate-form3-{{$ec->id}}').submit();
                                }else{
                                    event.preventDefault();
                                }"> <i class="fas fa-trash red"></i>

                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class='m-1 p-1 text-center' colspan="12">No Data Avilable</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- Button trigger modal -->
<section class="dashboard-counts no-padding-bottom">
    <div class="container">
        <div class="row bg-white has-shadow">
            <div class="col-12 m-3">
                <div class="d-flex align-items-center">
                    <h4>Education Details </h4>
                    {{-- @can('customer create') --}}

                    <div class="ml-auto mr-2">
                        <a href="{{route('education.create', $personale->id)}}"
                            class="btn btn-outline-primary btn-sm"><i class="fas fa-plus mr-1"></i>Add
                            Education</a>

                    </div>
                    {{-- @endcan --}}
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">institute</th>
                        <th scope="col">minor</th>
                        <th scope="col">score</th>
                        <th scope="col">award</th>
                        <th scope="col">start_date</th>
                        <th scope="col">end_date</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($educations ->count()> 0)
                    <?php $no = 1 ?>
                    @foreach ($educations as $education)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$education->name}}</td>
                        <td>{{$education->institute}}</td>
                        <td>{{$education->minor}}</td>
                        <td>{{$education->score}}</td>
                        <td>{{$education->award}}</td>
                        <td>{{$education->start_date}}</td>
                        <td>{{$education->end_date}}</td>

                        <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="edit">
                            <a href="{{route('education.edit', $education->id)}}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td class='p-1 text-center'>
                            <form method="POST" action="{{route('education.destroy', $education->id)}}"
                                id="deactivate-form4-{{$education->id}}" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="btn btn-sm" type="submit" onclick="if(confirm('Are you sure to delete  Experiance? if your answer is yes you don\'t restore it. ')){
                            event.preventDefault();
                            document.getElementById('deactivate-form4-{{$education->id}}').submit();
                                }else{
                                    event.preventDefault();
                                }"> <i class="fas fa-trash red"></i>

                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class='m-1 p-1 text-center' colspan="12">No Data Avilable</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>

@if ($promotion->count() >0)

<section class="dashboard-counts no-padding-bottom">
    <div class="container">
        <div class="row bg-white has-shadow">
            <div class="col-12 m-3">
                <div class="d-flex align-items-center">
                    <h4>Promotion Details </h4>
                    {{-- @can('customer create') --}}
                    {{-- <div class="ml-auto mr-2">
                        <a href="{{route('education.create', $personale->id)}}"
                            class="btn btn-outline-primary btn-sm"><i class="fas fa-plus mr-1"></i>Add
                            Education</a>

                    </div> --}}
                    {{-- @endcan --}}
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th class="m-1 b-1">personale_id</th>
                        <th class="m-1 b-1"> department_id</th>
                        <th class="m-1 b-1"> jobtitle_id</th>
                        <th class="m-1 b-1"> pay_grade_id</th>
                        <th class="m-1 b-1"> pay_grade_level_id</th>
                        <th class="m-1 b-1"> start_date</th>
                        <th class="m-1 b-1"> comment</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($promotion ->count()> 0)
                    <?php $no = 1 ?>
                    @foreach ($promotion as $promo)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td class='p-1'>{{$promo->personal->fullName}}</td>
                        <td class='p-1'>{{$promo->department->name}}</td>
                        <td class='p-1'>{{$promo->jobtitle->name}}</td>
                        <td class='p-1'>{{$promo->paygrade->name}}</td>
                        <td class='p-1'>{{$promo->paygradelevel->name}}</td>
                        <td class='p-1'>{{$promo->start_date}}</td>
                        <td class='p-1'>{{$promo->comment}}</td>
                        @if ($promo->status == 0)

                        <td class='p-1'>Old</td>
                        @else
                        <td class='p-1'>New</td>
                        @endif

                        <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="edit">
                            <a href="{{route('promotion.edit', $promo->id)}}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td class='p-1 text-center'>
                            <form method="POST" action="{{route('promotion.destroy', $promo->id)}}"
                                id="deactivate-form4-{{$promo->id}}" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="btn btn-sm" type="submit" onclick="if(confirm('Are you sure to delete  Experiance? if your answer is yes you don\'t restore it. ')){
                            event.preventDefault();
                            document.getElementById('deactivate-form4-{{$promo->id}}').submit();
                                }else{
                                    event.preventDefault();
                                }"> <i class="fas fa-trash red"></i>

                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class='m-1 p-1 text-center' colspan="12">No Data Avilable</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>

@endif
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
                    <p class="text-center">Are You Sure Want To Delete ? Employee <span class="font-weight-bold">
                            {{$personale->fullname}}</span> </p>
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
         var url = '{{ route("personale.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endsection
