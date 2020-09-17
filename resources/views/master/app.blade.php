<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yetimeshet Tadese yetimnew@gmail.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="icon" href="{{asset('icon.ico')}}" type="image/x-icon" /> --}}
    <link rel="icon" href="{{asset('images/logo.png')}}" type="image/x-icon" />

    <title>@yield('title','TIMS')</title>

    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.default.css')}}">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/fontastic.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/css/sweetalert2.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('/icons-reference/styles.css')}}">
    <link rel="stylesheet" href="{{asset('/css/jquery.datetimepicker.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/css/bootstrap-datetimepicker.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/select2-bootstrap.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/css/multi-select.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('/css/bootstrap-multiselect.css')}}"> --}}
    {{-- <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> --}}

    @yield('styles')
</head>

<body>
    <div id="app">

        <div class="page">
            @include('master.topnav')
            <div class="page-content d-flex align-items-stretch">
                @include('master.sidenav')
                <div class="content-inner">
                    @yield('content')

                    <footer class="main-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>ERTE &copy; 2018</p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p>Design by <span class="external">Yetimesht T</span></p>

                                </div>
                            </div>
                        </div>
                    </footer>

                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{asset('js/jquery.min.js') }}"> </script> --}}
    <script src="{{ asset('js/moment.js') }}"> </script>
    <script src="{{ asset('js/select2.min.js') }}"> </script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"> </script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"> </script>
    <script src="{{ asset('js/buttons.flash.min.js') }}"> </script>
    <script src="{{ asset('js/jszip.min.js')}}"> </script>

    <script src="{{ asset('js/buttons.html5.min.js') }}"> </script>
    <script src="{{ asset('js/buttons.print.min.js') }}"> </script>
    <script src="{{ asset('js/toastr.min.js') }}"> </script>

    <script src="{{ asset('js/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('js/jquery.datetimepicker.full.js') }}"> </script>

    <script src="{{ asset('js/jquery.validate.min.js') }}"> </script>
    <script src="{{ asset('js/custome_validation.js') }}"> </script>
    <script src="{{ asset('js/Chart.min.js') }}"> </script>
    <script src="{{ asset('js/sweetalert.min.js') }}"> </script>


    <script src="{{asset('js/front.js') }}"> </script>

    <script>
        @if (Session::has('success'))
      toastr.success('{{ Session::get('success')}}');
    @endif
    @if (Session::has('info'))
    toastr.info('{{ Session::get('info')}}');
    @endif
    @if (Session::has('error'))
    toastr.error('{{ Session::get('error')}}');
    @endif
    </script>
    @yield('scripts')
</body>

</html>
