<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="x_car_donr_main_box_wrapper float_left">
        <div class="container">
            <div class="x_car_donr_main_box_wrapper_inner">
                <div class="order-done">
                    <h4>thank you! Appointment Has Been Recieved</h4>
                    <hr>
                    <h4>Summary</h4>
                    <ul class="row list-unstyled">
                        <li class="col-md-6">
                            <h6>Appointment Date</h6>
                            <p>For <span>{{$appointment->date}}</span>
                            </p>

                        </li>

                        <li class="col-md-6">
                            <h6>Mechanic</h6>
                            <p>{{$appointment->mechanic->user->name}} <span>Rs {{$appointment->mechanic->price}}</span>
                            </p>

                        </li>

                        
                        <li class="col-md-6">
                            <h6>Total</h6>
                            <p>{{$appointment->payment_method}}<span>Rs {{$appointment->mechanic->price}}</span>
                            </p>
                        </li>
                        <li class="col-md-12">
                            <h6>Billing Information</h6>
                            <p>{{$appointment->user->name}}

                                
                                <br>{{$appointment->user->phone}}
                                <br>{{$appointment->user->email}}
                                <br>
                            </p>
                        </li>

                    </ul>
                    <hr>
                    <div class="contect_btn contect_btn_contact">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="x_copyr_main_wrapper float_left">
        <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up"></i></a>
        <div class="container">
            <p>All rights reserved.</p>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/jquery.menu-aim.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/own-menu.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/main.js"></script>
</body>
