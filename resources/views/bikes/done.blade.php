@extends('layout.app')

@section('content')
<div class="btc_tittle_main_wrapper">
    <div class="btc_tittle_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_left_heading">
                    <h1>Order Done</h1>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_right_heading">
                    <div class="btc_tittle_right_cont_wrapper">
                        <ul>
                            <li><a href="#">Home</a>  <i class="fa fa-angle-right"></i>
                            </li>
                            <li><a href="#">Bike</a>  <i class="fa fa-angle-right"></i>
                            </li>
                            <li>Done</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- btc tittle Wrapper End -->
<!-- x tittle num Wrapper Start -->
<div class="x_title_num_mian_Wrapper float_left">
    <div class="container">
        <div class="x_title_inner_num_wrapper float_left">
            <div class="x_title_num_heading">
                <h3>Choose a Bike</h3>
                <p>Complete Your Step</p>
            </div>
            <div class="x_title_num_heading_cont">
                <div class="x_title_num_main_box_wrapper">
                    <div class="x_icon_num">
                        <p>1</p>
                    </div>
                    <h5>Time & place</h5>
                </div>
                <div class="x_title_num_main_box_wrapper">
                    <div class="x_icon_num ">
                        <p>2</p>
                    </div>
                    <h5>Car</h5>
                </div>
                <div class="x_title_num_main_box_wrapper">
                    <div class="x_icon_num">
                        <p>3</p>
                    </div>
                    <h5>detail</h5>
                </div>
                <div class="x_title_num_main_box_wrapper">
                    <div class="x_icon_num">
                        <p>4</p>
                    </div>
                    <h5>checkout</h5>
                </div>
                <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3 x_title_num_main_box_wrapper_last">
                    <div class="x_icon_num x_icon_num3">
                        <p>5</p>
                    </div>
                    <h5>done!</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- x tittle num Wrapper End -->
<div class="x_car_donr_main_box_wrapper float_left">
    <div class="container">
        <div class="x_car_donr_main_box_wrapper_inner">
            <div class="order-done"> <i class="icon-checked"><img src="images/icon-checked.png" alt=""></i>
                <h4>Thank you! Order has been received</h4>
                <h4>You can Download The Order Details<span></span></h4>
                <hr>
                <h4>Summary</h4>
                <ul class="row list-unstyled">
                    <li class="col-md-6">
                        <h6>Date</h6>
                        <p>From <span>{{$booking->fromDate}}</span>
                        </p>
                        <p>To <span>{{$booking->toDate}}</span>
                        </p>
                        <p>For <span>{{$booking->days}} Day(s)</span>
                        </p>
                    </li>
                    
                    <li class="col-md-6">
                        <h6>Bike</h6>
                        <p>{{$bike->name}} <span>Rs {{$bike->priceperday}}</span>
                        </p>
                        
                    </li>
                    
                    <li class="col-md-6">
                        <h6>Total</h6>
                        <p>Method: {{$booking->payment_method}}<span>Rs {{$booking->total}}</span>
                        </p>
                    </li>
                    <li class="col-md-12">
                        <h6>Billing Information</h6>
                        <p>{{$user->name}}
                            <br>Driver’s License ID {{$user->license}}
                            <br>{{$user->phone}}
                            <br>{{$user->email}}
                            <br>
                        </p>
                    </li>
                    
                </ul>
                <hr>
                <div class="contect_btn contect_btn_contact">
                    
                    <ul>
                        <li><a href="{{route('bike.downloadOrder',['booking'=>$booking->id])}}">Print Order <i class="fa fa-print"></i></a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="{{route('bookings',['user'=>Auth::id()])}}">View Bookings</a>
                        </li>
                    </ul>

                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection