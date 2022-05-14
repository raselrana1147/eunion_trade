@extends('layouts.app')
@section('title','Ecommerce | Compare List')
@section('breadcrumb')
	<div class="breadcrumb">
	  <div class="container">
	    <div class="breadcrumb-inner">
	      <ul class="list-inline list-unstyled">
	        <li><a href="{{ route('front.index') }}">Home</a></li>
	        <li class='active'>Comparison</li>
	      </ul>
	    </div>
	   
	  </div>
	</div>
@endsection
@section('ecommerce')

	<div class="container">

	
    <div class="product-comparison">

		<div>
			@if (count($comparelists)>0)
			<h1 class="page-title text-center heading-title">Product Comparison</h1>
			<div class="table-responsive">
				<table class="table compare-table inner-top-vs">
					<tr>
						<th>Products</th>
						@foreach ($comparelists as $com_list)
						<td>
							<div class="product">
								<div class="product-image">
									<div class="image">
										<a href="{{ route('product.detail',$com_list->product->slug) }}">
										    <img alt="" src="{{ asset('assets/backend/image/product/small/'.$com_list->product->thumbnail) }}">
										</a>
									</div>

									<div class="product-info text-left">
										<h3 class="name"><a href="{{ route('product.detail',$com_list->product->slug) }}">{{$com_list->product->name}}</a></h3>
										<div class="action">
										    <a class="lnk btn btn-primary" href="#">Add To Cart</a>
										</div>

									</div>
								</div>
							</div>
						</td>
                    @endforeach

					</tr>

					<tr>
						<th>Price</th>
						@foreach ($comparelists as $com_list)
						<td>
							<div class="product-price">
								<span class="price">{{currency().number_format($com_list->product->current_price,2)}} </span>
							</div>
						</td>
						@endforeach
					
					</tr>

					<tr>
						<th>Description</th>
						@foreach ($comparelists as $com_list)
						<td>
							 <p class="text">{!!$com_list->product->description!!}<p>
						</td>
						@endforeach

					</tr>

				

					<tr >
						<th>Remove</th>
						@foreach ($comparelists as $com_list)
						<td class='text-center'><a href="{{ route('delete.comparelist',$com_list->id) }}" class="remove-icon"><i class="fa fa-times"></i></a></td>
						@endforeach
					</tr>
				</table>
			</div>
			@else
			    <h2>No Item added</h2>
			@endif
            </div>
		</div>
		
	</div>

@endsection