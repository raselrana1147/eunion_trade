@extends('layouts.app')
@section('title','Ecommerce | Whole Sale')
@section('breadcrumb')
	<div class="breadcrumb">
	  <div class="container">
	    <div class="breadcrumb-inner">
	      <ul class="list-inline list-unstyled">
	        <li><a href="{{ route('front.index') }}">Home</a></li>
	        <li class='active'>Search</li>
	      </ul>
	    </div>
	    <!-- /.breadcrumb-inner --> 
	  </div>
	  <!-- /.container --> 
	</div>
@endsection
@section('ecommerce')
		<div class='row'>
		  <div class='col-md-3 sidebar'> 
		    <!-- ================================== TOP NAVIGATION ================================== -->
		    @include('front.files.category')
		    <!-- /.side-menu --> 
		    <!-- ================================== TOP NAVIGATION : END ================================== -->
		    @include('front.files.ranger')
		    <!-- /.sidebar-module-container --> 
		  </div>
		  <!-- /.sidebar -->
		  <div class='col-md-9'> 
		    <!-- ========================================== SECTION – HERO ========================================= -->

		    <h3><strong>Your searching results</strong></h3>
		    @if (count($products)>0)
		    <div class="clearfix filters-container m-t-10">
		      <div class="row">
		        <div class="col col-sm-6 col-md-2">
		          <div class="filter-tabs">
		            <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
		              <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
		              <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
		            </ul>
		          </div>
		          <!-- /.filter-tabs --> 
		        </div>
		        <!-- /.col -->
		        <div class="col col-sm-12 col-md-6">
		          <div class="col col-sm-3 col-md-6 no-padding">
		            <div class="lbl-cnt"> <span class="lbl">Sort by</span>
		              <div class="fld inline">
		                <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
		                  <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
		                  <ul role="menu" class="dropdown-menu">
		                    <li role="presentation"><a href="#">position</a></li>
		                    <li role="presentation"><a href="#">Price:Lowest first</a></li>
		                    <li role="presentation"><a href="#">Price:HIghest first</a></li>
		                    <li role="presentation"><a href="#">Product Name:A to Z</a></li>
		                  </ul>
		                </div>
		              </div>
		              <!-- /.fld --> 
		            </div>
		            <!-- /.lbl-cnt --> 
		          </div>
		        
		        </div>
		        <!-- /.col -->
		        <div class="col col-sm-6 col-md-4 text-right">
		          <div class="pagination-container">
		            <ul class="list-inline list-unstyled">
		              {{$products->links()}}
		            </ul>
		            <!-- /.list-inline --> 
		          </div>
		          <!-- /.pagination-container --> </div>
		        <!-- /.col --> 
		      </div>
		      <!-- /.row --> 
		    </div>
		   
		    
		    <div class="search-result-container ">
		      <div id="myTabContent" class="tab-content category-list">
		        <div class="tab-pane active " id="grid-container">
		          <div class="category-product">
		            <div class="row">
		            @foreach ($products as $product)
		            
		              <div class="col-sm-6 col-md-4 wow fadeInUp">
		                <div class="products">
		                  <div class="product">
		                    <div class="product-image">
		                      <div class="image"> <a href="{{ route('product.detail',$product->slug) }}"><img  src="{{ asset('assets/backend/image/product/medium/'.$product->thumbnail)}}" alt=""></a> </div>
		                    </div>
		                    <!-- /.product-image -->
		                    
		                    <div class="product-info text-left">
		                      <h3 class="name"><a href="{{ route('product.detail',$product->slug) }}">{{$product->name}}</a></h3>
		                    
		                      <div class="description"></div>
		                      <div class="product-price"> <span class="price"> {{currency().number_format($product->current_price,2)}} </div>
		                      <!-- /.product-price --> 
		                      
		                    </div>
		                    <!-- /.product-info -->
		                    <div class="cart clearfix animate-effect">
		                      <div class="action">
		                        <ul class="list-unstyled">
		                          <li class="lnk wishlist"> <a class="add-to-cart" href="{{ route('product.detail',$product->slug) }}" title="Add to card">  <i class="fa fa-shopping-cart"></i></a> </li>
		                          <li class="lnk wishlist"> <a class="add-to-cart add_to_wishlist" href="javascript:;" title="Wishlist" data-action="{{ route('add_to_wishlist')}}" product_id="{{$product->id}}"> <i class="icon fa fa-heart"></i> </a> </li>
		                          <li class="lnk"> <a class="add-to-cart add_to_comparelist" href="javascript:;" title="Compare" product_id="{{$product->id}}" data-action="{{ route('add_to_comparelist') }}"> <i class="fa fa-signal"></i> </a> </li>
		                        </ul>
		                      </div>
		                      <!-- /.action --> 
		                    </div>
		                    <!-- /.cart --> 
		                  </div>
		                  <!-- /.product --> 
		                  
		                </div>
		                <!-- /.products --> 
		              </div>
		             @endforeach

		            </div>
		            <!-- /.row --> 
		          </div>
		          <!-- /.category-product --> 
		          
		        </div>
		        <!-- /.tab-pane -->
		        
		        <div class="tab-pane "  id="list-container">
		          <div class="category-product">
		          	@foreach ($products as $product)
		            <div class="category-product-inner wow fadeInUp">
		              <div class="products">
		                <div class="product-list product">
		                  <div class="row product-list-row">
		                    <div class="col col-sm-4 col-lg-4">
		                      <div class="product-image">
		                        <div class="image"> <img src="{{ asset('assets/backend/image/product/medium/'.$product->thumbnail)}}" alt=""> </div>
		                      </div>
		                      <!-- /.product-image --> 
		                    </div>
		                    <!-- /.col -->
		                    <div class="col col-sm-8 col-lg-8">
		                      <div class="product-info">
		                        <h3 class="name"><a href="{{ route('product.detail',$product->slug) }}">{{$product->name}}</a></h3>
		             
		                        <div class="product-price"> <span class="price"> {{currency().number_format($product->current_price,2)}} </span>  </div>
		                        <!-- /.product-price -->
		                        <div class="description m-t-10">{{short_description($product->description,0,100)}}</div>
		                        <div class="cart clearfix animate-effect">
		                          <div class="action">
		                            <ul class="list-unstyled">
		                              <li class="add-cart-button btn-group">
		                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>

		                                <a href="{{ route('product.detail',$product->slug) }}" class="btn btn-primary cart-btn">Add to cart</a>
		                              </li>
		                              <li class="lnk wishlist"> <a class="add-to-cart add_to_wishlist" href="javascript;:" title="Wishlist" data-action="{{ route('add_to_wishlist')}}" product_id="{{$product->id}}"> <i class="icon fa fa-heart"></i> </a> </li>
		                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
		                            </ul>
		                          </div>
		                          <!-- /.action --> 
		                        </div>
		                        <!-- /.cart --> 
		                        
		                      </div>
		                      <!-- /.product-info --> 
		                    </div>
		                    <!-- /.col --> 
		                  </div>
		                  <!-- /.product-list-row -->
		                  
		                </div>
		              </div>
		              <!-- /.products --> 
		            </div>
		           
		             @endforeach
		          </div>
		          <!-- /.category-product --> 
		        </div>
		        <!-- /.tab-pane #list-container --> 
		      </div>
		      <!-- /.tab-content -->
		      <div class="clearfix filters-container">
		        <div class="text-right">
		          <div class="pagination-container">
		            <ul class="list-inline list-unstyled">
		               {{$products->links()}}
		            </ul>
		            <!-- /.list-inline --> 
		          </div>
		          <!-- /.pagination-container --> </div>
		        <!-- /.text-right --> 
		        
		      </div>
		      <!-- /.filters-container --> 
		      
		    </div>
		    @else
		    <h4>No Product is available</h4>
		     @endif
		    <!-- /.search-result-container --> 
		    
		  </div>
		  <!-- /.col --> 
		</div>
		<!-- /.row --> 
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		@include('front.files.brand')
@endsection