<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin | Bike Rental and Servicing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Roshan" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/layout/assets/images/favicon.ico">

    <link href="/layout/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/layout/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="/layout/assets/css/config/purple/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="/layout/assets/css/config/purple/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="/layout/assets/css/config/purple/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" />
    <link href="/layout/assets/css/config/purple/app-dark.min.css" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="/layout/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<!-- body start -->

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": false}'>

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
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <i class="fe-search noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                            <form class="p-3">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen"
                            href="#">
                            <i class="fe-maximize noti-icon"></i>
                        </a>
                    </li>


                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                      
                            <span class="pro-user-name ms-1">
                                {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{ route('logout') }}" class="dropdown-item notify-item" 
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>

                    

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="#" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="/layout/assets/images/sasda.png" alt="logo" height="22">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-lg">
                            <img src="/layout/assets/images/asdasd.png" alt="logo" height="20">
                            <!-- <span class="logo-lg-text-light">U</span> -->
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light text-center">
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
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

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
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">
                    
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                            data-bs-toggle="dropdown">{{Auth::user()->name}}</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out me-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>
                    <p class="text-muted">Admin Head</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menu-title">ADMIN</li>

                        <li>
                            <a href="#sidebarDashboards" data-bs-toggle="collapse">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                
                                <span> Dashboard </span>
                            </a>
                            
                        </li>

                        <li class="menu-title mt-2">Bookings</li>
                        <li>
                            <a href="#bookings" data-bs-toggle="collapse">
                                <i data-feather="globe" class="icon-dual"></i>
                                <span> bookings </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="bookings">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{route('admin.requested')}}">REQUESTED</a>
                                    </li>
                                    <li>
                                        <a href="{{route('bikes.confirmed')}}">CONFIRMED</a>
                                    </li>
                                    <li>
                                        <a href="{{route('bikes.cancelled')}}">CANCELLED</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.allBookings')}}">ALL</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title mt-2">Brands</li>
                        <li>
                            <a href="#brands" data-bs-toggle="collapse">
                                <i data-feather="globe" class="icon-dual"></i>
                                <span> brands </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="brands">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{route('admin.allBrands')}}">ALL</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.addBrand')}}">ADD</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="menu-title mt-2">Bikes</li>

                        {{-- <li>
                            <a href="apps-chat.html">
                                <i class="mdi mdi-forum-outline"></i>
                                <span> Chat </span>
                            </a>
                        </li> --}}

                        <li>
                            <a href="#bikes" data-bs-toggle="collapse">
                                
                                <i data-feather="aperture" class="icon-dual"></i>
                                <span> bikes </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="bikes">
                                <ul class="nav-second-level">
                                    
                                    <li>
                                        <a href="{{route('admin.bikes')}}">ALL</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.addBike')}}">ADD</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title mt-2">MECHANICS</li>

                        <li>
                            <a href="#mechanics" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-circle-outline"></i>
                                <span> mechanics </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="mechanics">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{route('admin.allMech')}}">ALL</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.addMech')}}">ADD</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title mt-2">REVIEWS</li>

                        <li>
                            <a href="#reviews" data-bs-toggle="collapse">
                                <i class="mdi mdi-black-mesa"></i>
                                <span> reviews </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="reviews">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{route('admin.allReviews')}}">ALL</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title mt-2">USERS</li>

                        <li>
                            <a href="#users" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-multiple-outline"></i>
                                <span> users </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="users">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{route('admin.allUsers')}}">ALL</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Brands</a></li>
                                        <li class="breadcrumb-item active">All</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">All Brands</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{route('admin.addBrand')}}" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                        <i class="mdi mdi-plus-circle"></i> Add Brand
                                    </a>
                                    <h4 class="header-title mb-4">Manage Brands</h4>
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                            <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>Name</th>
                                                <th class="hidden-sm">Action</th>
                                            </tr>
                                            </thead>
    
                                            <tbody>
                                            @foreach($brands as $brand)
                                            <tr>
                                                <td>{{$count++}}</td> 
                                                <td>{{$brand->name}}</td> 
                                                <td>
                                                    <div class="btn-group dropdown">
                                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href={{route('admin.singleBrand',['brand'=>$brand->id])}}><i class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                                            <a class="dropdown-item" href="{{route('admin.removeBrand',['brand'=>$brand->id])}}"><i class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>document.write(new Date().getFullYear())</script> &copy; Bike Rental and Servicing <a
                                href="#"></a>
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

    <div class="rightbar-overlay"></div>


    <!-- Vendor js -->
    <script src="/layout/assets/js/vendor.min.js"></script>

    <!-- third party js -->
    <script src="/layout/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/layout/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/layout/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/layout/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <!-- third party js ends -->

    <!-- Tickets js -->
    <script src="/layout/assets/js/pages/tickets.js"></script>

    <!-- App js -->
    <script src="/layout/assets/js/app.min.js"></script>

    {{-- <script>
        $("#mytable").DataTable();
    </script> --}}

</body>

</html>