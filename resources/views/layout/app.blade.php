<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Bikes</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="author" content="" />

	<link rel="stylesheet" type="text/css" href="/css/main.css" />
	
	<link rel="shortcut icon" type="image/png" href="/images/fevicon.png" />
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
	
	<script src="{{URL::asset('/khalti.min.js')}}"></script>

	<script async>
		let config = {
			"publicKey": "test_public_key_5c8f4dda3f45479fb065ea924d8d0626",
			"productIdentity": "Booking",
			"productName": "Booking",
			"productUrl": "http://localhost/",
			"eventHandler": {
				onSuccess(payload) {
					newBooking({amount: payload.amount, trans_token: payload.token, _token:"{{ csrf_token() }}"});
				}

				
			}
		};

		function newBooking(data){
            $.ajax({
                url: '/khalticonfirm',
                type: "POST",
                dataType: 'JSON',
                data: data,
                success: function (response) {
                    if(response.location){
                        window.location.replace(response.location);
                    }
                }
            });
        }
	</script>
</head>

<body>
	<!-- preloader Start -->
	<!-- <div id="preloader">
		<div id="status">
			<img src="images/loader.gif" id="preloader_image" alt="loader">
		</div>
	</div> -->
	<div class="serach-header">
		<div class="searchbox">
			<button class="close">×</button>
			<form method="GET" action="{{route('search')}}">
				<input type="search" name="query" placeholder="Search …">
				<button type="submit"><i class="fa fa-search"></i>
				</button>
			</form>
		</div>
	</div>
	<!-- x top header_wrapper Start -->
	<div class="x_top_header_wrapper float_left">
		<div class="container">
			<div class="x_top_header_left_side_wrapper float_left">
				<p>Call Us : 9898989898</p>
			</div>
			<div class="x_top_header_right_side_wrapper float_left">
				<div class="x_top_header_social_icon_wrapper">
					<ul>
						<li><a href="#"><i class="fa fa-facebook-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-twitter-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-instagram"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-linkedin-square"></i></a>
						</li>
					</ul>
				</div>
				<div class="x_top_header_all_select_box_wrapper">
					<ul>
						@guest
                            {{-- <li class="nav-item">
                                <a class="nav-link login" href="{{ route('login') }}">{{ __('Login') }}&nbsp;&nbsp;<i class="fa fa-power-off"></i> </a>
                            </li> --}}

							@if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}&nbsp;&nbsp;<i class="fa fa-power-off"></i> </a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}&nbsp;&nbsp;<i class="fa fa-plus-circle"></i> </a>
                                </li>
                            @endif
							<li class="nav-link">
								<button class="searchd"><i class="fa fa-search"></i>
								</button>
							</li>
                        @else
                            <li class="nav-item">
                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a> --}}

                                
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                
                            </li>
							<li class="nav-link">
								<button class="searchd"><i class="fa fa-search"></i>
								</button>
							</li>
                        @endguest
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- x top header_wrapper End -->
	<!-- hs Navigation Start -->
	<div class="hs_navigation_header_wrapper">
		<div class="container">
			<div class="row">
				<div class=" col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
					<div class="hs_logo_wrapper d-none d-sm-none d-xs-none d-md-block">
						<a href="/">
							<img src="images/logo.png" class="img-responsive" alt="logo" title="Logo" />
						</a>
					</div>
				</div>
				<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
					<div class="hs_navi_cart_wrapper  d-none d-sm-none d-xs-none d-md-block d-lg-block d-xl-block">
						<div class="dropdown-wrapper menu-button">
							
						</div>
					</div>
					<nav class="hs_main_menu d-none d-sm-none d-xs-none d-md-block">
						<ul>
							<li>
								<div class="dropdown-wrapper menu-button"> <a class="menu-button" href="/">Home</a>
								</div>
							</li>
							<li>
								<div class="dropdown-wrapper menu-button"> <a class="menu-button" href="{{route('bike.all')}}">Bikes</a>
								</div>
							</li>
							<li> <a class="menu-button single_menu" href="{{route('mech.all')}}">Mechanics</a>
							</li>
							<li> <a class="menu-button single_menu" href="{{route('aboutUs')}}">About </a>
							</li>
                            @guest
								<li></li>
							@else
							<li>
								<a href="{{route('bookings',['user'=>Auth::id()])}}" class="menu-button single_menu">My Bookings</a>
								<a href="{{route('user.account')}}" class="menu-button single_menu">Account</a>
							</li>
							@endguest
						</ul>
					</nav>
					<header class="mobail_menu d-none d-block d-xs-block d-sm-block d-md-none d-lg-none d-xl-none">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-6">
									<div class="hs_logo">
										<a href="/">
											<img src="images/logo.png" alt="Logo" title="Logo">
										</a>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-6">
									<div class="cd-dropdown-wrapper">
										<a class="house_toggle" href="#0">
											<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="511.63px" height="511.631px" viewBox="0 0 511.63 511.631" style="enable-background:new 0 0 511.63 511.631;" xml:space="preserve">
												<g>
													<g>
														<path d="M493.356,274.088H18.274c-4.952,0-9.233,1.811-12.851,5.428C1.809,283.129,0,287.417,0,292.362v36.545
																	c0,4.948,1.809,9.236,5.424,12.847c3.621,3.617,7.904,5.432,12.851,5.432h475.082c4.944,0,9.232-1.814,12.85-5.432
																	c3.614-3.61,5.425-7.898,5.425-12.847v-36.545c0-4.945-1.811-9.233-5.425-12.847C502.588,275.895,498.3,274.088,493.356,274.088z" />
														<path d="M493.356,383.721H18.274c-4.952,0-9.233,1.81-12.851,5.427C1.809,392.762,0,397.046,0,401.994v36.546
																	c0,4.948,1.809,9.232,5.424,12.854c3.621,3.61,7.904,5.421,12.851,5.421h475.082c4.944,0,9.232-1.811,12.85-5.421
																	c3.614-3.621,5.425-7.905,5.425-12.854v-36.546c0-4.948-1.811-9.232-5.425-12.847C502.588,385.53,498.3,383.721,493.356,383.721z" />
														<path d="M506.206,60.241c-3.617-3.612-7.905-5.424-12.85-5.424H18.274c-4.952,0-9.233,1.812-12.851,5.424
																	C1.809,63.858,0,68.143,0,73.091v36.547c0,4.948,1.809,9.229,5.424,12.847c3.621,3.616,7.904,5.424,12.851,5.424h475.082
																	c4.944,0,9.232-1.809,12.85-5.424c3.614-3.617,5.425-7.898,5.425-12.847V73.091C511.63,68.143,509.82,63.861,506.206,60.241z" />
														<path d="M493.356,164.456H18.274c-4.952,0-9.233,1.807-12.851,5.424C1.809,173.495,0,177.778,0,182.727v36.547
																	c0,4.947,1.809,9.233,5.424,12.845c3.621,3.617,7.904,5.429,12.851,5.429h475.082c4.944,0,9.232-1.812,12.85-5.429
																	c3.614-3.612,5.425-7.898,5.425-12.845v-36.547c0-4.952-1.811-9.231-5.425-12.847C502.588,166.263,498.3,164.456,493.356,164.456z
																	" />
													</g>
												</g>
												<g></g>
												<g></g>
												<g></g>
												<g></g>
												<g></g>
												<g></g>
												<g></g>
												<g></g>
												<g></g>
												<g></g>
												<g></g>
												<g></g>
												<g></g>
												<g></g>
												<g></g>
											</svg>
										</a>
										<!-- .cd-dropdown -->
									</div>
									<nav class="cd-dropdown">
										<h2><a href="index.html">My Rental</a></h2>
										<a href="#0" class="cd-close">Close</a>
										<ul class="cd-dropdown-content">
											<li>
												<form class="cd-search">
													<input type="search" placeholder="Search...">
												</form>
											</li>
											<li> <a href="/">Home</a>
											</li>
											<li> <a href="{{route('bike.all')}}">Bikes</a>
											</li>
											<li> <a href="{{route('mech.all')}}">Mechanics</a>
											</li>
											<li> <a href="{{route('aboutUs')}}">About</a>
											</li>
											@guest
												<li></li>
											@else
											<li>
												<a href="{{route('bookings',['user'=>Auth::id()])}}" class="menu-button single_menu">My Bookings</a>
												<a href="{{route('user.account')}}" class="menu-button single_menu">Account</a>
											</li>
											@endguest
											
										</ul>
										<!-- .cd-dropdown-content -->
									</nav>
								</div>
							</div>
						</div>
						<!-- .cd-dropdown-wrapper -->
					</header>
				</div>
			</div>
		</div>
	</div>

    @yield('content')

    <div class="x_news_letter_main_wrapper">
        <div class="container">
            <div class="x_news_contact_wrapper">
                <img src="images/nl1.png" alt="news_img">
                <h4>Call Us <br> <span>+977 9898989898</span></h4>
            </div>
            <div class="x_news_contact_second_wrapper">
                <h4>Best Bike Rental and Servicing</h4>
            </div>
            
        </div>
    </div>
    <!-- x news latter Wrapper End -->
    <!-- x footer Wrapper Start -->
    <div class="x_footer_top_main_wrapper float_left">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
					<div class="x_footer_top_left float_left">
						<img src="images/footer_logo.png" alt="logo">
					</div>
				</div>
				<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
					<div class="x_footer_top_right float_left">
						<div class="x_footer_top_title_box x_footer_top_title_box1">
							<div class="x_footer_top_title_box_icon_cont">	<i class="flaticon-pie-chart"></i>
								<h3>Rent bikes</h3>
							</div>
						</div>
						<div class="x_footer_top_title_box">
							<div class="x_footer_top_title_box_icon_cont">	<i class="flaticon-phone-call"></i>
								<h3>Chat with Mechanics</h3>
							</div>
						</div>
						<div class="x_footer_top_title_box">
							<div class="x_footer_top_title_box_icon_cont x_footer_top_title_box_icon_cont_first">	<i class="flaticon-home-page"></i>
								<h3>Book Appointment</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- x footer Wrapper End -->
    <!-- x footer Wrapper Start -->
    <div class="x_footer_bottom_main_wrapper float_left">
		<div class="container">
			<div class="row">
							
				
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
					<div class="x_footer_bottom_box_wrapper_third float_left">
						<h3>Have Questions?</h3>
						<div class="x_footer_bottom_icon_section float_left">
							<div class="x_footer_bottom_icon">	<i class="flaticon-phone-call"></i>
							</div>
							<div class="x_footer_bottom_icon_cont">
								<h4>Call Us</h4>
								<p>+977 9876543210</p>
							</div>
						</div>
						<div class="x_footer_bottom_icon_section x_footer_bottom_icon_section2 float_left">
							<div class="x_footer_bottom_icon x_footer_bottom_icon2">	<i class="flaticon-mail-send"></i>
							</div>
							<div class="x_footer_bottom_icon_cont">
								<h4>Email Us</h4>
								<p><a href="#">bikerental@gmail.com</a>
								</p>
							</div>
						</div>
						
					</div>
				</div>

				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
					<div class="x_footer_bottom_box_wrapper float_left">
						<h3>Socials</h3>
						<p>Follow us on social media</p>
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a>
							</li>
						</ul>
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
    <!-- custom js-->
    </body>
    
    </html>