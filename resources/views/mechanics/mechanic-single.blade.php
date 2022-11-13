@extends('layout.app')

@section('content')
        <!-- btc tittle Wrapper Start -->
	<div class="btc_tittle_main_wrapper">
		<div class="btc_tittle_img_overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
					<div class="btc_tittle_left_heading">
						<h1>Mechanics</h1>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
					<div class="btc_tittle_right_heading">
						<div class="btc_tittle_right_cont_wrapper">
							<ul>
								<li><a href="#">Home</a>  <i class="fa fa-angle-right"></i>
								</li>
								<li><a href="#">Mechanics</a>  <i class="fa fa-angle-right"></i>
								</li>
								<li>Mechanics Single</li>
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
					<h3>Choose a Mechanic</h3>
					<p>Complete Your Step</p>
				</div>
				<div class="x_title_num_heading_cont">
					<div class="x_title_num_main_box_wrapper">
						<div class="x_icon_num ">
							<p>1</p>
						</div>
						<h5>Time & place</h5>
					</div>
					<div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper2">
						<div class="x_icon_num ">
							<p>2</p>
						</div>
						<h5>Mechanic</h5>
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
											$pics = $mechanic->images;
											$new = explode(',',$pics);                                        
										@endphp
										@foreach ($new as $n)

											@if($n !== '')
												<div class="item">
													<div class="lr_bc_slider_img_wrapper">
														<img src="/storage/mechanics/{{$n}}" alt="fresh_food_img">
													</div>
												</div>
											@endif
										
										@endforeach
										
									</div>
								</div>
								<div class="x_car_detail_slider_bottom_cont float_left">
									<div class="x_car_detail_slider_bottom_cont_left">
										<h3>{{$mechanic->user->name}}</h3>
										
									</div>
									<div class="x_car_detail_slider_bottom_cont_right">
										<h3>Rs {{$mechanic->price}}</h3>
										<p><span></span> 
											<br></p>
									</div>
									<div class="x_car_detail_slider_bottom_cont_center float_left">
										<p>{{$mechanic->description}} <br>
                                            Email: {{$mechanic->user->email}} <br> 
                                            Phone: {{$mechanic->user->phone}} <br>
											Click Below and say 'hello' to {{$mechanic->name}} 
										</p>
									</div>
									
									<div class="x_avanticar_btn float_left">
										@guest
											<ul>
												<li>
													<a href="/login">Login</a>
												</li>
												<li style="margin-top: 10px;">
													<a href="/register">Register</a>
												</li>
											</ul>
										@else
											<ul>
												<li>
													<a href={{route('user.chatList',['id'=>$mechanic->user_id])}}>Chat</a>
												</li>
											</ul>
										@endguest
										
									</div>
								</div>
								<div class="x_ln_car_heading_wrapper x_ln_car_heading_wrappercsss float_left">
									<h3>Other Mechanics</h3>
								</div>
								<div class="btc_ln_slider_wrapper btc_ln_slider_wrapper_cs">
									<div class="owl-carousel owl-theme">
										@forelse($otherMecahnics as $mech)
											<div class="item">
												<div class="x_car_offer_main_boxes_wrapper float_left margintop_zero">
													<div class="x_car_offer_starts float_left">
														
													</div>
													<div class="x_car_offer_img float_left">
														<img src="/storage/mechanics/{{$mech->thumbnail}}" alt="img">
													</div>
													<div class="x_car_offer_price float_left">
														<div class="x_car_offer_price_inner">
															<h3>Rs {{$mech->price}}</h3>
															<p><span></span> 
																<br></p>
														</div>
													</div>
													<div class="x_car_offer_heading float_left">
														<h2><a href="#">{{$mech->name}}</a></h2>
														<p>New Best</p>
													</div>
													
													<div class="x_car_offer_bottom_btn float_left">
														<ul>
															<li><a href="{{route('mech.single',['mechanic'=>$mech->id])}}">Details</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										@empty
											<div class="item">
												<p style="color: red">No Mechanics</p>
											</div>
										@endforelse

										
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
										<h3>Let's Book an Appointment</h3>
									</div>
                                    <form method="POST" action="{{route('mech.appoint',['mechanic'=>$mechanic->id])}}">
                                        @csrf
									    <div class="row">										
										    <div class="col-md-12">
											    <div class="form-sec-header">
												    <h3>Appointment Date</h3>
												    <label class="cal-icon">Appointment Date
													    <input type="text" name="date" placeholder="Tue 16 Jan 2018" value="{{old('date')}}" class="form-control datepicker">
                                                        @error('date') <div class="alert alert-danger">{{$message}}</div> @enderror
                                                    </label>
                                                                                                        
                                                    
											    </div>
										    </div>
										
										    <div class="col-md-12">
											    <div class="form-sec-header">
												    <h3>Additional Info</h3>
												    <label class="">Additional Info
													    <input type="text" name="info" placeholder="Very Urgent" value="{{old('info')}}" class="form-control">
                                                        @error('info') <div class="alert alert-danger">{{$message}}</div> @enderror
												    </label>
											    </div>
										    </div>

                                            <div class="col-md-12">
                                                <div class="form-sec-header">
                                                    <h3>Price</h3>
                                                    <p>Rs: {{$mechanic->price}}</p>
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
                                                            <li><input id="book" type="submit" name="submit" value="Book Appointment" class="btn btn-lg btn-block" style="background-color: #4f5dec; color:#ffff">
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
@endsection