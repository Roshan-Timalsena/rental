@extends('layout.app')

@section('content')
    
    <div class="x_car_book_sider_main_Wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <h3><b>Search Results For Bikes</b></h3>
                    <div class="x_car_book_tabs_content_main_wrapper">
                        <div class="tab-content">
                            <div id="home" class="tab-pane active">
                                <div class="row">
                                    @if(isset($bikes))
                                        @if(count($bikes) > 0)
                                            @foreach ($bikes as $bike)
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                                        <div class="x_car_offer_starts float_left">

                                                        </div>
                                                        <div class="x_car_offer_img float_left">
                                                            <img src="/images/{{$bike->thumbnail}}" alt="img">
                                                        </div>
                                                        <div class="x_car_offer_price float_left">
                                                            <div class="x_car_offer_price_inner">

                                                                <h3>Rs {{$bike->priceperday}}</h3>
												                <p><span>per</span> 
													            <br>/ day</p>

                                                            </div>
                                                        </div>
                                                        <div class="x_car_offer_heading float_left">
                                                            <h2><a href="#">{{$bike->name}}</a></h2>
                                                            <p>Best Offer</p>
                                                        </div>

                                                        <div class="x_car_offer_bottom_btn float_left">
                                                            <ul>
                                                                <li><a href="{{route('bike.details',['bike'=>$bike->id])}}">Details</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="alert alert-danger">No Bikes Found</div>
                                        @endif
                                    @endif
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
                    <h3><b>Search Results For Mechanics</b></h3>
                    <div class="x_car_book_tabs_content_main_wrapper">
                        <div class="tab-content">
                            <div id="home" class="tab-pane active">
                                <div class="row">
                                    @forelse($mechanics as $mechanic)
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="x_car_offer_main_boxes_wrapper float_left">
                                                <div class="x_car_offer_starts float_left">

                                                </div>
                                                <div class="x_car_offer_img float_left">
                                                    <img src="/images/{{$mechanic->thumbnail}}" alt="img">
                                                </div>
                                                <div class="x_car_offer_price float_left">
                                                    <div class="x_car_offer_price_inner">

                                                        <h3>Rs {{$mechanic->price}}</h3>
													    <p><span></span> 
														    <br></p>

                                                    </div>
                                                </div>
                                                <div class="x_car_offer_heading float_left">
                                                    <h2><a href="#">{{$mechanic->name}}</a></h2>
                                                    <p>Experience: {{$mechanic->experience}}</p>
                                                </div>

                                                <div class="x_car_offer_bottom_btn float_left">
                                                    <ul>
                                                        <li><a href="{{route('mech.single',['mechanic'=>$mechanic->id])}}">Details</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-danger"><p>Mechanics Not Found</p></div>
                                        
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
                                                            <br>
                                                        </p>
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
