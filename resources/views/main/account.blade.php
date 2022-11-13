@extends('layout.app')
@section('content')
    <div class="btc_tittle_main_wrapper">
        <div class="btc_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_left_heading">
                        <h1>User Account</h1>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_right_heading">
                        <div class="btc_tittle_right_cont_wrapper">
                            <ul>
                                <li><a href="#">Home</a> <i class="fa fa-angle-right"></i>
                                </li>
                                <li><a href="#">User</a> <i class="fa fa-angle-right"></i>
                                </li>
                                <li>Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="x_car_donr_main_box_wrapper float_left">
        <div class="container">
            <div class="x_car_donr_main_box_wrapper_inner">
                <form method="POST" id="update">
                    @csrf
                    <div class="order-done"> <i class="icon-checked"><img src="images/icon-checked.png" alt=""></i>
                        <h4>You can view or Update Your Account Details</h4>

                        <hr>

                        <div class="col-md-12">
                            <div id="success-div">
                                <p id="success" style="color: green"></p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div id="fail-div">
                                <ul id="fail">
                                    
                                </ul>
                                {{-- <p id="fail" style="color: red"></p> --}}
                            </div>
                        </div>
                        <ul class="row list-unstyled">


                            <li class="col-md-12">
                                Name: <input type="text" name="name" value="{{ $user->name }}">
                            </li>

                            <li class="col-md-12">
                                Email: <input type="email" name="email" value="{{ $user->email }}">
                            </li>

                            <li class="col-md-12">
                                License: <input type="text" name="license" value="{{ $user->license }}">
                            </li>

                            <li class="col-md-12">
                                Phone: <input type="text" name="phone" value="{{ $user->phone }}">
                            </li>
                            <li class="col-md-12">
                                For changing your password logout and click forget password in the login page.
                            </li>

                        </ul>
                        <hr>
                        <div class="contect_btn contect_btn_contact">

                            <ul>
                                <li><input type="submit" value="Update" name="submit"
                                        class="btn btn-primary btn-lg btn-block"
                                        style="background-color: #4f5dec; color:#ffff">
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#update').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: "{{ route('user.update', ['user' => $user->id]) }}",
                method: "POST",
                data: formData,
                dataType: "JSON",
                success: function(res) {
                    if (res.status == 'success') {
                        $("#fail-div").removeClass("alert alert-danger");
                        $("#fail").html('');
                        $("#success-div").addClass("alert alert-success");
                        $("#success").html(res.message);
                        location.reload();
                    }
                    if (res.status == 'fail') {
                        $("#fail-div").addClass("alert alert-danger")
                        
                        $("#fail").html(res.message);
                        $("#fail").html(res.message.name);
                        $("#fail").html(res.message.email);
                        $("#fail").html(res.message.license);
                        $("#fail").html(res.message.phone);
                        $("#success-div").removeClass("alert alert-success");
                        $("#success").html('');
                    }
                }
            })

        })
    </script>
@endsection
