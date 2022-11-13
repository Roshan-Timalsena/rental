@extends('layout.app')

@section('content')
    <div class="x_partner_main_wrapper float_left padding_tb_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="x_offer_car_heading_wrapper float_left">
                        <h4>Please Login To Access.</h4>
                        <h3>LOGIN TO YOUR ACCOUNT</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-12">
                    <!-- login_wrapper -->

                    <div class="login_wrapper">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="formsix-pos">
                                <div class="form-group i-email">

                                    <input id="email" type="email" placeholder="Email*"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="formsix-e">
                                <div class="form-group i-password">
                                    <input id="password" type="password" placeholder="Password*"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="login_remember_box">
                                <label class="control control--checkbox">
                                </label>
                                <a href="{{ route('password.request') }}" class="forget_password">
                                    Forgot Password
                                </a>
                            </div>
                            <div class="login_btn_wrapper">
                                <button type="submit" class="btn btn-primary btn-lg btn-block"
                                    style="background-color: #4f5dec; color:#ffff"> {{ __('Login') }} </button>
                            </div>
                        </form>
                        <div class="login_message">
                            <p>Don’t have an account ? <a href="{{ route('register') }}"> Register Now </a> </p>
                        </div>
                    </div>
                    <p>In case you are using a public/shared computer we recommend that you logout to prevent any
                        un-authorized access to your account</p>
                    <!-- /.login_wrapper-->
                </div>
            </div>
        </div>
    </div>
@endsection
