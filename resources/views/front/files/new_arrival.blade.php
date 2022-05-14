          <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
		        <div class="more-info-tab clearfix ">
		          <h3 class="new-product-title pull-left">New Arrival</h3>
		          <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">

		            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
		         
		          </ul>
		          <!-- /.nav-tabs --> 
		        </div>
		        <div class="tab-content outer-top-xs">
		          <div class="tab-pane in active" id="all">
		            <div class="product-slider">
		              <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
		              	 @foreach ($new_arrivals as $new_arrival)
		                <div class="item item-carousel">

		                  <div class="products">
		                    <div class="product">
		                      <div class="product-image">
		                        <div class="image"> <a href="{{ route('product.detail',$new_arrival->slug) }}"><img  src="{{ asset('assets/backend/image/product/medium/'.$new_arrival->thumbnail)}}" alt=""></a> </div>
		                        
		                      </div>
		                      <!-- /.product-image -->
		                      
		                      <div class="product-info text-left">
		                        <h3 class="name"><a href="{{ route('product.detail',$new_arrival->slug) }}">{{$new_arrival->name}}</a></h3>
		                       
		                        <div class="description"></div>
		                        <div class="product-price"> <span class="price">{{currency().number_format($new_arrival->current_price,2)}}</span> </div>
		                        <!-- /.product-price --> 
		                        
		                      </div>
		                      <!-- /.product-info -->
		                      <div class="cart clearfix animate-effect">
		                        <div class="action">
		                          <ul class="list-unstyled">
		                            <li class="lnk wishlist"> <a class="add-to-cart" href="{{ route('product.detail',$new_arrival->slug) }}" title="Add to card">  <i class="fa fa-shopping-cart"></i></a> </li>
		                            <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart add_to_wishlist" href="javascript:;" data-action="{{ route('add_to_wishlist')}}" product_id="{{$new_arrival->id}}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
		                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart add_to_comparelist" href="javascript:;" title="Compare" product_id="{{$new_arrival->id}}" data-action="{{ route('add_to_comparelist') }}"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
		                          </ul>
		                        </div>
		                        <!-- /.action --> 
		                      </div>
		                      <!-- /.cart --> 
		                    </div>
		                    <!-- /.product --> 
		                    
		                  </div>
		                
		                </div>
		                 @endforeach
		               
		              </div>
		             
		            </div>
		            
		          </div>
		          
		          
		        </div>
		        <!-- /.tab-content --> 
		      </div>