<div id="brands-carousel" class="logo-slider wow fadeInUp">
		    <div class="logo-slider-inner">
		      <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">

		      	@foreach ($brands as $brand)
		      	
		         <div class="item"> <a href="{{ route('product.brand_wise_product',$brand->id) }}" class="image"> <img data-echo="{{$brand->image !=null ? asset('assets/backend/image/brand/small/'.$brand->image) : asset('assets/backend/image/default.png')}}" src="{{$brand->image !=null ? asset('assets/backend/image/brand/small/'.$brand->image) : asset('assets/backend/image/default.png')}}" alt="" style="height: 70px;width: 170px"> </a> 
		         </div>
		        @endforeach

		      </div>
		      <!-- /.owl-carousel #logo-slider --> 
		    </div>
		    <!-- /.logo-slider-inner --> 
		    
		  </div>