 <section class="section featured-product wow fadeInUp">
		        <h3 class="section-title">Featured products</h3>
		        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
		        @foreach ($featureds as $featured)
		        	
		          <div class="item item-carousel">
		            <div class="products">
		              <div class="product">
		                <div class="product-image">
		                  <div class="image"> <a href="{{ route('product.detail',$featured->slug) }}"><img  src="{{ asset('assets/backend/image/product/medium/'.$featured->thumbnail)}}" alt=""></a> </div>
		                </div>

		                <div class="product-info text-left">
		                  <h3 class="name"><a href="{{ route('product.detail',$featured->slug) }}">{{$featured->name}}</a></h3>
		                  
		                  <div class="description"></div>
		                  <div class="product-price"> <span class="price">{{currency().number_format($featured->current_price,2)}}</span> </div>
		                  <!-- /.product-price --> 
		                  
		                </div>
		                <!-- /.product-info -->
		                <div class="cart clearfix animate-effect">
		                  <div class="action">
		                    <ul class="list-unstyled">
		                      
		                      <li class="lnk wishlist"> <a class="add-to-cart" href="{{ route('product.detail',$featured->slug) }}" title="Add to card">  <i class="fa fa-shopping-cart"></i></a> </li>

		                      <li class="lnk wishlist"> <a class="add-to-cart add_to_wishlist" href="javascript:;" title="Wishlist" data-action="{{ route('add_to_wishlist')}}" product_id="{{$featured->id}}"> <i class="icon fa fa-heart"></i> </a> </li>
		                      <li class="lnk"> <a class="add-to-cart add_to_comparelist" href="javascript:;" title="Compare" product_id="{{$featured->id}}" data-action="{{ route('add_to_comparelist') }}"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
		        <!-- /.home-owl-carousel --> 
		      </section>