  @if (count($flash_deals)>0)
<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
		        <h3 class="section-title">Flash Deals</h3>
		        <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
		        @foreach ($flash_deals as $product)
		        	{{-- expr --}}
		       
		          <div class="item">
		            <div class="products">
		              <div class="hot-deal-wrapper">
		                <div class="image"> <img src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail)}}" alt=""> </div>
		                <div class="sale-offer-tag"><span>{{$product->discount}}%<br>
		                  off</span></div>
		                  @php
		                  	 $now_date=date('Y-m-d H:i:s');
		                  	 $remain_time=strtotime($product->end_date)-strtotime($now_date);
		                  	 $formated_time=date("d:H:i:s",$remain_time);
                             $time_to_array=explode(':', $formated_time);
		                  @endphp
		                <div class="timing-wrapper">
		                  <div class="box-wrapper">
		                    <div class="date box"> <span class="key">{{$time_to_array[0]}}</span> <span class="value">DAYS</span> </div>
		                  </div>
		                  <div class="box-wrapper">
		                    <div class="hour box"> <span class="key">{{$time_to_array[1]}}</span> <span class="value">HRS</span> </div>
		                  </div>
		                  <div class="box-wrapper">
		                    <div class="minutes box"> <span class="key">{{$time_to_array[2]}}</span> <span class="value">MINS</span> </div>
		                  </div>
		                  <div class="box-wrapper hidden-md">
		                    <div class="seconds box"> <span class="key">{{$time_to_array[3]}}</span> <span class="value">SEC</span> </div>
		                  </div>
		                </div>
		              </div>
		              <!-- /.hot-deal-wrapper -->
		              
		              <div class="product-info text-left m-t-20">
		                <h3 class="name"><a href="{{ route('product.detail',$product->slug) }}">{{$product->name}}</a></h3>
		                
		                <div class="product-price"> <span class="price"> {{currency().number_format($product->current_price-($product->current_price*$product->discount)/100,2)}} </span> <span class="price-before-discount">{{currency().number_format($product->current_price,2)}}</span> </div>
		                <!-- /.product-price --> 
		                
		              </div>
		              <!-- /.product-info -->
		              
		              <div class="cart clearfix animate-effect">
		                <div class="action">
		                  <ul class="list-unstyled">
		                    
		                   <div class="col-sm-7">
		                   	<a href="{{ route('product.detail',$product->slug) }}" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
		                   </div>
		                    
		                  </ul>
		                </div>
		                <!-- /.action --> 
		              </div>
		              <!-- /.cart --> 
		            </div>
		          </div>
		          @endforeach
		         
		        </div>
		        <!-- /.sidebar-widget --> 
		      </div>
	    @endif