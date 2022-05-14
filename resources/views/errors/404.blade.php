@extends('layouts.app')
@section('title','Ecommerce | 404')
@section('breadcrumb')
	<div class="breadcrumb">
	  <div class="container">
	    <div class="breadcrumb-inner">
	      <ul class="list-inline list-unstyled">
	        <li><a href="{{ route('front.index') }}">Home</a></li>
	        <li class='active'>404 Page</li>
	      </ul>
	    </div>
	    <!-- /.breadcrumb-inner --> 
	  </div>
	  <!-- /.container --> 
	</div>
@endsection
@section('ecommerce')
			<div class="container">
				<div class="x-page inner-bottom-sm">
					<div class="row">
						<div class="col-md-12 x-text text-center">
							<h1>404</h1>
							<p>We are sorry, the page you've requested is not available. </p>
							<form role="form" class="outer-top-vs outer-bottom-xs">
		                        <input placeholder="Search" autocomplete="off">
		                        <button class="  btn-default le-button">Go</button>
		                    </form>
							<a href="{{ route('front.index') }}"><i class="fa fa-home"></i> Go To Homepage</a>
						</div>
					</div><!-- /.row -->
				</div><!-- /.sigin-in-->
			</div><!-- /.container -->
@endsection