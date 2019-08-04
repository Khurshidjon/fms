<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FMS | Fly Mail Service</title>
  <!-- Favicons -->
  <link href="{{asset('frontend/img/logo.png')}}" rel="icon">
  <link href="{{asset('frontend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('frontend/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('frontend/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
  
  <script src="{{asset('frontend/lib/jquery/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/js/scripts.js') }}"></script> 

  @stack('script')

  <!-- Main Stylesheet File -->
  <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
  <style>
    div.box {
      position: relative;
    }

    div.alert {
      position: absolute;
      top: 0px;
      right: 50px;
      z-index: 100;
      background-color: #2196F3;
      color: #ffffff;
    }
  </style>
</head>

<body>
 
  @include('includes.header')

  <main id="main">
    @yield('content')
  </main>
  @include('includes.footer')

  <script src="{{asset('frontend/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('frontend/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('frontend/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('frontend/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('frontend/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/lib/isotope/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/lib/lightbox/js/lightbox.min.js')}}"></script>
  <script src="{{asset('frontend/lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
  <!-- Contact Form JavaScript File -->

  <!-- Template Main Javascript File -->
  <script src="{{asset('frontend/js/main.js')}}"></script>
</body>

</html>