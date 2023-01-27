<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/azia-free/template/page-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Jan 2023 17:53:26 GMT -->
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

    <div class="az-signup-wrapper">
      <div class="az-column-signup-left">
        <div>
          <i class="typcn typcn-chart-bar-outline"></i>
          <h1 class="az-logo">az<span>i</span>a</h1>
          <h5>Responsive Modern Dashboard &amp; Admin Template</h5>
          <p>We are excited to launch our new company and product Azia. After being featured in too many magazines to mention and having created an online stir, we know that BootstrapDash is going to be big. We also hope to win Startup Fictional Business of the Year this year.</p>
          <p>Browse our site and see for yourself why you need Azia.</p>
          <a href="index.html" class="btn btn-outline-indigo">Learn More</a>
        </div>
      </div><!-- az-column-signup-left -->
      <div class="az-column-signup">
        <h1 class="az-logo">az<span>i</span>a</h1>
        <div class="az-signup-header">
          <h2>Get Started</h2>
          <h4>It's free to signup and only takes a minute.</h4>

          <form action="{{url('register_post')}}" method="POST">
            @csrf
            <div class="form-group">
              <label>Firstname &amp; Lastname</label>
              <input type="text" class="form-control" name="name" placeholder="Enter your firstname and lastname">
            </div><!-- form-group -->
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email" placeholder="Enter your email">
            </div><!-- form-group -->
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter your password">
            </div><!-- form-group -->
            <button class="btn btn-az-primary btn-block">Create Account</button>
            <div class="row row-xs">
              <div class="col-sm-6"><button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button></div>
              <div class="col-sm-6 mg-t-10 mg-sm-t-0"><button class="btn btn-primary btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button></div>
            </div><!-- row -->
          </form>
        </div><!-- az-signup-header -->
        <div class="az-signup-footer">
          <p>Already have an account? <a href={{url('login')}}>Sign In</a></p>
        </div><!-- az-signin-footer -->
      </div><!-- az-column-signup -->
    </div><!-- az-signup-wrapper -->

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

<!-- Mirrored from www.bootstrapdash.com/demo/azia-free/template/page-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Jan 2023 17:53:26 GMT -->
</html>
