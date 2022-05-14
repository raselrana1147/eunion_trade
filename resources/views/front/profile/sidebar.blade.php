  <ul class="list-group list-group-flush customer-menu-list">
	  <li class="list-group-item ">
	  	<a href="{{ route('customer.dashboard') }}">
	  	<span class="{{Route::is('customer.dashboard') ? 'menu-active' : ''}}">
	  		<i class="fa fa-home"></i>Dashboard
	  	</span>
	  	</a></li>

	 <li class="list-group-item"><a href="{{ route('customer.order') }}"><span class="{{Route::is('customer.order') ? 'menu-active' : ''}}"><i class="fa fa-list"></i>My Order</span></a></li>

	 {{--  <li class="list-group-item"><a href="{{ route('customer.order_track') }}"><span class="{{Route::is('customer.order_track') ? 'menu-active' : ''}}"><i class="fa fa-shopping-basket"></i>Track Order</span></a></li> --}}

	  <li class="list-group-item"><a href="{{ route('customer.password') }}" ><span class="{{Route::is('customer.password') ? 'menu-active' : ''}}"> <i class="fa fa-lock"></i>Change Password</span></a></li>

	  <li class="list-group-item"><a href="{{ route('customer.profile') }}"><span class="{{Route::is('customer.profile') ? 'menu-active' : ''}}"><i class="fa fa-user"></i>Profile</span></a></li>
	  <li class="list-group-item"><a href="" class=""  href="javascript:;" onclick="event.preventDefault();
	  	    document.getElementById('logout-form-customer').submit();">
	  	<span><i class="fa fa-lock"></i>Logout</span></a>
	  	<form id="logout-form-customer" action="{{ route('logout') }}" method="POST" class="d-none">
	  	     @csrf
	  	 </form>
	  </li>
</ul>