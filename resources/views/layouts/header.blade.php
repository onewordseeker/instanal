<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/azia-free/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Jan 2023 17:53:18 GMT -->

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <!-- <meta name="twitter:site" content="@bootstrapdash">
    <meta name="twitter:creator" content="@bootstrapdash">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Azia">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png"> -->

    <!-- Facebook -->
    <!-- <meta property="og:url" content="https://www.bootstrapdash.com/azia">
    <meta property="og:title" content="Azia">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:secure_url" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600"> -->

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Instatlytix | Analyze Instagram profile free</title>

    <!-- vendor css -->
    <link href="{{ asset('/lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/typicons.font/typicons.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="{{ asset('/css/azia.css') }}">

</head>

<body>

    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <a href="index.html" class="az-logo"><span></span> azia</a>
                <a href="#" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
            </div><!-- az-header-left -->
            <div class="az-header-menu">
                <div class="az-header-menu-header">
                    <a href="index.html" class="az-logo"><span></span> azia</a>
                    <a href="#" class="close">&times;</a>
                </div><!-- az-header-menu-header -->
                <ul class="nav">
                    <li class="nav-item active show">
                        <a href="index.html" class="nav-link"><i class="typcn typcn-chart-area-outline"></i>
                            Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="lists" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>
                            Lists</a>
                    </li>
                    <li class="nav-item">
                        <a href="form-elements.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>
                            Forms</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link with-sub"><i class="typcn typcn-book"></i> Components</a>
                        <div class="az-menu-sub">
                            <div class="container">
                                <div>
                                    <nav class="nav">
                                        <a href="elem-buttons.html" class="nav-link">Buttons</a>
                                        <a href="elem-dropdown.html" class="nav-link">Dropdown</a>
                                        <a href="elem-icons.html" class="nav-link">Icons</a>
                                        <a href="table-basic.html" class="nav-link">Table</a>
                                    </nav>
                                </div>
                            </div><!-- container -->
                        </div>
                    </li>
                </ul>
            </div><!-- az-header-menu -->
            <div class="az-header-right">
                <div class="col-lg-6 col-md-3" style="padding-left: 0px"><a class="btn btn-outline-indigo btn-block" href={{url('login')}}>Login</a></div><!-- az-header-notification -->
                <div class="col-lg-6 col-md-3" style="padding-left: 0px"><a class="btn btn-outline-indigo btn-block" href={{url('register')}}>Register</a></div><!-- az-header-notification -->
                <div class="dropdown az-profile-menu">
                    <a href="#" class="az-img-user"><img
                            src="https://www.bootstrapdash.com/demo/azia-free/img/faces/face1.jpg" alt=""></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="#" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                                <img src="https://www.bootstrapdash.com/demo/azia-free/img/faces/face1.jpg"
                                    alt="">
                            </div><!-- az-img-user -->
                            <h6>Aziana Pechon</h6>
                            <span>Premium Member</span>
                        </div><!-- az-header-profile -->
                        <a href={{url('profile-update')}} class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account
                            Settings</a>
                        <form action="{{url('logout')}}" method="POST">
                            @csrf
                            <button style="border: none" class="dropdown-item"><i class="typcn typcn-power-outline"></i>
                                Sign Out</button></form>
                    </div><!-- dropdown-menu -->
                </div>
            </div><!-- az-header-right -->
        </div><!-- container -->
    </div><!-- az-header -->
