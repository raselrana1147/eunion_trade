@extends('layouts.app')
@section('title','Ecommerce | View Cart')
@section('breadcrumb')
	<div class="breadcrumb">
	  <div class="container">
	    <div class="breadcrumb-inner">
	      <ul class="list-inline list-unstyled">
	        <li><a href="#">Home</a></li>
	        <li class='active'>Cart</li>
	      </ul>
	    </div>
	    <!-- /.breadcrumb-inner --> 
	  </div>
	  <!-- /.container --> 
	</div>
@endsection
@section('ecommerce')
		<div class="container">
			<div class="row">
	<div class="shopping-cart cart_section">
		@if (count($carts)>0)
		
		<div class="shopping-cart-table ">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th class="cart-romove item">Remove</th>
						<th class="cart-description item">Image</th>
						<th class="cart-product-name item">Product Name</th>
						<th class="cart-qty item">Quantity</th>
						<th class="cart-sub-total item">Subtotal</th>
					</tr>
				</thead><!-- /thead -->
				<tfoot>
					<tr>
						<td colspan="7">
							<div class="shopping-cart-btn">
								<span class="">
									
									<a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Continue Shopping</a>
								</span>
							</div><!-- /.shopping-cart-btn -->
						</td>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($carts as $cart)
					<tr class="cart_row{{$cart->id}}">
						<td class="romove-item">
							<a href="javascript:;" title="cancel" class="icon" ><i class="fa fa-trash-o delete_cart" cart_id="{{$cart->id}}" data-action="{{ route('cart.delete') }}"></i></a>
							
						</td>

						<td class="cart-image">
							<a class="entry-thumbnail" href="{{ route('product.detail',$cart->product->slug) }}">
							    <img src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail) }}" alt="">
							</a>
						</td>
						<td class="cart-product-name-info">
							<h4 class='cart-product-description'><a href="{{ route('product.detail',$cart->product->slug) }}">{{$cart->product->name}}</a>

							</h4>
							<span>
								
								@if ($cart->product->flash_deal==0)
									{{currency().number_format($cart->product->current_price-($cart->product->current_price*$cart->product->discount)/100,2)}}
									<p><del class="price-before-discount">{{currency().number_format($cart->product->current_price,2)}}</del></p>
								@else
								{{currency().number_format($cart->product->current_price,2)}}
								@endif
								
							</span>
						</td>
						
						<td class="cart-product-quantity" cart_id="{{$cart->id}}" data-action="{{ route('cart.update') }}">
							<div class="quant-input">
					                <input type="number" value="{{$cart->quantity}}" min="{{$cart->product->sale_type=='whole' ? $cart->product->whole_sale_quantity : 1}}" style="width: 100px" class="update_cart{{$cart->id}}">
				             </div>
			            </td>
						<td class="cart-product-sub-total"><span class="cart-sub-total-price">
							<span class="each_cart_price{{$cart->id}}">
								@if ($cart->product->flash_deal==0)
								{{currency().number_format(($cart->product->current_price-($cart->product->current_price*$cart->product->discount)/100)*($cart->quantity),2)}}
								@else
								{{currency().number_format($cart->product->current_price*$cart->quantity,2)}}
								@endif
								
							</span>
						</span></td>
						
					</tr>
				@endforeach
				
				</tbody><!-- /tbody -->
			</table><!-- /table -->
		</div>
	</div>
	<div class="col-md-4 col-sm-12 estimate-ship-tax">
		<table class="table">
			<tbody>
					<tr>
						<td>
							<form id="apply_coupon" data-action="{{ route('apply_coupon') }}" method="POST">
								@csrf
								<div class="form-group">
									<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." name="coupon_code" required="">
								</div>
								<div class="clearfix pull-right">
									<button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
								</div>
						  </form>
						</td>
					</tr>
			</tbody><!-- /tbody -->
		</table>
	</div>
	

	<div class="col-md-4 col-sm-12 estimate-ship-tax">
		<table class="table">
			
			
		</table><!-- /table -->
	</div><!-- /.estimate-ship-tax -->

	<div class="col-md-4 col-sm-12 cart-shopping-total">
		<table class="table">
			<thead>
				<tr>
					<th>
						<div class="cart-sub-total">
							Shipping Charge<span class="inner-left-md">{{currency().number_format(shipping_charge(),2)}}</span>
						</div>
						<div class="cart-sub-total">
							Tax<span class="inner-left-md">{{currency().number_format(tax(),2)}}</span>
						</div>
						<div class="cart-grand-total">
							Grand Total<span class="inner-left-md"><span class="grand_total">{{currency().number_format(grand_total(),2)}}</span></span>
						</div>
					</th>
				</tr>
			</thead><!-- /thead -->
			<tbody>
					<tr>
						<td>
							<div class="cart-checkout-btn pull-right">
								<a href="{{ route('checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>

							</div>
						</td>
					</tr>
			</tbody><!-- /tbody -->
		</table><!-- /table -->
	</div>		
	@else
	<h4>Empty Cart</h4>

	@endif	
</div><!-- /.shopping-cart -->
			</div> <!-- /.row -->
			<!-- ============================================== BRANDS CAROUSEL ============================================== -->
	@include('front.files.brand')
	<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
@endsection