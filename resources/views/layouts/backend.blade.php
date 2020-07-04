<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/logo.svg')}}">
    <link href="{{asset('assets/plugins/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
</head>

<body>
{{--Preloader start--}}
@php
    $user = Auth::user();
@endphp
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/>
        </svg>
    </div>
</div>

{{--Main wrapper start--}}

<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <div class="brand-logo"><b><img src="{{asset('assets/images/logo.svg')}}" alt="">
            </b><span class="brand-title">ECOMERCE</span>
        </div>
        <div class="nav-control">
            <div class="hamburger"><span class="line"></span> <span class="line"></span> <span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <div class="header-right">
                <ul>
                    <li class="icons">
                        <a href="javascript:void(0)" class="log-user">
                            <img src="{{asset('avatar/default.png')}}" alt=""> <span>{{Auth::user()->name}}</span> <i
                                    class="fa fa-caret-down f-s-14" aria-hidden="true"></i>
                        </a>
                        <div class="drop-down dropdown-profile animated bounceInDown">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-power"></i>
                                            <span>Logout</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--**********************************
        Header end
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <li class="nav-label text-center">
                @if($user->is_admin())Administrator
                @elseif($user->is_client())Client
                @elseif($user->is_user()) Delivery Man
                @endif
            </li>
            <div class="d-flex justify-content-center">
                <img style="border-radius: 50%;width: 22%;" src="{{asset('avatar/default.png')}}">
            </div>
            <ul class="metismenu mt-lg-5" id="menu">
                @if($user->is_admin())
                    <li class="{{Route::is('orders')?'active':''}} mega-menu mega-menu-lg">
                        <a class="has-arrow" href="{{route('orders')}}" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i><span class="nav-text">Welcome</span></a>
                    </li>
                    <li class="{{Route::is('dashboard')?'active':''}} mega-menu mega-menu-sm">
                        <a class="has-arrow" href="{{route('dashboard')}}" aria-expanded="false">
                            <i class="mdi mdi-page-layout-body"></i><span class="nav-text">Dashboard</span></a>
                    </li>
                    <li class="{{Route::is('product')?'active':''}}">
                        <a class="has-arrow" href="{{route('product')}}" aria-expanded="false">
                            <i class="mdi mdi-email-outline"></i> <span class="nav-text">Products</span>
                        </a>
                    </li>
                    <li class="{{Route::is('package')?'active':''}}">
                        <a class="has-arrow" href="{{route('package')}}" aria-expanded="false">
                            <i class="mdi mdi-application"></i><span class="nav-text">Packages</span>
                        </a>
                    </li>
                    <li class="{{Route::is('users')?'active':''}}">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="mdi mdi-ticket"></i><span class="nav-text">Users</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('clients')}}">Clients</a>
                            </li>
                            <li><a href="{{route('delivery')}}">Delivery</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{Route::is('places')?'active':''}} mega-menu mega-menu-lg">
                        <a class="has-arrow" href="{{route('places')}}" aria-expanded="false">
                            <i class="mdi mdi-chart-bar"></i> <span class="nav-text">Places</span>
                        </a>
                    </li>
                    <li class="{{Route::is('areas')?'active':''}} mega-menu mega-menu-lg">
                        <a class="has-arrow" href="{{route('areas')}}" aria-expanded="false">
                            <i class="mdi mdi-chart-bar"></i> <span class="nav-text">Areas</span>
                        </a>
                    </li>
                @endif
                @if($user->is_client())
                    <li class="{{Route::is('client-dashboard')?'active':''}} mega-menu mega-menu-lg">
                        <a class="has-arrow" href="{{route('client-dashboard')}}" aria-expanded="false">
                            <i class="mdi mdi-chart-bar"></i> <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="{{Route::is('catalog')?'active':''}} mega-menu mega-menu-lg">
                        <a class="has-arrow" href="{{route('catalog')}}" aria-expanded="false">
                            <i class="mdi mdi-chart-bar"></i> <span class="nav-text">Catalog</span>
                        </a>
                    </li>
                    <li class="{{Route::is('client-places')?'active':''}} mega-menu mega-menu-lg">
                        <a class="has-arrow" href="{{route('client-places')}}" aria-expanded="false">
                            <i class="mdi mdi-chart-bar"></i> <span class="nav-text">Places</span>
                        </a>
                    </li>
                    <li class="{{Route::is('order-history')?'active':''}} mega-menu mega-menu-lg">
                        <a class="has-arrow" href="{{route('order-history')}}" aria-expanded="false">
                            <i class="mdi mdi-chart-bar"></i> <span class="nav-text">Order history</span>
                        </a>
                    </li>
                    <li class="{{Route::is('client-profile')?'active':''}} mega-menu mega-menu-lg">
                        <a class="has-arrow" href="{{route('client-profile')}}" aria-expanded="false">
                            <i class="mdi mdi-chart-bar"></i> <span class="nav-text">Profile</span>
                        </a>
                    </li>
                @endif
                @if($user->is_user())
                    <li class="{{Route::is('order-list')?'active':''}} mega-menu mega-menu-lg">
                        <a class="has-arrow" href="{{route('order-list')}}" aria-expanded="false">
                            <i class="mdi mdi-chart-bar"></i> <span class="nav-text">Order List</span>
                        </a>
                    </li>
                    <li class="{{Route::is('user-profile')?'active':''}} mega-menu mega-menu-lg">
                        <a class="has-arrow" href="{{route('user-profile')}}" aria-expanded="false">
                            <i class="mdi mdi-chart-bar"></i> <span class="nav-text">Profile</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    @yield('content')
    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; Designed by <a></a>, Developed by Rismi</a> 2020</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<script src="{{asset('assets/plugins/common/common.min.js')}}"></script>
<script src="{{asset('assets/js/custom.min.js')}}"></script>
{{--<script src="{{asset('assets/js/settings.js')}}/"></script>--}}
{{--<script src="{{asset('assets/js/gleek.js')}}"></script>--}}
<script src="{{asset('assets/js/styleSwitcher.js')}}"></script>

{{--<script src="{{asset('assets/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>--}}
</body>

</html>