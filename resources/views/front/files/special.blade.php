<div class="sidebar-widget outer-bottom-small wow fadeInUp">
		        <h3 class="section-title">Recommended</h3>
		        <div class="sidebar-widget-body outer-top-xs">
		          <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

		          	@foreach ($recommendeds as $recommended)
		          		{{-- expr --}}
		          	
		            <div class="item">
		              <div class="products special-product">
		                <div class="product">
		                  <div class="product-micro">
		                    <div class="row product-micro-row">
		                      <div class="col col-xs-5">
		                        <div class="product-image">
		                          <div class="image"> <a href="{{ route('product.detail',$recommended->slug) }}"> <img  src="{{ asset('assets/backend/image/product/medium/'.$recommended->thumbnail)}}" alt=""> </a> </div>
		                          <!-- /.image --> 
		                          
		                        </div>
		                        <!-- /.product-image --> 
		                      </div>
		                      <!-- /.col -->
		                      <div class="col col-xs-7">
		                        <div class="product-info">
		                          <h3 class="name"><a href="{{ route('product.detail',$recommended->slug) }}">{{$recommended->name}}</a></h3>
		                          <div class="product-price"> <span class="price">{{currency().number_format($recommended->current_price,2)}}</span> </div>
		                          <!-- /.product-price --> 
		                        </div>
		                      </div>
		                      <!-- /.col --> 
		                    </div>
		                    <!-- /.product-micro-row --> 
		                  </div>
		                  <!-- /.product-micro --> 
		                  
		                </div>
		               
		              </div>
		            </div>
		            @endforeach
		           
		          </div>
		        </div>
		        <!-- /.sidebar-widget-body --> 
		      </div>