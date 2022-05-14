@extends('layouts.app')
@section('title','Ecommerce | Change Password')
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
					       <h4>Change Password</h4>
						</div>
						  <div class="card-body">
								<div class="row">
									<div class="col-md-12">
										
										
										<form id="change_password" class="register-form outer-top-xs" role="form" method="post" data-action="{{ route('customer.change_password') }}">
											@csrf
											<div class="form-group">
												<label class="info-title">Old password</label>
												<input type="password" class="form-control unicase-form-control text-input" name="old_password" >
												<span class="valids error_old_pass" style="color: red;"></span>
											</div>
											<div class="form-group">
												<label class="info-title">New Password</label>
												<input type="password" class="form-control unicase-form-control text-input" name="password" >
												<span class="valids error_new_pass" style="color: red;"></span>
											</div>

											<div class="form-group">
												<label class="info-title">Re Type Password</label>
												<input type="password" class="form-control unicase-form-control text-input" name="password_confirmation" >
											</div>
											<button type="submit" class="btn-upper btn btn-primary checkout-page-button submit_button">
												Save Changes

											</button>
										</form>
										</div>			
									</div>
						  </div>
						</div>
					</div>
				</div>
			</div>
</div>
@endsection
@section('ecommerce_js')
   <script src="{{ asset('assets/frontend/style/js/profile.js') }}"></script>
@endsection
