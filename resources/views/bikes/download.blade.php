<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Bikes</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="/css/main.css" />

    <link rel="shortcut icon" type="image/png" href="/images/fevicon.png" />

</head>

<body>
    <div class="x_car_donr_main_box_wrapper float_left">
        <div class="container">
            <div class="x_car_donr_main_box_wrapper_inner">
                <div class="order-done"> <i class="icon-checked">
                    <h4>Thank you! Order has been received</h4>
                    <h4>Here is Your Order Details<span></span></h4>
                    <hr>
                    <h4>Summary</h4>
                    <ul class="row list-unstyled">
                        <li class="col-md-6">
                            <h6>Date</h6>
                            <p>From <span>{{ $booking->fromDate }}</span>
                            </p>
                            <p>To <span>{{ $booking->toDate }}</span>
                            </p>
                            <p>For <span>{{ $booking->days }} Day(s)</span>
                            </p>
                        </li>

                        <li class="col-md-6">
                            <h6>Bike</h6>
                            <p>{{ $bike->name }} <span>Rs {{ $bike->priceperday }}</span>
                            </p>

                        </li>

                        <li class="col-md-6">
                            <h6>Total</h6>
                            <p>Method: {{ $booking->payment_method }}<span> Rs {{ $booking->total }}</span>
                            </p>
                        </li>
                        <li class="col-md-12">
                            <h6>Billing Information</h6>
                            <p>{{ $user->name }}
                                <br>Driver’s License ID {{ $user->license }}
                                <br>{{ $user->phone }}
                                <br>{{ $user->email }}
                                <br>
                            </p>
                        </li>

                    </ul>
                    <hr>
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
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/modernizr.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/jquery.menu-aim.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/jquery.nice-select.min.js"></script>
    <script src="/js/owl.carousel.js"></script>
    <script src="/js/own-menu.js"></script>
    <script src="/js/jquery.bxslider.min.js"></script>
    <script src="/js/jquery.magnific-popup.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>
