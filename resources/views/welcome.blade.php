@extends('master.auth')
@section('content')
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <div class="avatar text-center"><img src="{{asset('img/logo.png')}}" alt="TIMS logo"
                                        class="img-fluid" width="300" height="300">
                                </div>
                                <div class="title">
                                    <br>
                                    <h3 class="text-center">TRANSPORT INFORMATION MANGMENT SYSTEM(TIMS)</h3>
                                    <br>
                                    <p><i class="fa fa-user"></i> Developed By Yetimesht Tadesse</p>
                                    <p><i class="fa fa-mobile"></i> &nbsp; +251929102926</p>
                                    <p><i class="fa fa-google"></i> &nbsp; yetimnew@gmail.com</p>
                                    <p><i class="fa fa-facebook"></i> &nbsp; https://www.yetimnew.com</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <div class="card">
                                <div class="card-header text-center">
                                    <strong class="text-center">User Login</strong>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group required">
                                            <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group required">
                                            <label for="password" class="control-label">{{ __('Password') }}</label>
                                            <input id="password" type="password"
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password">

                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group ">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>

                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>

                                                @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                                @endif
                                            </div>
                                        </div>


                                    </form>
                                </div>
                                <div class="card-footer text-muted">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="copyrights text-center">
                <p>Design by <a href="#" class="external">Yetimeshet T</a>
                </p>
            </div>
        </div>

        @endsection
