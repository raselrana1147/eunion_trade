@extends('layouts.app')
@section('title','Ecommerce | Checkout')
@section('breadcrumb')
	<div class="breadcrumb">
	  <div class="container">
	    <div class="breadcrumb-inner">
	      <ul class="list-inline list-unstyled">
	        <li><a href="{{ route('front.index') }}">Home</a></li>
	        <li class='active'>Checkout</li>
	      </ul>
	    </div>
	   
	  </div>
	 
	</div>
@endsection
@section('ecommerce')
		<div class="container">
			<div class="checkout-box ">
				<div class="row">
					<div class="col-md-6">
	<div class="panel-group checkout-steps" id="accordion">
	<div class="panel panel-default checkout-step-01">

		<!-- panel-heading -->
			<div class="panel-heading">
	    	<h4 class="unicase-checkout-title">
		        <a data-toggle="collapse" class="">
		          <span><i class="fa fa-info"></i></span>Billing Details
		        </a>
		     </h4>
	    </div>
	    <!-- panel-heading -->

		<div  class="card">
		    <div class="panel-body">
				<div class="row">		
					<div class="col-12 col-12 already-registered-login">
						
						<form action="{{ route('submit.checkout') }}" class="register-form" role="form" method="post">
							@csrf
						<div class="form-group">
						    <label class="info-title">Name <span>*</span></label>
						    <input type="text" class="form-control unicase-form-control text-input" name="name" value="{{Auth::user()->name}}" required>
						  </div>

						  <div class="form-group">
						    <label class="info-title">Email <span>*</span></label>
						    <input type="text" class="form-control unicase-form-control text-input" name="email" value="{{Auth::user()->email}}" required>
						    
						  </div>
						  <div class="form-group">
						    <label class="info-title">Phone <span>*</span></label>
						    <input type="text" class="form-control unicase-form-control text-input" name="phone" value="{{Auth::user()->phone}}" required>
						  </div>

						  <div class="form-group">
						    <label class="info-title">Zip/Postal <span>*</span></label>
						    <input type="text" class="form-control unicase-form-control text-input" name="zip_code" required>
						  </div>

						   <div class="form-group">
						    <label class="info-title">Address <span>*</span></label>
						    <textarea rows="4" cols="20" name="address" required="" class="form-control unicase-form-control text-input">{{Auth::user()->address}}</textarea>
						  </div>

						   <div class="form-group">
						    <label class="info-title">City <span>*</span></label>
						   <select class="form-control unicase-form-control selectpicker" required name="city">
							   	<option value="">--Select options--</option>
							   	<option value="Dhaka">Dhaka</option>
							   	<option value="Mymensing">Mymensing</option>
							   	<option value="Rajshahi">Rajshahi</option>
							   	<option value="Rangpur">Rangpur</option>
							   	<option value="Barishal">Barishal</option>
							   	<option value="Khulna">Khulna</option>
							   	<option value="Chittagong">Chittagong</option>
							   	<option value="Sylhet">Sylhet</option>
						   </select>
						  </div>

						   <div class="form-group">
						    <label class="info-title">Order Note <span>(Optional)</span></label>
						    <textarea rows="4" cols="20" name="note" class="form-control unicase-form-control text-input"></textarea>
						  </div>
					</div>	
					<!-- already-registered-login -->		

				</div>			
			</div>
			<!-- panel-body  -->

		</div><!-- row -->
	</div>
	                       
	</div><!-- /.checkout-steps -->
	</div>
	<div class="col-md-6">
						<!-- checkout-progress-sidebar -->
	<div class="checkout-progress-sidebar ">
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
			    	<h4 class="unicase-checkout-title">Your Order Detail</h4>
			    </div>
			 <div  class="card">
			     <div class="panel-body">
			 		<div class="row">		
			 			<div class="col-12 col-12 already-registered-login">
			 					<div class="shopping-cart">
			 						<div class="table-responsive">
			 							<table class="table">
			 								<thead>
			 									<tr>
			 										
			 										<th class="cart-product-name item">Product Name</th>
			 										<th class="cart-product-name item">Unit Price</th>
			 										<th class="cart-qty item">Quantity</th>
			 										<th class="cart-sub-total item">Subtotal</th>
			 									</tr>
			 								</thead><!-- /thead -->
			 								
			 								<tbody>
			 									@foreach ($carts as $cart)
			 									<tr>
			 										
			 										<td class="cart-product-name-info">
			 											<h4 class='cart-product-description'><a href="{{ route('product.detail',$cart->product->slug) }}">{{$cart->product->name}}</a>
			 											</h4>
			 										</td>
			 										<td class="cart-product-quantity">
			 											<span>
			 												{{currency().number_format($cart->product->current_price,2)}}
			 												 
			 											</span>
			 							            </td>
			 							            <td class="cart-product-quantity">
			 											<span>{{$cart->quantity}}</span>
			 							            </td>
			 										<td class="cart-product-sub-total"><span class="cart-sub-total-price">{{currency().number_format($cart->product->current_price*$cart->quantity,2)}}</td>
			 										
			 									</tr>
			 								@endforeach

			 								   
			 								
			 								</tbody><!-- /tbody -->
			 							</table><!-- /table -->
			 						</div>
			 				</div>
			 				<div class="ammount-wrap">
			 					<div class="card amount-area">
			 						<h5><strong><span>Shipping Charge: </span><span>{{currency().number_format(shipping_charge(),2)}}</span></strong></h5>
			 						<h5><strong><span>Tag: </span><span>{{currency().number_format(tax(),2)}}</span></strong></h5>
			 						<h5><strong><span>Grand Total: </span><span>{{currency().number_format(grand_total(),2)}}</span></strong></h5>
			 					</div>
			 					
			 				</div>
			 				<input type="hidden" name="sub_price" value="{{sub_total()}}">
			 				<input type="hidden" name="grand_total" value="{{grand_total()}}">
			 				
			 				 
			 				  
			 				  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Procced Checkout</button>
			 				</form>
			 			</div>	
			 		
			 		</div>			
			 	</div>
			 	<!-- panel-body  -->

			 </div><!-- row -->
			</div>
		</div>
	</div> 
	 </div>
	</div>
	</div>
			
</div>
@endsection
