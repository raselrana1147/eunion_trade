@extends('layouts.app')
@section('title','Ecommerce | Wishlist')
@section('breadcrumb')
	<div class="breadcrumb">
	  <div class="container">
	    <div class="breadcrumb-inner">
	      <ul class="list-inline list-unstyled">
	        <li><a href="{{ route('front.index') }}">Home</a></li>
	        <li class='active'>Wishlist</li>
	      </ul>
	    </div>
	    <!-- /.breadcrumb-inner --> 
	  </div>
	  <!-- /.container --> 
	</div>
@endsection
@section('ecommerce')
<div class="my-wishlist-page">
	<div class="row">
		<div class="col-md-12 my-wishlist">
			<div class="table-responsive">
				@if (count($wishlists)>0)
				<table class="table">
					<thead>
						<tr>
							<th colspan="4" class="heading-title">My Wishlist</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($wishlists as $wishlist)
						
						<tr class="wishlist_row{{$wishlist->id}}">
							<td class="col-md-2"><img src="{{ asset('assets/backend/image/product/small/'.$wishlist->product->thumbnail) }}" alt="imga"></td>
							<td class="col-md-7">
								<div class="product-name"><a href="{{ route('product.detail',$wishlist->product->slug) }}">{{$wishlist->product->name}}</a></div>
								<div class="price">
									{{currency().number_format($wishlist->product->current_price,2)}}
									
								</div>
							</td>
							<td class="col-md-2">
								<a href="{{ route('product.detail',$wishlist->product->slug) }}" class="btn-upper btn btn-primary">Add to cart</a>
							</td>
							<td class="col-md-1 close-btn">
								<a href="javascript:;" class=""><i class="fa fa-times delete_wishlist" data-action="{{ route('wishlist.delete') }}" wishlist_id="{{$wishlist->id}}"></i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				@else
				     <h5>Empty Wishlist</h5>
				@endif
			</div>
			</div>			</div><!-- /.row -->
			</div><!-- /.sigin-in-->
			<br>
@endsection