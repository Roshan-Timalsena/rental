<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Bikes</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="author" content="" />

	<link rel="stylesheet" type="text/css" href="/css/main.css" />
	
	<link rel="shortcut icon" type="image/png" href="/images/fevicon.png" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{URL::asset('/khalti.min.js')}}"></script>
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
			<form action="{{route('search')}}" method="GET">
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
				<p>Call Us : 9876543210</p>
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
                            <li class="nav-item">
                                <a class="nav-link login" href="{{ route('login') }}">{{ __('Login') }}&nbsp;&nbsp;<i class="fa fa-power-off"></i> </a>
                            </li>
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
													<input type="search" name="query" placeholder="Search...">
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


<div class="btc_tittle_main_wrapper">
    <div class="btc_tittle_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_left_heading">
                    <h1>Bike</h1>
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
                            <li>Bike Single</li>
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
                    <h5>Time</h5>
                </div>
                <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper2">
                    <div class="x_icon_num ">
                        <p>2</p>
                    </div>
                    <h5>Bike</h5>
                </div>
                <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
                    <div class="x_icon_num ">
                        <p>3</p>
                    </div>
                    <h5>detail</h5>
                </div>
                <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
                    <div class="x_icon_num x_icon_num3">
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
<!-- x car book sidebar section Wrapper Start -->

<div class="x_car_book_sider_main_Wrapper float_left">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_car_detail_main_wrapper float_left">
                            <div class="lr_bc_slider_first_wrapper">
                                <div class="owl-carousel owl-theme">
                                    @php
                                        $pics = $sbike->images;
                                        $neww = explode(',',$pics);
                                        $new = array_values($neww);                                       
                                    @endphp

                                    @foreach ($new as $n)
                                        @if($n !== '')
                                            <div class="item">
                                                <div class="lr_bc_slider_img_wrapper">
                                                    <img src="/storage/bikes/{{$n}}" alt="fresh_food_img">
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="x_car_detail_slider_bottom_cont float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h3>{{$sbike->name}}</h3>
                                    
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_right">
                                    <h3>Rs {{$sbike->priceperday}}</h3>
                                    <p><span>Per</span> 
                                        <br>/ day</p>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left">
                                    <p>{{$sbike->description}}</p>
                                </div>
                                
                                <div class="x_avanticar_btn float_left">
                                    <ul>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="x_ln_car_heading_wrapper x_ln_car_heading_wrappercsss float_left">
                                <h3>Latest bikes</h3>
                            </div>
                            <div class="btc_ln_slider_wrapper btc_ln_slider_wrapper_cs">
                                <div class="owl-carousel owl-theme">
                                    @forelse($latestBikes as $bike)
                                        <div class="item">
                                            <div class="x_car_offer_main_boxes_wrapper float_left margintop_zero">
                                                <div class="x_car_offer_starts float_left">
                                                    
                                                </div>
                                                <div class="x_car_offer_img float_left">
                                                    <img src="/storage/bikes/{{$bike->thumbnail}}" alt="img">
                                                </div>
                                                <div class="x_car_offer_price float_left">
                                                    <div class="x_car_offer_price_inner">
                                                        <h3>Rs <?php echo $ppday =  $bike->priceperday; ?></h3>
                                                        <p><span>Per</span> 
                                                            <br> day</p>
                                                    </div>
                                                </div>
                                                <div class="x_car_offer_heading float_left">
                                                    <h2><a href="#">{{$bike->name}}</a></h2>
                                                    <p>New Best</p>
                                                </div>
                                                
                                                <div class="x_car_offer_bottom_btn float_left">
                                                    <ul>
                                                        
                                                        <li><a href="{{route('bike.details',['bike'=>$bike->id])}}">Details</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    <div class="item">
                                        <p style="color: red;">No Bikes</p>
                                    </div>
                                    @endforelse

                                    
                                    
                                </div>
                            </div>
                            <div class="x_css_tabs_wrapper float_left">
                                <div class="x_css_tabs_main_wrapper float_left">
                                    <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home"> User ReView
                                        </a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#menu1">Description</a>
                                    </li>
                                </ul>
                                </div>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active">
                                        
                                        <div class="x_css_skills_form_wrapper">
                                            <div class="skills mt-50 x_c_s">
                                                <h3>Give Your Review</h3>
                                                
                                            </div>
                                            <div class="row only_left">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    
                                </div>
                                @guest
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <p>You Need to <a style="color: #4f5dec" href="{{ route('login') }}">login</a> to leave a review</p>
                                    </div>
                                @else
                                    <form method="POST" action="{{route('bike.review',['bike'=>$sbike->id])}}">
                                        @csrf
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="contect_form4 xcontect_form4">
                                                <textarea name="review" rows="6" placeholder="Leave a Review" value="{{old('review')}}"></textarea>
                                                @error('review') <div class="alert alert-danger">{{$message}}</div> @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="contect_btn x_css_form_btn">
                                                <ul>
                                                    <li><input id="book" type="submit" name="submit" value="Leave a Review" class="btn btn-lg btn-block" style="background-color: #4f5dec; color:#ffff">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                @endguest
                                
                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="x_car_detail_descrip">
                                            <p>{{$sbike->description}}</p>
                                            <ul>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="blog_single_comment_wrapper">
                                    <div class="blog_comment3_wrapper">
                                        <h3>Read What Other Users Have to Say</h3>
                                        
                                        @forelse ($reviews as $review)
                                            <div class="blog_comment1_cont">
                                                <h3>{{$review->user->name}} <i class="fa fa-circle"></i> <span>{{$review->created_at}}</span> &nbsp;&nbsp;</h3>
                                                <p>{{$review->review}}</p>
                                            </div>
                                        @empty
                                            <div class="blog_comment1_cont"><h3>No Reviews Yet</h3></div>
                                            
                                        @endforelse
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="x_car_book_left_siderbar_wrapper float_left">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="x_slider_form_main_wrapper x_slider_form_main_wrapper_ccb float_left">
                                <div class="x_slider_form_heading_wrapper x_slider_form_heading_wrapper_carbooking float_left">
                                    <h3>Let’s Book your perfect bike</h3>
                                </div>
                                <form id="bikeRent">
                                    @csrf
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="form-sec-header">
                                            <h3>From Date</h3>
                                            <label class="cal-icon">From Date
                                                <input type="text" name="fromDate" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-sec-header">
                                            <h3>To Date</h3>
                                            <label class="cal-icon">Pick-up Date
                                                <input type="text" name="toDate" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-sec-header">
                                            <h3>Additional Info</h3>
                                            <label>Additional Info
                                                <input type="text" name="info" placeholder="Very Urgent" class="form-control">
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-sec-header">
                                            <h3>Price Per day</h3>
                                            <p>Rs: {{  $sbike->priceperday }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div id="success-div">
                                            <p id="success" style="color: green"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div id="fail-div">
                                            <p id="fail" style="color: red"></p>
                                        </div>
                                    </div>
                                    
                                    @guest
                                        <div class="col-md-12">
                                            <div class="x_slider_checout_right x_slider_checout_right_carbooking">
                                                <ul>
                                                    <li><a href="{{route('login')}}">Login</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="x_slider_checout_right x_slider_checout_right_carbooking">
                                                <p><b>OR</b></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="x_slider_checout_right x_slider_checout_right_carbooking">
                                                <ul>
                                                    <li><a href="{{route('register')}}">Register</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-12">
                                            <div class="x_slider_checout_right x_slider_checout_right_carbooking">
                                                <ul>
                                                    <li><input id="book" type="submit" name="submit" value="Book Now" class="btn btn-lg btn-block" style="background-color: #4f5dec; color:#ffff">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endguest
                                    
                                    
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="x_news_letter_main_wrapper">
    <div class="container">
        <div class="x_news_contact_wrapper">
            <img src="images/nl1.png" alt="news_img">
            <h4>Call Us <br> <span>+977 9876543210</span></h4>
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
                        <div class="x_footer_bottom_icon"> <i class="flaticon-phone-call"></i>
                        </div>
                        <div class="x_footer_bottom_icon_cont">
                            <h4>Call Us</h4>
                            <p>+977 9876543210</p>
                        </div>
                    </div>
                    <div class="x_footer_bottom_icon_section x_footer_bottom_icon_section2 float_left">
                        <div class="x_footer_bottom_icon x_footer_bottom_icon2"> <i
                                class="flaticon-mail-send"></i>
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
                <div class="x_footer_bottom_box_wrapper_third float_left">
                    <h3>What we Offer</h3>
                    <div class="x_footer_bottom_icon_section float_left">
                        <div class="x_footer_bottom_icon"> <i class="fa fa-motorcycle"></i>
                        </div>
                        <div class="x_footer_bottom_icon_cont">
                            <h4>Best Bikes</h4>
                            <p><a href="{{ route('bike.all') }}">View Bikes</a></p>
                        </div>
                    </div>
                    <div class="x_footer_bottom_icon_section x_footer_bottom_icon_section2 float_left">
                        <div class="x_footer_bottom_icon x_footer_bottom_icon2"> <i
                                class="fa fa-users"></i>
                        </div>
                        <div class="x_footer_bottom_icon_cont">
                            <h4>Best Mechanics</h4>
                            <p><a href="{{ route('mech.all') }}">View Mechanics</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="x_footer_bottom_box_wrapper_third float_left">
                    <h3>Your Account</h3>
                    @guest
                        <div class="x_footer_bottom_icon_section float_left">
                            <div class="x_footer_bottom_icon"> <i class="fa fa-power-off"></i>
                            </div>
                            <div class="x_footer_bottom_icon_cont">
                                <h4>Login</h4>
                                <p><a href="{{route('login')}}">Login</a></p>
                            </div>
                        </div>
                        <div class="x_footer_bottom_icon_section x_footer_bottom_icon_section2 float_left">
                            <div class="x_footer_bottom_icon x_footer_bottom_icon2"> <i
                                    class="fa fa-plus-circle"></i>
                            </div>
                            <div class="x_footer_bottom_icon_cont">
                                <h4>Register</h4>
                                <p><a href="{{ route('register') }}">Register</a>
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="x_footer_bottom_icon_section float_left">
                            <div class="x_footer_bottom_icon"> <i class="flaticon-phone-call"></i>
                            </div>
                            <div class="x_footer_bottom_icon_cont">
                                <h4>Bookings</h4>
                                <p><a href="{{ route('bookings',['user'=>Auth::id()]) }}">My Bookings</a></p>
                            </div>
                        </div>
                        <div class="x_footer_bottom_icon_section x_footer_bottom_icon_section2 float_left">
                            <div class="x_footer_bottom_icon x_footer_bottom_icon2"> <i
                                    class="flaticon-mail-send"></i>
                            </div>
                            <div class="x_footer_bottom_icon_cont">
                                <h4>Account</h4>
                                <p><a href="{{ route('user.account') }}">My Account</a>
                                </p>
                            </div>
                        </div>
                    @endguest
                    

                </div>
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
<script>
    $("#bikeRent").on('submit',function(event){
        event.preventDefault();
        let formData = $("#bikeRent").serialize();
        submitForm(formData);
    })

    function submitForm(formData){

        $.ajax({
            url: "{{route('bike.rent',['bike'=>$sbike->id])}}",
            method: "POST",
            data: formData,
            dataType: "JSON",
            success: function(res){
                if(res.status == 'success'){
                    $("#success-div").addClass("alert alert-success");
                    $("#success").html(res.message);
                    $("#book").prop('disabled', true);
                    $("#fail-div").removeClass("alert alert-danger");
                    $("#fail").html('');
                    window.location = res.link;
                }else{
                    $("#fail-div").addClass("alert alert-danger")
                    $("#fail").html(res.message);
                    $("#success-div").removeClass("alert alert-success");
                    $("#success").html('');
                }
                
            }
        })
    }
</script>
</body>

</html>