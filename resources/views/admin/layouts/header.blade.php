<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>MVDG DASHBOARD</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{asset('assets/plugins/toaster/toastr.min.css" rel="stylesheet')}}" />
  <link href="{{asset('assets/plugins/nprogress/nprogress.css" rel="stylesheet')}}" />
  <link href="{{asset('assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet')}}"/>
  <link href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet')}}" />
  <link href="{{asset('assets/plugins/ladda/ladda.min.css" rel="stylesheet')}}" />
  <link href="{{asset('assets/plugins/select2/css/select2.min.css" rel="stylesheet')}}" />
  <link href="{{asset('assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet')}}" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{asset('assets/css/sleek.css')}}" />

  <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" />

  <!-- FAVICON -->
  <link href="assets/img/favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{asset('assets/plugins/nprogress/nprogress.js')}}"></script>
  <script src="assets/plugins/jquery/jquery.min.js"></script>

</head>


  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

              <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand" style="background-color: #ffba00;">
              <a href="/index.html">
                <img src="{{asset('assets/img/dog3.jpeg')}}" alt="" height="50" width="50" style="margin-left:-20px">
                <span class="brand-name" style="color:black">MVDG DASHBOARD</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">


                 <li >
                              <a class="sidenav-item-link" href="{{url('index')}}">
                                <span class="nav-text">Dashboard</span>

                              </a>
                            </li>
                            <hr class="separator" />
              <li >
                              <a class="sidenav-item-link" href="{{url('users')}}">
                                <span class="nav-text">USERS</span>

                              </a>
                            </li>
                            <hr class="separator" />
              <li >
                              <a class="sidenav-item-link" href="{{url('staking')}}">
                                <span class="nav-text">STAKING DETAILS</span>

                              </a>
                            </li>
                            <hr class="separator" />
              <li >
                              <a class="sidenav-item-link" href="{{url('tickets')}}">
                                <span class="nav-text">TICKETS</span>

                              </a>
                            </li>
                            <hr class="separator" />
              <li >
                              <a class="sidenav-item-link" href="{{url('transactions')}}">
                                <span class="nav-text">TRANSACTIONS</span>

                              </a>
                            </li>
                            <hr class="separator" />
              <li >
                              <a class="sidenav-item-link" href="{{url('airdrop')}}">
                                <span class="nav-text">AIRDOP</span>

                              </a>
                            </li>
                            <hr class="separator" />
              <li >
                              <a class="sidenav-item-link" href="{{url('wallets')}}">
                                <span class="nav-text">WALLETS</span>

                              </a>
                            </li>
                            <hr class="separator" />
              <li >
                              <a class="sidenav-item-link" href="{{url('withdrawls')}}">
                                <span class="nav-text">WITHDRAWLS</span>

                              </a>
                            </li>
                            <hr class="separator" />
              <li >
                              <a class="sidenav-item-link" href="{{url('applications')}}">
                                <span class="nav-text">APPLICATIONS</span>

                              </a>
                            </li>
                              <hr class="separator" />

              <li >
                              <a class="sidenav-item-link" href="{{url('packages')}}">
                                <span class="nav-text">STAKING PACKAGES</span>

                              </a>
                            </li>
                            <hr class="separator" />

              </ul>

            </div>

            <hr class="separator" />


          </div>
        </aside>



      <div class="page-wrapper">
                  <!-- Header -->
          <header class="main-header " id="header" >
            <nav class="navbar navbar-static-top navbar-expand-lg" style="display: flex;justify-content:space-between;color:white;border:none;background-color: #212a39;">
            <button id="sidebar-toggler" class="sidebar-toggle" style="border: none;">
                  <span class="sr-only">Toggle navigation</span>
                </button>
                <ul class="nav navbar-nav">
                  <!-- Github Link Button -->
                  <!-- User Account -->
                  <!-- Sidebar toggle button -->
                  <li class="">
                    <button href="#" class="dropdown-toggle nav-link" style="color:white">

                      <span class="d-none d-lg-inline-block">{{Auth()->user()->name}}</span>
                    </button>
                    <style>
                      .dropdown-hide{
                        display: none;
                      }
                      .dropdown-toggled{
                        position: absolute;
                        right: 1vw;
                        top:90px;
                        background: rgb(74,74,74);
background: linear-gradient(90deg, rgba(74,74,74,1) 100%, rgba(0,212,255,1) 100%, rgba(69,64,64,1) 100%);                        border-radius: 20px;
                      }
                    </style>
                    <ul class="dropdown-toggled dropdown-hide p-3">
                      <!-- User image -->
                      <li class="dropdown-header">
                        <!--<img src="{{asset('assets/img/user/user.png')}}" class="img-circle" alt="User Image" />-->
                        <div class="d-inline-block" style="color:white">
                        {{Auth()->user()->name}} <br><small class="pt-1">{{Auth()->user()->email}}</small>
                        </div>
                      </li>
                      <li>
                        <a  href="{{url('admin/users/changePass/'.Auth()->user()->id)}}"> <i class="mdi mdi-settings"></i> Change Password </a>
                      </li>

                      <li>
                        <a  href="{{url('logout')}}"> <i class="mdi mdi-logout"></i> Log Out </a>
                      </li>
                    </ul>
                  </li>
                </ul>
            </nav>


          </header>

