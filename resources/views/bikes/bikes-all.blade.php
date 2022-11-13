@extends('layout.app')

@section('content')
    <div class="btc_tittle_main_wrapper">
        <div class="btc_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_left_heading">
                        <h1>Best Offers</h1>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_right_heading">
                        <div class="btc_tittle_right_cont_wrapper">
                            <ul>
                                <li><a href="#">Home</a> <i class="fa fa-angle-right"></i>
                                </li>
                                <li><a href="#">Bikes</a> <i class="fa fa-angle-right"></i>
                                </li>
                                <li>Best Offers</li>
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
                    <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper2">
                        <div class="x_icon_num x_icon_num2">
                            <p>2</p>
                        </div>
                        <h5>Bike</h5>
                    </div>
                    <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
                        <div class="x_icon_num x_icon_num3">
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
                    <div
                        class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3 x_title_num_main_box_wrapper_last">
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
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="x_car_book_left_siderbar_wrapper float_left">
                        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <!-- Filter Results -->
                                <div class="car-filter accordion car_booking_onliy_side">
                                    
                                    <!-- Company -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"> <a data-toggle="collapse" href="#collapseTwo"
                                                    class="collapse">Available Bike Brands</a> </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse show">
                                            <div class="panel-body">
                                                @foreach ($brands as $brand)
                                                    <ul>
                                                        <li>{{$brand->name}}</li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="x_carbooking_right_section_wrapper float_left">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="x_carbook_right_select_box_wrapper float_left">
                                    <br>
                                    <p>Here are the best bikes for you</p>
                                    {{-- <select name="sort" class="myselect">
                                        <option>Sort by Price</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
                                    </select> --}}
                                    
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="x_carbook_right_tabs_box_wrapper float_left">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home"> <i
                                                    class="flaticon-menu"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab"
                                                href="#menu1"><i class="flaticon-list"></i></a>
                                        </li>
                                    </ul>
                                    <p><span>Showing {{$count}}/{{$all}} results</span></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="x_car_book_tabs_content_main_wrapper">
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane active">
                                            <div class="row">

                                                @forelse($bikes as $bike)
                                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                                            <div class="x_car_offer_starts float_left">

                                                            </div>
                                                            <div class="x_car_offer_img float_left">
                                                                <img src="/storage/bikes/{{$bike->thumbnail}}" alt="img">
                                                            </div>
                                                            <div class="x_car_offer_price float_left">
                                                                <div class="x_car_offer_price_inner">

                                                                    <h3>Rs {{$bike->priceperday}}</h3>
                                                                    <p><span>per</span>
                                                                        <br>/ day
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="x_car_offer_heading float_left">
                                                                <h2><a href="#">{{$bike->name}}</a></h2>
                                                                <p>Best offer</p>
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
                                                <div class="alert alert-danger"><p>No Bikes to Show</p></div>
                                                @endforelse

                                                
                                                

                                                <div class="col-md-12">
                                                    <div style="margin:0; padding-top: 45px;">
                                                        {{ $bikes->links() }}
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div id="menu1" class="tab-pane fade">
                                            <div class="row">

                                                @forelse($bikes as $bike)
                                                <div class="col-md-12">
                                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                                        <div
                                                            class="x_car_offer_starts x_car_offer_starts_list_img float_left">

                                                            <div class="x_car_offer_img x_car_offer_img_list float_left">
                                                                <img src="/images/{{$bike->thumbnail}}" alt="img">
                                                            </div>
                                                            <div
                                                                class="x_car_offer_price x_car_offer_price_list float_left">
                                                                <div
                                                                    class="x_car_offer_price_inner x_car_offer_price_inner_list">

                                                                    <h3>Rs {{$bike->priceperday}}</h3>
                                                                    <p><span>per</span>
                                                                        <br>/ day
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="x_car_offer_starts_list_img_cont">
                                                            <div
                                                                class="x_car_offer_heading x_car_offer_heading_list float_left">
                                                                <h2><a href="#">{{$bike->name}}</a></h2>
                                                                <p>Best Offer</p>
                                                            </div>
                                                            <div
                                                                class="x_car_offer_bottom_btn x_car_offer_bottom_btn_list float_left">
                                                                <ul>
                                                                    <li><a href="{{route('bike.details',['bike'=>$bike])}}">Details</a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger"><p>No Bikes Found</p></div>
                                                </div>
                                                @endforelse



                                                <div class="col-md-12">
                                                    <div style="margin:0; padding-top: 45px;">
                                                        {{ $bikes->links() }}
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
    </div>

    <script>
        
    </script>
@endsection
