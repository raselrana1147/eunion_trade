@extends('layouts.app')
@section('title','Ecommerce | Home')
@section('ecommerce')
		<div class="row">
		 <div class="col-xs-12 col-sm-12 col-md-3 sidebar">        <!-- ================================== TOP NAVIGATION ================================== -->
		     @include('front.files.category')
		      <!-- /.side-menu --> 
		      <!-- ================================== TOP NAVIGATION : END ================================== -->
		      <div class="app-img outer-bottom-xs"><img alt="app" src="{{ asset('assets/frontend/assets/images/app-img.jpg')}}" /></div>
		       </div>
			@include('front.files.slider')
		  </div>

		  <div class="row"> 
		    <!-- ============================================== SIDEBAR ============================================== -->
		    <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
		      @include('front.files.hot_deal')

		      @include('front.files.special')
		     
		      @include('front.files.tag')
		      
		      
		     {{--   @include('front.files.special_offer') --}}
   
		      @include('front.files.subscribe')
		      
		      @include('front.files.testimonial')

		      <!-- ============================================== Testimonials: END ============================================== -->
		      
		      <div class="home-banner"> <img src="{{ asset('assets/frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
		    </div>
		   
		    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
		      
		      <div class="wide-banners wow fadeInUp outer-bottom-xs">
		        <div class="row">
		          <div class="col-md-7 col-sm-7">
		            <div class="wide-banner cnt-strip">
		              <div class="image"> <img class="img-responsive" src="{{ asset('assets/frontend/assets/images/banners/home-banner1.jpg')}}" alt=""> </div>
		            </div>
		            <!-- /.wide-banner --> 
		          </div>
		          <!-- /.col -->
		          <div class="col-md-5 col-sm-5">
		            <div class="wide-banner cnt-strip">
		              <div class="image"> <img class="img-responsive" src="{{ asset('assets/frontend/assets/images/banners/home-banner2.jpg')}}" alt=""> </div>
		            </div>
		            <!-- /.wide-banner --> 
		          </div>
		          <!-- /.col --> 
		        </div>
		        <!-- /.row --> 
		      </div>
		      
		    	@include('front.files.new_arrival')
		      
		     @include('front.files.featured')
		      
		      <div class="wide-banners wow fadeInUp outer-bottom-xs">
		        <div class="row">
		          <div class="col-md-12">
		            <div class="wide-banner cnt-strip">
		              <div class="image"> <img class="img-responsive" src="{{ asset('assets/frontend/assets/images/banners/home-banner.jpg')}}" alt=""> </div>
		              <div class="strip strip-text">
		                <div class="strip-inner">
		                  <h2 class="text-right">New Mens Fashion<br>
		                    <span class="shopping-needs">Save up to 40% off</span></h2>
		                </div>
		              </div>
		              <div class="new-label">
		                <div class="text">NEW</div>
		              </div>
		              <!-- /.new-label --> 
		            </div>
		            <!-- /.wide-banner --> 
		          </div>
		          <!-- /.col --> 
		          
		        </div>
		        <!-- /.row --> 
		      </div>
		     
		      
		      @include('front.files.best_sale')
		     
		       @include('front.files.blog')
		     
		     
		     @include('front.files.trending')
		     
		    </div>
		    
		  </div>
		 
		  @include('front.files.brand')
		  
		</div>		
@endsection