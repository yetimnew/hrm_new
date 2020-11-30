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
                            <h4>All leave Types</h4>
                            {{-- @can('customer create') --}}
                            <div class="ml-auto">
                            </div>
                            {{-- @endcan --}}
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group row 	">
                                <label class="col-sm-3 col-form-label">Monday</label>
                                <div class="col-sm-9">
                                    @if ($work_week->mon == 0)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Non working date" disabled>
                                    @endif
                                    @if ($work_week->mon == 4)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Half Day " disabled>
                                    @endif
                                    @if ($work_week->mon == 8)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Full Day " disabled>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row 	">
                                <label class="col-sm-3 col-form-label">Tuesday</label>
                                <div class="col-sm-9">
                                    @if ($work_week->tue == 0)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Non working date" disabled>
                                    @endif
                                    @if ($work_week->tue == 4)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Half Day " disabled>
                                    @endif
                                    @if ($work_week->tue == 8)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Full Day " disabled>
                                                  @endif

                                </div>

                            </div>
                            <div class="form-group row 	">
                                <label class="col-sm-3 col-form-label">Wednesday</label>
                                <div class="col-sm-9">
                                    @if ($work_week->wed == 0)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Non working date" disabled>
                                    @endif
                                    @if ($work_week->wed == 4)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Half Day " disabled>
                                    @endif
                                    @if ($work_week->wed == 8)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Full Day " disabled>
                                    @endif

                                </div>

                            </div>
                            <div class="form-group row 	">
                                <label class="col-sm-3 col-form-label">Thursday</label>
                                <div class="col-sm-9">
                                    @if ($work_week->thu == 0)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Non working date" disabled>
                                    @endif
                                    @if ($work_week->thu == 4)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Half Day " disabled>
                                    @endif
                                    @if ($work_week->thu == 8)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Full Day " disabled>

                                    @endif

                                </div>

                            </div>
                            <div class="form-group row 	">
                                <label class="col-sm-3 col-form-label">Friday</label>
                                <div class="col-sm-9">
                                    @if ($work_week->fri == 0)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Non working date" disabled>
                                    @endif
                                    @if ($work_week->fri == 4)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Half Day " disabled>
                                    @endif
                                    @if ($work_week->fri == 8)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Full Day " disabled>

                                    @endif

                                </div>

                            </div>
                            <div class="form-group row 	">
                                <label class="col-sm-3 col-form-label">Saturday</label>
                                <div class="col-sm-9">
                                    @if ($work_week->sat == 0)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Non working date" disabled>
                                    @endif
                                    @if ($work_week->sat == 4)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Half Day " disabled>
                                    @endif
                                    @if ($work_week->sat == 8)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Full Day " disabled>
                                @endif
                                </div>

                            </div>
                            <div class="form-group row 	">
                                <label class="col-sm-3 col-form-label">Sunday</label>
                                <div class="col-sm-9">
                                    @if ($work_week->sun == 0)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Non working date" disabled>
                                    @endif
                                    @if ($work_week->sun == 4)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Half Day " disabled>
                                    @endif
                                    @if ($work_week->sun == 8)
                                    <input name="driverid" type="text" id="driverid"
                                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                                    value="Full Day " disabled>
                                     @endif

                                </div>
                                    <div class="ml-auto mt-4">
                                        <a class="btn btn-primary " href="{{route('work_week.edit', $work_week->id)}}"><i
                                            class="fas fa-edit"></i> <span class="ml-1">Edit </a>
                                    </div>
                            </div>
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


@endsection
