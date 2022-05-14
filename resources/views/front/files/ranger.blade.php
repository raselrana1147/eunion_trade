 <div class="sidebar-module-container">
      <div class="sidebar-filter"> 
       
        <div class="sidebar-widget wow fadeInUp">
          <div class="widget-header">
            <h4 class="widget-title">Price Slider</h4>
          </div>
          <div class="slidecontainer">
          	@php
          		$max=DB::table('products')->max('current_price');
          	@endphp
          		<form action="{{ route('product.by.search') }}" method="post">
          			@csrf
          			<div class="range-input">
          			  Min:<span class="price_range"></span><input type="range" class="range-min" min="0" value="0" step="1" max="{{$max}}" id="slider1">
          			 Max:<span class="price_range"></span><input type="range" class="range-max" min="0" max="{{$max}}" value="{{round($max/2)}}" step="1" id="slider2">
          			</div>
          			<input type="hidden" name="min_price" class="min_price" value="0">
          			<input type="hidden" name="max_price" class="max_price" value="0">
          			<button type="submit" class="lnk btn btn-primary">Filter</button>
          		</form>
                
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <div class="home-banner"> <img src="{{ asset('assets/frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
      </div>
		      <!-- /.sidebar-filter --> 
 </div>