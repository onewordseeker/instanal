<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title></title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{ asset('assets/css/sleek.css') }}" />

  

  <!-- FAVICON -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{ asset('assets/plugins/nprogress/nprogress.js') }}"></script>
</head>

</head>
  <body style="background-color: #212a39;" id="body">
      <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card" style="border:none;    background-color: #191c1d;
">
            <div class="card-header" style="background-color: #ffba00;">
              <div class="app-brand" style="background-color: #ffba00;">
              <a href="/index.html">
                <img src="{{asset('assets/img/dog3.jpeg')}}" alt="" height="50" width="50" style="margin-left:-20px">
                <span class="brand-name" style="color:black">MVDG DASHBOARD</span>
              </a>
              </div>
            </div>
            <div class="card-body p-5">

              <h4 class="mb-5" style="color:white">Sign In</h4>
              @if(session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>{{session('success')}}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                @endif
                                                @if(session('error'))
                                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                                <div>
                                                {{session('error')}}
                                                </div>
                                                </div>
                                                @endif
              <form action="{{url('admin/login')}}" method="POST">
                  @csrf
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="email" class="form-control input-lg" name="email" id="email" aria-describedby="emailHelp" placeholder="Username">
                  </div>
                  <div class="form-group col-md-12 ">
                    <input type="password" class="form-control input-lg"  name="password"  id="password" placeholder="Password">
                  </div>
                  <div class="col-md-12">
                    <div class="d-flex my-2 justify-content-between">
                      
                    </div>
                    <style>
                      .btn-submit {
                          background-color: #ffba00;
                      }
                      /* .btn-submit:hover {
                          background-color: transparent;
                          color: #ffba00;
                          border: 1px solid #ffba00;
                      }                       */
                    </style>
                    <button type="submit" class="btn btn-lg btn-submit btn-block mb-4">Sign In</button>
                    <!-- <p>Don't have an account yet ?
                      <a class="text-blue" href="sign-up.html">Sign Up</a> -->
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright pl-0">
        <p class="text-center">&copy; 2022 Metaverse Dog Crypto</p>
      </div>
    </div>
</body>
</html>