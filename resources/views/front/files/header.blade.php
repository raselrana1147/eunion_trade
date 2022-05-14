<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
             <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
             <li><a href="{{ route('view.comparelist') }}">Compare</a></li>
            @if (total_item()>0)
             <li><a href="{{ route('view.cart') }}">My Cart</a></li>
              <li><a href="{{ route('checkout') }}">Checkout</a></li>
            @endif
             @guest
              <li><a href="{{ route('login') }}">Login</a></li>
              @else
               <li><a href="{{ route('customer.dashboard') }}">My Account</a></li>
               <li class="login">
                  <a href="javascript:;" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
               </li>
            @endguest
          </ul>
        </div>
        <div class="offer-text">Save up to 12% everyday on all products</div>
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
         
         <div class="logo"> <a href="{{ route('front.index') }}"> <img src="{{ asset('assets/backend/image/common/logo1.png')}}" alt="logo" style="width: 140px;height: 40px"> </a> </div>
         
        </div>
  
        
        <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder"> 
         
     <div class="search-area">
            <form action="{{ route('product.search') }}" method="post">
              @csrf
              <input type="hidden" name="category_id" class="set_cat_id" value="">
              <div class="control-group" style="width: 590px">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle set_cat_name"  data-toggle="dropdown">Category<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                    @php
                      $categories=DB::table('categories')->orderBy('id','DESC')->get();
                    @endphp
                      @foreach ($categories as $category)
                        <li class="menu-header header_cat" style="cursor: pointer;" cat_id={{$category->id}}>{{$category->category_name}}</li>
                       @endforeach
                    </ul>
                  </li>
                </ul>
                <input class="search-field" placeholder="Search here..." name="keyword" />
                 <button class="search-button" type="submit"></button> 
              </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="top-cart">  </div>
              
              <div class="total-price-basket"> <span class="lbl"> <span class="cart-count">{{total_item()}}</span> items /</span> <span class="total-price"> <span class="sign">{{currency()}}</span><span class="value total_price">{{number_format(total_price(),2)}}</span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu cart-item-added">
              @if (count(carts())>0)
              <li>
                @foreach (carts() as $cart)
                <div class="cart-item product-summary">
                  <div class="row" style="padding-bottom: 8px">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail) }}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index8a95.html?page-detail">{{$cart->product->name}} </a></h3>
                      <div class="price">{{currency()}}{{number_format($cart->product->current_price,2)}} <span class="pl-5"> X {{$cart->quantity}}</span></div>
                    </div>
                    <div class="col-xs-1 action"> <a href="javascript:;"><i class="fa fa-trash delete_cart" cart_id="{{$cart->id}}" data-action="{{ route('cart.delete') }}"></i></a> </div>
                  </div>
                </div>
                @endforeach
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>{{currency()}}{{number_format(total_price(),2)}}</span> </div>
                  <div class="clearfix"></div>
                  <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
              
              </li>
            
              @else
              <h4>Empty Cart</h4>
               @endif
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="{{Route::is('front.index') ? 'active' : ''}} dropdown yamm-fw"> <a href="{{ route('front.index') }}" data-hover="dropdown" class="dropdown-toggle">Home</a> </li>

                <li class="{{Route::is('product.whole_sale') ? 'active' : ''}} dropdown yamm-fw"> <a href="{{ route('product.whole_sale') }}" data-hover="dropdown" class="dropdown-toggle" >Whole Sale Products</a> </li>

                <li class="dropdown yamm-fw"> <a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">About</a> </li>

                <li class="dropdown yamm-fw"> <a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Contact</a> </li>

                 <li class="dropdown yamm-fw"> <a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Terms & Condition</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>