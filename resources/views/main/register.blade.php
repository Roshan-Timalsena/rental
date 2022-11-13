@extends('layout.app')

@section('content')
<div class="btc_tittle_main_wrapper">
    <div class="btc_tittle_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_left_heading">
                    <h1>Register</h1>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_right_heading">
                    <div class="btc_tittle_right_cont_wrapper">
                        <ul>
                            <li><a href="#">Home</a>  <i class="fa fa-angle-right"></i>
                            </li>
                            <li>Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="x_partner_main_wrapper float_left padding_tb_100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_offer_car_heading_wrapper float_left">
                    <h4>Please Regiser</h4>
                    <h3>NEW USERS REGISTER HERE</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-12">
                <div class="register_wrapper_box">
                    <div class="register_left_form">
                        <div class="jp_regiter_top_heading"><p>Fields with * are mandatory</p></div>
                        <form action="{{route('user.register')}}" method="POST">
                            @csrf
                        <div class="row clearfix">
                            
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="fname" placeholder="Full Name*">
                                <div class="danger text-danger">@error('fname'){{$message}}@enderror</div>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="driverid" placeholder="Lisence Number*">
                                <div class="danger text-danger">@error('driverid'){{$message}}@enderror</div>

                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="username" placeholder="Username*">
                                <div class="danger text-danger">@error('username'){{$message}}@enderror</div>

                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="email" placeholder="Email*">
                                <div class="danger text-danger">@error('email'){{$message}}@enderror</div>

                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="password" name="password" placeholder="Password*">
                                <div class="danger text-danger">@error('password'){{$message}}@enderror</div>

                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="phone" placeholder="Phone*">
                                <div class="danger text-danger">@error('phone'){{$message}}@enderror</div>

                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="company" placeholder="Company">
                                <div class="danger text-danger">@error('company'){{$message}}@enderror</div>

                            </div>
                            
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="address" placeholder="Address">
                                <div class="danger text-danger">@error('address'){{$message}}@enderror</div>

                            </div>                            
                        </div>
                        
                        <div class="login_btn_wrapper register_btn_wrapper login_wrapper register_wrapper_btn">
                            
                            <a href="{{route('user.register')}}"><button class="btn btn-primary login_btn">Register</button></a>
                        </div>
                        </form>
                        <div class="login_message">
                            <p>"Already a member? "
                                <a href="#">Login Here</a>
                            </p>
                        </div>
                    </div> 
            </div>  
        </div>  
    </div>
</div> 
</div> 
@endsection