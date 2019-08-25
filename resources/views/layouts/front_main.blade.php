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
    .video-alert-message{
      max-height: 17.2em;
      max-width: 35em;
      border-radius: 10px;
      right:0;
      bottom: 30px;
      position:fixed;
      background: darkgrey;
      z-index: 1000000;
      border: 10px solid #ff5e00;
    }
    @media (max-width: 600px) {
      .video-alert-message video{
          max-height: 17.2em;
          max-width: 20.9em;
          border-radius: 10px;
          right:1.5em;
          bottom: 30px;
          position:fixed;
          background: darkgrey;
          z-index: 100;
          border: 10px solid #ff5e00;
      }
      .video-alert-message span.close{
        position: absolute;
        border: 3px solid #ff5e00;
        border-radius: 50%;
        width:40px;
        color:#ff5e00;
        text-align:center;
        cursor:pointer;
        padding: 5px;
        right: 1em !important;
        top: -7em !important;
        z-index: 101;
        background: #ffffff;
    }  
    }
    .video-alert-message span.close{
        position: absolute;
        border: 3px solid #ff5e00;
        border-radius: 50%;
        width:40px;
        color:#ff5e00;
        text-align:center;
        cursor:pointer;
        padding: 5px;
        right: 0;
        z-index: 101;
        background: #ffffff;
    }
    .video-alert-message span.close:hover{
      background: #002e5b;
      color: #ffffff;
      border: 3px solid #ffffff;
    }
    figure .link-preview{
      left: calc(50%) !important;
    } 
    figure:hover .link-preview{
      left: calc(50%) !important;
    } 
  </style>
</head>

<body>
 
  @include('includes.header')

  <main id="main">
    @yield('content')
  </main>
    <div class="">
          <div class="video-alert-message">
            <span class="close">
              <i class="fa fa-close"></i>
            </span>
            <!-- <video id="video" loop>
              <source src="{{ asset('frontend/video/reklama2.mp4') }}" type="video/mp4">
              <source src="{{ asset('frontend/video/reklama.MP4') }}" type="video/mp4">

            </video> -->
            <video controls autoplay id="myVideo" >
 
            </video>
          </div>
    </div>

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
  <script>
    $(function(){
      $('.video-alert-message ').on('click', '.close', function(){
          $(this).parent().remove();
      })
      
      $(window).load(function(){
        $("#video").attr('autoplay', true);
        $("#video").attr('controls', true);
      })      
    })
      var videoSource = new Array();
      videoSource[0]="{{ asset('frontend/video/reklama2.mp4') }}";
      videoSource[1]="{{ asset('frontend/video/reklama.MP4') }}";
      var videoCount = videoSource.length;
      document.getElementById("myVideo").setAttribute("src",videoSource[0]);
      
      // Create a function to load and play the videos.

      function videoPlay(videoNum)
      {
          document.getElementById("myVideo").setAttribute("src",videoSource[videoNum]);
          document.getElementById("myVideo").load();
          document.getElementById("myVideo").play();
      }
      document.getElementById('myVideo').addEventListener('ended',myHandler,false);
        function myHandler() {
          i = 1;
          if(i == (videoCount-1)){
            videoPlay(i);
          }
            else{
              videoPlay(i);
          }
             i++;
       }
  </script>

</body>

</html>