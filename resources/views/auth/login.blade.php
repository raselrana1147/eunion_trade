@extends('layouts.app')
@section('title',"Sing In")
@section('ecommerce')
   <div class="sign-in-page">
      <div class="row">
        <!-- Sign-in -->      
<div class="col-md-6 col-sm-6 sign-in">
  <h4 class="">Sign in</h4>
  <div class="social-sign-in outer-top-xs">
    <a href="{{ route('google.login') }}" class="btn-upper btn btn-primary checkout-page-button"><i class="fa fa-google"></i> Sign In with Google</a>
    <a href="{{ route('facebook.login') }}" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
   
  </div>
  <form class="register-form outer-top-xs" action="{{ route('login') }}" method="post" role="form" >
    @csrf
    <div class="form-group">
        <label class="info-title">Email Address <span>*</span></label>
        <input type="email" class="form-control unicase-form-control text-input" name="email" >
    </div>
      <div class="form-group">
        <label class="info-title">Password <span>*</span></label>
        <input type="password" class="form-control unicase-form-control text-input" name="password">
    </div>
      <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
      
  </form>         
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
  <h4 class="checkout-subtitle">Create a new account</h4>
  <form id="submit_singin" data-action="{{ route('register') }}" method="post" class="register-form outer-top-xs" role="form">
    @csrf
       
      <div class="form-group">
        <label class="info-title">Name <span>*</span></label>
        <input type="text" class="form-control unicase-form-control text-input" name="name" >
        <span class="valids error_name" style="color: red;"></span>
      </div>
    <div class="form-group">
        <label class="info-title">Email Address <span>*</span></label>
        <input type="text" class="form-control unicase-form-control text-input" name="email" >
         <span class="valids error_email" style="color: red;"></span>
      </div>
        <div class="form-group">
        <label class="info-title">Phone Number <span>*</span></label>
        <input type="text" class="form-control unicase-form-control text-input" name="phone" >
         <span class="valids error_phone" style="color: red;"></span>
    </div>
        <div class="form-group">
        <label class="info-title">Password <span>*</span></label>
        <input type="password" class="form-control unicase-form-control text-input" name="password">
         <span class="valids error_password" style="color: red;"></span>
    </div>
         <div class="form-group">
        <label class="info-title">Confirm Password <span>*</span></label>
        <input type="password" class="form-control unicase-form-control text-input" name="password_confirmation" >

    </div>
      <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
  </form>
</div>  
    </div>
    </div>
    <br>
@endsection
@section('ecommerce_js')
  <script src="{{ asset('assets/frontend/style/js/auth.js') }}"></script>
@endsection
