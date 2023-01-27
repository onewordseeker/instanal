<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/azia-free/template/page-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Jan 2023 17:53:26 GMT -->
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>Azia Responsive Bootstrap 4 Dashboard Template</title>

    <!-- vendor css -->
    <link href="{{ asset('/lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/typicons.font/typicons.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="{{ asset('/css/azia.css') }}">

  </head>
  <body class="az-body">

    <div class="az-signin-wrapper">
      <div class="az-card-signin">
        <h1 class="az-logo">az<span>i</span>a</h1>
        <div class="az-signin-header">
          <h2>Welcome back!</h2>
          <h4>Please sign in to continue</h4>

          <form action="{{url('/login-post')}}" method="POST">
            @csrf
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="Enter your email" >
            </div><!-- form-group -->
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter your password" >
            </div><!-- form-group -->
            <button class="btn btn-az-primary btn-block">Sign In</button>
          </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">
          <p><a href="#">Forgot password?</a></p>
          <p>Don't have an account? <a href="page-signup.html">Create an Account</a></p>
        </div><!-- az-signin-footer -->
      </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->

    <script src="{{ asset('/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/lib/ionicons/ionicons.js') }}"></script>
    <script src="{{ asset('/lib/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('/lib/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('/lib/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('/lib/peity/jquery.peity.min.js') }}"></script>

    <script src="{{ asset('/js/azia.js') }}"></script>
    <script src="{{ asset('/js/chart.flot.sampledata.js') }}"></script>
    <script src="{{ asset('/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ asset('/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="https://www.bootstrapdash.com/demo/azia-free/js/azia.js"></script>
    <script>
      $(function(){
        'use strict'

      });
    </script>
  </body>

<!-- Mirrored from www.bootstrapdash.com/demo/azia-free/template/page-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Jan 2023 17:53:26 GMT -->
</html>
