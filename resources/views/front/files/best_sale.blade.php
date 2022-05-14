 <div class="best-deal wow fadeInUp outer-bottom-xs">
		        <h3 class="section-title">Best seller</h3>
		        <div class="sidebar-widget-body outer-top-xs">
		          <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">

		          	@foreach ($best_sales as $best_sale)
		            <div class="item">
		              <div class="products best-product">
		                <div class="product">
		                  <div class="product-micro">
		                    <div class="row product-micro-row">
		                      <div class="col col-xs-5">
		                        <div class="product-image">
		                          <div class="image"> <a href="{{ route('product.detail',$best_sale->slug) }}"> <img src="{{ asset('assets/backend/image/product/medium/'.$best_sale->thumbnail)}}" alt=""> </a> </div>
		                          
		                        </div>
		                        <!-- /.product-image --> 
		                      </div>
		                      <!-- /.col -->
		                      <div class="col2 col-xs-7">
		                        <div class="product-info">
		                          <h3 class="name"><a href="{{ route('product.detail',$best_sale->slug) }}">{{$best_sale->name}}</a></h3>
		                          <div class="product-price"> <span class="price">{{currency().number_format($best_sale->current_price,2)}}</span> </div>
		                         
		                        </div>
		                      </div>
		                      <!-- /.col --> 
		                    </div>
		                    <!-- /.product-micro-row --> 
		                  </div>
		                </div>
		             
		              </div>
		            </div>
		           @endforeach
		          </div>
		        </div>
		        <!-- /.sidebar-widget-body --> 
		      </div>