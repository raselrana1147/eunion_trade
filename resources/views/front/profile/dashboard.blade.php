@extends('layouts.app')
@section('title','Ecommerce | Dashboard')
@section('ecommerce_css')
	
@endsection
@section('ecommerce')
<div class="container">
	<div class="track-order-page">
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-header header-title bg-header">
				       <h4>Menu List</h4>
					</div>
				  <div class="card-body">

				 	@include('front.profile.sidebar')

				  </div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
				<div class="card-header header-title bg-header">
			       <h4>Dasboard</h4>
				</div>
				  <div class="card-body">
				    
				  </div>
				</div>
			</div>
		</div>
	</div>
</div><br><br>
@endsection