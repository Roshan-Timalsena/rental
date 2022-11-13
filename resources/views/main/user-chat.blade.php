<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Bike Rental and Servicing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Roshan" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/layout/assets/images/favicon.ico">

    <!-- App css -->
    <link href="/layout/assets/css/config/purple/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="/layout/assets/css/config/purple/app.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="/layout/assets/css/config/purple/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" />
    <link href="/layout/assets/css/config/purple/app-dark.min.css" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="/layout/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>


</head>

<!-- body start -->

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "condensed", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-end mb-0">

                    <li class="d-none d-lg-block">
                        <form class="app-search">
                            <div class="app-search-box dropdown">

                            </div>
                        </form>
                    </li>

                    <li class="dropdown d-inline-block d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-search noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                            <form class="p-3">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>




                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">

                            <span class="pro-user-name ms-1">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>



                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="/" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="/layout/assets/images/sasda.png" alt="logo" height="22">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-lg">
                            <img src="/layout/assets/images/asdasd.png" alt="logo" height="20">
                            <!-- <span class="logo-lg-text-light">U</span> -->
                        </span>
                    </a>

                    <a href="/" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="/layout/assets/images/asdads.png" alt="logo" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="/layout/assets/images/sadasd.png" alt="logo" height="20">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">


                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse"
                            data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>



                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->

        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->


        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Chat</a></li>
                                        <li class="breadcrumb-item active">Chat</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Chat</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <!-- start chat users-->
                        <div class="col-xl-3 col-lg-4">
                            <div class="card">
                                <div class="card-body">



                                    <!-- start search box -->

                                    <!-- end search box -->



                                    <h6 class="font-13 text-muted text-uppercase mb-2">Contacts</h6>

                                    <!-- users -->
                                    @php
                                        $names = array_keys($users);
                                        
                                    @endphp

                                    @foreach ($names as $name)
                                        <div class="row user" id="{{ $users[$name] }}">
                                            <div class="col">
                                                <div data-simplebar style="max-height: 375px;">
                                                    <a href="javascript:void(0);" class="text-body">
                                                        <div class="d-flex align-items-start p-2">

                                                            <div class="w-100">
                                                                <h5 class="mt-0 mb-0 font-14">
                                                                    <span
                                                                        class="float-end text-muted fw-normal font-11"></span>
                                                                    {{ $name }}
                                                                </h5>
                                                                <p class="mt-1 mb-0 text-muted font-13">

                                                                    <span class="w-25 float-end text-end"><span
                                                                            class="badge badge-soft-danger unread"></span></span>
                                                                    {{-- <span class="w-75">How are you today?</span> --}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>


                                                </div>
                                                <!-- end slimscroll-->
                                            </div>
                                            <!-- End col -->
                                        </div>
                                    @endforeach
                                    <!-- end users -->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div>
                        <!-- end chat users-->

                        <!-- chat area -->
                        <div class="col-xl-9 col-lg-8" id="chat-area">


                        </div>
                        <!-- end chat area-->

                    </div>

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; Bike Rental and Servicing <a href="#"></a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">About Us</a>

                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="/layout/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="/layout/assets/js/app.min.js"></script>

    <script>
        let to = "{{ $to }}";
        let from = "{{ Auth::id() }}";
        $(document).ready(function() {

            $('.user').on('click', function() {
                $('.user').removeClass('bg-light');
                $(this).addClass('bg-light');
                to = $(this).attr('id');
                $(this).find('.unread').html('');
                
                $.ajax({
                    method: "get",
                    url: '/get/messages/' + to,
                    data: "",
                    success: function(data) {
                        $("#chat-area").html(data);
                        scrollIt();
                    }
                });
            })

        })
        // $(".user").find('#' + to).click();

        Pusher.logToConsole = true;

        var pusher = new Pusher('7fc1d1cf10bd9050fd68', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data));
            if (from == data.from) {
                // alert("Sender");
            } else if (from == data.to) {
                if (to == data.from) {
                    $("#" + data.from).click();
                    scrollIt();
                } else {
                    $("#" + data.from).find('.unread').html('unread');
                }
            }
        });
    </script>

</body>

</html>
