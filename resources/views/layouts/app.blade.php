<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themesground.com/Lotus/V1/HTML/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jan 2022 07:16:11 GMT -->
<head>
<!-- Meta -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/font-awesome.css')}}">
<link rel="stylesheet" href="{{ asset('assets/frontend/style/css/custom.css')}}">
 <link href="{{ asset('assets/frontend/style/css/toastr.css')}}" rel="stylesheet" type="text/css">
@yield('ecommerce_css')

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->

  @include('front.files.header')
  @yield('breadcrumb')
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-vs" id="top-banner-and-menu">
  <div class="container">
  @section('ecommerce')
  @show
</div>

  @include('front.files.footer')
 
<script src="{{ asset('assets/frontend/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{ asset('assets/frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{ asset('assets/frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{ asset('assets/frontend/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{ asset('assets/frontend/assets/js/echo.min.js')}}"></script> 
<script src="{{ asset('assets/frontend/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{ asset('assets/frontend/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{ asset('assets/frontend/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="{{ asset('assets/frontend/text/javascript" src="assets/js/lightbox.min.js')}}"></script> 
<script src="{{ asset('assets/frontend/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{ asset('assets/frontend/assets/js/wow.min.js')}}"></script> 
<script src="{{ asset('assets/frontend/assets/js/scripts.js')}}"></script>
<script src="{{ asset('assets/frontend/style/js/toastr.js')}}"></script>
<script src="{{ asset('assets/frontend/style/js/cart.js')}}"></script>
<script src="{{ asset('assets/frontend/style/js/wishlist.js')}}"></script>
<script src="{{ asset('assets/frontend/style/js/comparelist.js')}}"></script>
<script src="{{ asset('assets/frontend/style/js/common.js')}}"></script>
<script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
 </script>

   <script>
       @if(Session::has('message'))
         var type="{{Session::get('alert-type','info')}}"
         switch(type){
             case 'info':
                  toastr.info("{{ Session::get('message') }}");
                  break;
             case 'success':
                 toastr.success("{{ Session::get('message') }}");
                 break;
             case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                 break;
             case 'error':
                 toastr.error("{{ Session::get('message') }}");
                break;
         }
       @endif
 </script>
@yield('ecommerce_js')
</body>

<!-- Mirrored from themesground.com/Lotus/V1/HTML/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jan 2022 07:20:18 GMT -->
</html>