@extends('layout.app')

@section('content')
    <div class="btc_tittle_main_wrapper">
        <div class="btc_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_left_heading">
                        <h1>Checkout</h1>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_right_heading">
                        <div class="btc_tittle_right_cont_wrapper">
                            <ul>
                                <li><a href="#">Home</a> <i class="fa fa-angle-right"></i>
                                </li>
                                <li><a href="#">Mechanics</a> <i class="fa fa-angle-right"></i>
                                </li>
                                <li>Checkout</li>
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
                        <div class="x_icon_num">
                            <p>1</p>
                        </div>
                        <h5>Time & place</h5>
                    </div>
                    <div class="x_title_num_main_box_wrapper">
                        <div class="x_icon_num ">
                            <p>2</p>
                        </div>
                        <h5>Mechanic</h5>
                    </div>
                    <div class="x_title_num_main_box_wrapper">
                        <div class="x_icon_num">
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

    <div class="x_car_book_sider_main_Wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="x_car_book_left_siderbar_wrapper float_left">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <!-- Filter Results -->
                                <div class="car-filter accordion x_inner_car_acc_accor">
                                    <h3>Appointment Details</h3>
                                    <hr>
                                    <!-- Resources -->
                                    <div class="x_car_access_filer_top_img">
                                        <img src="/storage/mechanics/{{$appointment->mechanic->thumbnail}}" alt="img">
                                        <h3>{{$appointment->mechanic->user->name}}</h3>
                                        <p>Rs {{$appointment->mechanic->price}} </p>
                                    </div>
                                    <hr>
                                    <!-- Company -->
                                    <!-- Attributes -->
                                    <div class="panel panel-default x_car_inner_acc_acordion_padding">
                                        <div class="collapse show">
                                            <div class="panel-body">
                                                <div class="x_car_acc_filter_date">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                
                                                                
                                                                <th scope="col">Subtotal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                               
                                                                <td>Rs {{$appointment->mechanic->price}} </td>
                                                                
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="panel panel-default x_car_inner_acc_acordion_padding x_car_inner_acc_acordion_padding_last">
                                        <div class="panel-heading car_checkout_caret">
                                            <h5 class="panel-title"> <a href="#">Appointment Date</a></h5>
                                        </div>
                                        <div class="collapse show">
                                            <div class="panel-body">
                                                <div class="x_car_acc_filter_date">
                                                    <ul>
                                                        <li>{{$appointment->date}}</li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    
                                    
                                    
                                    
                                    
                                    <div class="x_car_acc_filter_bottom_total">
                                        <ul>
                                            <li>total <span>Rs {{$appointment->mechanic->price}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="x_carbooking_right_section_wrapper float_left">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_car_checkout_right_main_box_wrapper float_left">
                                    <div class="car-filter order-billing margin-top-0">
                                        
                                        <div class="heading-block text-left margin-bottom-0">
                                            <h4>Checkout</h4>
                                        </div>
                                        <hr>
                                        <form id="payment" class="billing-form" method="POST" action="{{route('mech.update',['appointment'=>$appointment->id])}}">
                                            @csrf
                                            <div class="payme-opton">
                                                <div class="heading-block text-left margin-bottom-30">
                                                    <h4>Payment</h4>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="ratio" id="poa" value="poa" checked="">
                                                    <label for="poa">Payment on Arrival</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="ratio" id="khalti" value="khalti">
                                                    <label for="khalti">Pay With Khalti</label>
                                                </div>   
                                            </div>
                                            <div class="col-md-12">
                                                <div class="contect_btn contect_btn_contact">
                                                    <ul>
                                                        <li><input class="btn btn-primary btn-lg btn-block" style="background-color: #4f5dec; color:#ffff" type="submit" name="submit" value="Confirm Appointment" id="appointConfirm">
                                                        </li>
                                                    </ul>
                                                </div>
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
    </div>

    <script>
        $("#payment").on('submit', function(e) {
            e.preventDefault();
            let formdata = $(this).serialize();
            

            $.ajax({
                url: "/mechanic/checkout/done/{{$appointment->id}}",
                type: "POST",
                dataType: 'JSON',
                data: formdata,
                
                success: function(response) {
                    if(response.method === 'khalti'){
                        let checkout = new KhaltiCheckout(config);
                        console.log(response.amount);
                        checkout.show({amount: response.amount});
                    }
                    if(response.message === 'poa'){
                        window.location.href = response.link;
                    }
                }

            })
        })
    </script>
@endsection
