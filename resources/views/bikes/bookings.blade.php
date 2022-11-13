@extends('layout.app')

@section('content')
<div class="x_car_book_sider_main_Wrapper float_left">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <h3><b>Your Bookings</b></h3>
                <div class="x_car_book_tabs_content_main_wrapper">
                    <div class="tab-content">
                        <div id="home" class="tab-pane active">
                            <div class="row">
                                @forelse($bookings as $booking)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                        <div class="x_car_offer_starts float_left">
                                            
                                        </div>
                                        <div class="x_car_offer_img float_left">
                                            <img src="/storage/bikes/{{$booking->bike->thumbnail}}" alt="img">
                                        </div>
                                        <div class="x_car_offer_price float_left">
                                            <div class="x_car_offer_price_inner">
                                            
                                                <h3>Total: {{$booking->total}}</h3>
                                                
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">{{$booking->bike->name}}</a></h2>
                                            <p>Status: {{$booking->rent_status}}</p>
                                        </div>
                                        
                                        <div class="x_car_offer_bottom_btn float_left">
                                            <ul>
                                                <li><a href="{{route('bike.showRent',['booking'=>$booking->id])}}">Details</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div>
                                    <p style="color:red">No Bookings to show</p>
                                </div>
                                @endforelse
                                
                                                     
                                

                                

                                
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                        <div class="x_car_offer_starts x_car_offer_starts_list_img float_left">
                                            
                                            <div class="x_car_offer_img x_car_offer_img_list float_left">
                                                <img src="images/c1.png" alt="img">
                                            </div>
                                            <div class="x_car_offer_price x_car_offer_price_list float_left">
                                                <div class="x_car_offer_price_inner x_car_offer_price_inner_list">
                                                
                                                    <h3>Total</h3>
                                                    <p><span>68</span> 
                                                        <br></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_starts_list_img_cont">
                                            <div class="x_car_offer_heading x_car_offer_heading_list float_left">
                                                <h2><a href="#">HONDA</a></h2>
                                                <p>Best Offer</p>
                                            </div>
                                            <div class="x_car_offer_bottom_btn x_car_offer_bottom_btn_list float_left">
                                                <ul>
                                                    
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                                                                                        
                                        </div>
                                    </div>
                                </div>
                                
                                

                                

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="x_car_book_sider_main_Wrapper float_left">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <h3><b>Your Appointments</b></h3>
                <div class="x_car_book_tabs_content_main_wrapper">
                    <div class="tab-content">
                        <div id="home" class="tab-pane active">
                            <div class="row">
                                @forelse($appointments as $appointment)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                        <div class="x_car_offer_starts float_left">
                                            
                                        </div>
                                        <div class="x_car_offer_img float_left">
                                            <img src="/storage/mechanics/{{$appointment->mechanic->thumbnail}}" alt="img">
                                        </div>
                                        <div class="x_car_offer_price float_left">
                                            <div class="x_car_offer_price_inner">
                                            
                                                <h3>Total: {{$appointment->mechanic->price}}</h3>
                                                
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">{{$appointment->mechanic->user->name}}</a></h2>
                                            <p>Status: {{$appointment->appointment_status}}</p>
                                        </div>
                                        
                                        <div class="x_car_offer_bottom_btn float_left">
                                            <ul>
                                                <li><a href="{{route('mech.show',['appointment'=>$appointment->id])}}">Details</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div>
                                    <p style="color:red">No Bookings to show</p>
                                </div>
                                @endforelse
                                
                                                     
                                

                                

                                
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                        <div class="x_car_offer_starts x_car_offer_starts_list_img float_left">
                                            
                                            <div class="x_car_offer_img x_car_offer_img_list float_left">
                                                <img src="images/c1.png" alt="img">
                                            </div>
                                            <div class="x_car_offer_price x_car_offer_price_list float_left">
                                                <div class="x_car_offer_price_inner x_car_offer_price_inner_list">
                                                
                                                    <h3>Total</h3>
                                                    <p><span>68</span> 
                                                        <br></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_starts_list_img_cont">
                                            <div class="x_car_offer_heading x_car_offer_heading_list float_left">
                                                <h2><a href="#">HONDA</a></h2>
                                                <p>Best Offer</p>
                                            </div>
                                            <div class="x_car_offer_bottom_btn x_car_offer_bottom_btn_list float_left">
                                                <ul>
                                                    
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                                                                                        
                                        </div>
                                    </div>
                                </div>
                                
                                

                                

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection