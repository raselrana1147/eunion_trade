@extends('layouts.app')
@section('title','Ecommerce | Product Detail')
@section('ecommerce_css')
    <link href="{{ asset('assets/frontend/assets/css/lightbox.css')}}" rel="stylesheet">
@endsection
@section('breadcrumb')
	<div class="breadcrumb">
	  <div class="container">
	    <div class="breadcrumb-inner">
	      <ul class="list-inline list-unstyled">
	        <li><a href="#">Home</a></li>
	        <li class='active'>Handbags</li>
	      </ul>
	    </div>
	    <!-- /.breadcrumb-inner --> 
	  </div>
	  <!-- /.container --> 
	</div>
@endsection
@section('ecommerce')
	

		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n">
       <img src="{{ asset('assets/frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
</div>		
 
<div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
	<h3 class="section-title">Best Sale</h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
			@foreach ($best_sales as $best_sale)
	
			
					<div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
								<img src="{{ asset('assets/backend/image/product/medium/'.$best_sale->thumbnail)}}" alt="">
							</div>

						</div>

						<div class="product-info text-left m-t-20">
							<h3 class="name"><a href="{{ route('product.detail',$best_sale->slug) }}">{{$best_sale->name}}</a></h3>
							

							<div class="product-price">	
								<span class="price">
									{{currency().number_format($best_sale->current_price,2)}}
								</span>

							</div><!-- /.product-price -->
							
						</div><!-- /.product-info -->

						<div class="cart clearfix animate-effect">
							<div class="action">
								
								<div class="add-cart-button btn-group">
									<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
										<i class="fa fa-shopping-cart"></i>													
									</button>
									<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
															
								</div>
								
							</div><!-- /.action -->
						</div><!-- /.cart -->
					</div>	
					</div>		        
			  @endforeach
					      
						
	    
    </div><!-- /.sidebar-widget -->
</div>
<!-- ============================================== HOT DEALS: END ============================================== -->					

<!-- ============================================== NEWSLETTER ============================================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
        <form>
        	 <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			  </div>
			<button class="btn btn-primary">Subscribe</button>
		</form>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->

</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
        <div class="single-product-gallery-item" id="slide0">
            <a data-lightbox="image-1" data-title="Gallery" href="{{ asset('assets/backend/image/product/small/'.$product->thumbnail)}}">
                <img class="img-responsive" alt="" src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail)}}" data-echo="{{ asset('assets/backend/image/product/small/'.$product->thumbnail)}}" />
            </a>
        </div>
        @foreach ($product->galleries as $key=> $gallery)
       
            <div class="single-product-gallery-item" id="slide{{$key+1}}">
                <a data-lightbox="image-1" data-title="Gallery" href="{{ asset('assets/backend/image/gallery/small/'.$gallery->image)}}">
                    <img class="img-responsive" alt="" src="{{ asset('assets/backend/image/gallery/small/'.$gallery->image)}}" data-echo="{{ asset('assets/backend/image/gallery/small/'.$gallery->image)}}" />
                </a>
            </div><!-- /.single-product-gallery-item -->
         @endforeach

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
          <div class="item">
              <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide0">
                  <img class="img-responsive" width="85" alt="" src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail)}}" data-echo="{{ asset('assets/backend/image/product/small/'.$product->thumbnail)}}" />
              </a>
          </div>
           @foreach ($product->galleries as $key=> $gallery)
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{$key+1}}">
                        <img class="img-responsive" width="85" alt="" src="{{ asset('assets/backend/image/gallery/small/'.$gallery->image)}}" data-echo="{{ asset('assets/backend/image/gallery/small/'.$gallery->image)}}" />
                    </a>
                </div>
            @endforeach
            </div>

            

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name">{{$product->name}}</h1>
							
							

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">In Stock</span>
										</div>	
									</div>
								</div><!-- /.row -->	

								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Model :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">{{$product->model}}</span>
										</div>	
									</div>
								</div><!-- /.row -->
								@if ($product->flash_deal==0)
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Discount :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">{{$product->discount}}%</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							   @endif	

								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Sale Type :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="">
											<span class="value"><strong>{{$product->sale_type}}</strong></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							{{-- <div class="description-container m-t-20">
								@if ($product->description !=null)
									{!!short_description($product->description)!!}
								@endif
							
							</div> --}}<!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											@if ($product->flash_deal==0)
												 <span class="price">
												 	{{currency().number_format(($product->current_price-($product->current_price*$product->discount)/100),2)}}
												 </span>
												 <span class="price-before-discount">{{currency().number_format($product->current_price,2)}}</span>					
												@else
												<span class="price">{{currency().number_format($product->current_price,2)}}</span>
											@endif
											
											
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary add_to_wishlist" data-toggle="tooltip" data-placement="right" title="Wishlist" href="javascript:;" data-action="{{ route('add_to_wishlist')}}" product_id="{{$product->id}}">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary add_to_comparelist" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="javascript:;" product_id="{{$product->id}}" data-action="{{ route('add_to_comparelist') }}">
											   <i class="fa fa-signal" ></i>
											</a>
											
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->
							

							<div class="quantity-container info-container">
								<form id="submit_cart_form" data-action="{{ route('add_to_cart') }}" method="post"  >
								<div class="row">
									 @csrf
									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
									<input type="hidden" name="product_id" value="{{$product->id}}">
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <input type="number" value="{{$product->sale_type=='whole' ? $product->whole_sale_quantity : 1}}" style="width: 100px" min="{{$product->sale_type=='whole' ? $product->whole_sale_quantity : 1}}" required="" name="quantity">
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
										<button type="submit" class="btn btn-primary" style="margin-left: 25px"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
									</div>

									
								</div><!-- /.row -->
								</form>
							</div><!-- /.quantity-container -->
							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#return_policy">Return policy</a></li>
								<li><a data-toggle="tab" href="#specification">Specification</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<h2>Product Description</h2>
										{!!$product->description!!}
									</div>	
								</div><!-- /.tab-pane -->

								<div id="return_policy" class="tab-pane">
									<div class="product-tab">
									<h2>Return & policy</h2>									
										
										{!!$product->return_policy!!}
																		
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								<div id="specification" class="tab-pane">
									<div class="product-tag">
											<h2>Product Specification</h2>
										{!!$product->specification!!}
										
									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Recommended products</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
	    	

	
@foreach ($recommendeds as $recommended)
	{{-- expr --}}

<div class="item item-carousel">
	<div class="products">
		
		<div class="product">
			<div class="product-image">
				<div class="image">
					<a href="{{ route('product.detail',$recommended->slug) }}"><img  src="{{ asset('assets/backend/image/product/medium/'.$recommended->thumbnail)}}" data-echo="{{ asset('assets/backend/image/product/medium/'.$recommended->thumbnail)}}" alt=""></a>
					</div><!-- /.image -->
				
					</div>
					<div class="product-info text-left">
						<h3 class="name"><a href="{{ route('product.detail',$recommended->slug) }}">{{$recommended->name}}</a></h3>
						
						<div class="description"></div>
						<div class="product-price">
							<span class="price">{{currency().number_format($recommended->current_price,2)}}</span>
							</div><!-- /.product-price -->
							
							</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
						<div class="action">
							<ul class="list-unstyled">
								   <li class="lnk wishlist"> <a class="add-to-cart" href="{{ route('product.detail',$recommended->slug) }}" title="Add to card">  <i class="fa fa-shopping-cart"></i></a> </li>
								
								<li class="lnk wishlist">
									<a class="add-to-cart" href="detail.html" title="Wishlist">
										<i class="icon fa fa-heart"></i>
									</a>
								</li>
								<li class="lnk">
									<a class="add-to-cart" href="detail.html" title="Compare">
										<i class="fa fa-signal"></i>
									</a>
								</li>
							</ul>
		</div><!-- /.action -->
		</div><!-- /.cart -->
		</div><!-- /.product -->
		
		</div><!-- /.products -->
		</div><!-- /.item -->
@endforeach

			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="{{ asset('assets/frontend/assets/images/brands/brand1.png')}}" src="{{ asset('assets/frontend/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="{{ asset('assets/frontend/assets/images/brands/brand2.png')}}" src="{{ asset('assets/frontend/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{ asset('assets/frontend/assets/images/brands/brand3.png')}}" src="{{ asset('assets/frontend/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{ asset('assets/frontend/assets/images/brands/brand4.png')}}" src="{{ asset('assets/frontend/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{ asset('assets/frontend/assets/images/brands/brand5.png')}}" src="{{ asset('assets/frontend/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{ asset('assets/frontend/assets/images/brands/brand6.png')}}" src="{{ asset('assets/frontend/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{ asset('assets/frontend/assets/images/brands/brand2.png')}}" src="{{ asset('assets/frontend/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{ asset('assets/frontend/assets/images/brands/brand4.png')}}" src="{{ asset('assets/frontend/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{ asset('assets/frontend/assets/images/brands/brand1.png')}}" src="{{ asset('assets/frontend/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{ asset('assets/frontend/assets/images/brands/brand5.png')}}" src="{{ asset('assets/frontend/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	

@endsection
@section('ecommerce_js')
	<script src="{{ asset('assets/frontend/assets/js/echo.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/assets/js/bootstrap-slider.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/jquery.rateit.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/assets/js/lightbox.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/wow.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/assets/js/scripts.js')}}"></script>
@endsection