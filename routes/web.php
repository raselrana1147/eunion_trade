<?php

use Illuminate\Support\Facades\Route;
//==================Admin=============
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\OderController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\StaffController;

//=========Frontend===============
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompareListController;
use App\Http\Controllers\SocialiteController;

// Admin routes
Route::group(['prefix'=>'admin'],function(){

	Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
	
	// Profile Routes
	Route::get('password_form',[AdminProfileController::class,'password_form'])->name('admin.password_form');
	Route::post('change_password',[AdminProfileController::class,'change_password'])->name('admin.change_password');
	Route::get('profile_form',[AdminProfileController::class,'profile_form'])->name('admin.profile_form');
	Route::post('change_profile',[AdminProfileController::class,'change_profile'])->name('admin.change_profile');

	// Order Routes
	Route::get('load_order',[OderController::class,'datatable'])->name('admin.load_order');
	Route::get('order_list',[OderController::class,'index'])->name('admin.order_list');
	Route::get('order_detail/{id}',[OderController::class,'order_detail'])->name('admin.order_detail');
	Route::get('order_invoice/{id}',[OderController::class,'invoice'])->name('admin.order_invoice');
	Route::post('status_change',[OderController::class,'status_change'])->name('admin.order_status_change');
	Route::get('customer_location/{id}',[OderController::class,'customer_location'])->name('admin.customer_location');

		// Report routes
	
	Route::get('generate_report',[ReportController::class,'custom_report'])->name('admin.custom_report');
	Route::post('generate_report',[ReportController::class,'generate_report'])->name('admin.generate_report');
	Route::get('daily_report',[ReportController::class,'daily_report'])->name('admin.daily_report');
	Route::get('weekly_report',[ReportController::class,'weekly_report'])->name('admin.weekly_report');
	Route::get('monthly_report',[ReportController::class,'monthly_report'])->name('admin.monthly_report');
	
	// Staff Routes
	Route::get('load_staff',[StaffController::class,'datatable'])->name('admin.load_staff');
	Route::get('staff_list',[StaffController::class,'index'])->name('admin.staff_list');
	Route::get('staff_create',[StaffController::class,'create'])->name('admin.staff_create');
	Route::post('staff_store',[StaffController::class,'store'])->name('admin.staff_store');
	Route::get('staff_edit/{id}',[StaffController::class,'edit'])->name('admin.staff_edit');
	Route::post('staff_update',[StaffController::class,'update'])->name('admin.staff_update');
	Route::post('staff_delete',[StaffController::class,'delete'])->name('admin.staff_delete');


	// Category Routes
	Route::get('load_category',[CategoryController::class,'datatable'])->name('admin.load_category');
	Route::get('category_list',[CategoryController::class,'index'])->name('admin.category_list');
	Route::get('category_create',[CategoryController::class,'create'])->name('admin.category_create');
	Route::post('category_store',[CategoryController::class,'store'])->name('admin.category_store');
	Route::get('category_edit/{id}',[CategoryController::class,'edit'])->name('admin.category_edit');
	Route::post('category_update',[CategoryController::class,'update'])->name('admin.category_update');
	Route::post('category_delete',[CategoryController::class,'delete'])->name('admin.category_delete');


	// Sub Category Routes
	Route::get('load_subcategory',[SubCategoryController::class,'datatable'])->name('admin.load_subcategory');
	Route::get('subcategory_list',[SubCategoryController::class,'index'])->name('admin.subcategory_list');
	Route::get('subcategory_create',[SubCategoryController::class,'create'])->name('admin.subcategory_create');
	Route::post('subcategory_store',[SubCategoryController::class,'store'])->name('admin.subcategory_store');
	Route::get('subcategory_edit/{id}',[SubCategoryController::class,'edit'])->name('admin.subcategory_edit');
	Route::post('subcategory_update',[SubCategoryController::class,'update'])->name('admin.subcategory_update');
	Route::post('get_cat_wise_subcate',[SubCategoryController::class,'get_sub_cat'])->name('get_cat_wise_subcate');
	Route::post('subcategory_delete',[SubCategoryController::class,'delete'])->name('admin.subcategory_delete');
	Route::post('find_sub_cat',[SubCategoryController::class,'cat_wise_sub_cat'])->name('find_sub_category');


	// Child Category Routes
	Route::get('load_childcategory',[ChildCategoryController::class,'datatable'])->name('admin.load_childcategory');
	Route::get('childcategory_list',[ChildCategoryController::class,'index'])->name('admin.childcategory_list');
	Route::get('childcategory_create',[ChildCategoryController::class,'create'])->name('admin.childcategory_create');
	Route::post('childcategory_store',[ChildCategoryController::class,'store'])->name('admin.childcategory_store');
	Route::get('childcategory_edit/{id}',[ChildCategoryController::class,'edit'])->name('admin.childcategory_edit');
	Route::post('childcategory_update',[ChildCategoryController::class,'update'])->name('admin.childcategory_update');
	Route::post('childcategory_delete',[ChildCategoryController::class,'delete'])->name('admin.childcategory_delete');
	Route::post('find_child_category',[ChildCategoryController::class,'sub_wise_child_cat'])->name('find_child_category');

	// brands Routes
	Route::get('load_brand',[BrandController::class,'datatable'])->name('admin.load_brand');
	Route::get('brand_list',[BrandController::class,'index'])->name('admin.brand_list');
	Route::get('brand_create',[BrandController::class,'create'])->name('admin.brand_create');
	Route::post('brand_store',[BrandController::class,'store'])->name('admin.brand_store');
	Route::get('brand_edit/{id}',[BrandController::class,'edit'])->name('admin.brand_edit');
	Route::post('brand_update',[BrandController::class,'update'])->name('admin.brand_update');
	Route::post('brand_delete',[BrandController::class,'delete'])->name('admin.brand_delete');
	
	// Social Routes
	Route::get('load_social',[SocialController::class,'datatable'])->name('admin.load_social');
	Route::get('social_list',[SocialController::class,'index'])->name('admin.social_list');
	Route::get('social_create',[SocialController::class,'create'])->name('admin.social_create');
	Route::post('social_store',[SocialController::class,'store'])->name('admin.social_store');
	Route::get('social_edit/{id}',[SocialController::class,'edit'])->name('admin.social_edit');
	Route::post('social_update',[SocialController::class,'update'])->name('admin.social_update');
	Route::post('social_delete',[SocialController::class,'delete'])->name('admin.social_delete');



	// Product Routes
	Route::get('load_product',[ProductController::class,'datatable'])->name('admin.load_product');
	Route::get('product_list',[ProductController::class,'index'])->name('admin.product_list');
	Route::get('product_create',[ProductController::class,'create'])->name('admin.product_create');
	Route::post('product_store',[ProductController::class,'store'])->name('admin.product_store');
	Route::get('product_edit/{slug}',[ProductController::class,'edit'])->name('admin.product_edit');
	Route::post('product_update',[ProductController::class,'update'])->name('admin.product_update');
	Route::get('product_detail/{slug}',[ProductController::class,'product_detail'])->name('admin.product_detail');

	Route::post('product_delete',[ProductController::class,'delete'])->name('admin.product_delete');

	Route::post('update_product_status',[ProductController::class,'update_product_status'])->name('admin.update_product_status');
	Route::post('show_product_status',[ProductController::class,'show_product_status'])
	->name('admin.show_product_status');

	Route::post('show_flash_deal',[ProductController::class,'show_flash_deal'])
	->name('admin.show_flash_deal');
	Route::post('set_flash_deal',[ProductController::class,'set_flash_deal'])
	->name('admin.set_flash_deal');


	 //Product Gallery
	Route::get('gallery_list/{id}',[GalleryController::class,'index'])->name('admin.gallery_list');
	Route::post('gallery_store',[GalleryController::class,'store'])->name('admin.gallery_store');
	Route::get('gallery_edit/{id}',[GalleryController::class,'edit'])->name('admin.gallery_edit');
	Route::post('gallery_update',[GalleryController::class,'update'])->name('admin.gallery_update');
	Route::post('gallery_delete',[GalleryController::class,'delete'])->name('admin.gallery_delete');



	//Payment routes
	Route::get('load_payment',[PaymentController::class,'datatable'])->name('admin.load_payment');
	Route::get('payment_list',[PaymentController::class,'index'])->name('admin.payment_list');
	Route::get('payment_create',[PaymentController::class,'create'])->name('admin.payment_create');
	Route::post('payment_store',[PaymentController::class,'store'])->name('admin.payment_store');
	Route::get('payment_edit/{id}',[PaymentController::class,'edit'])->name('admin.payment_edit');
	Route::post('payment_update',[PaymentController::class,'update'])->name('admin.payment_update');
	Route::post('payment_delete',[PaymentController::class,'delete'])->name('admin.payment_delete');

	// Coupon Routes
	Route::get('load_coupon',[CouponController::class,'datatable'])->name('admin.load_coupon');
	Route::get('coupon_list',[CouponController::class,'index'])->name('admin.coupon_list');
	Route::get('coupon_create',[CouponController::class,'create'])->name('admin.coupon_create');
	Route::post('coupon_store',[CouponController::class,'store'])->name('admin.coupon_store');
	Route::get('coupon_edit/{id}',[CouponController::class,'edit'])->name('admin.coupon_edit');
	Route::post('coupon_update',[CouponController::class,'update'])->name('admin.coupon_update');
	Route::post('coupon_delete',[CouponController::class,'delete'])->name('admin.coupon_delete');


	
	// slider Routes
	Route::get('load_slider',[SliderController::class,'datatable'])->name('admin.load_slider');
	Route::get('slider_list',[SliderController::class,'index'])->name('admin.slider_list');
	Route::get('slider_create',[SliderController::class,'create'])->name('admin.slider_create');
	Route::post('slider_store',[SliderController::class,'store'])->name('admin.slider_store');
	Route::get('slider_edit/{id}',[SliderController::class,'edit'])->name('admin.slider_edit');
	Route::post('slider_update',[SliderController::class,'update'])->name('admin.slider_update');
	Route::post('slider_delete',[SliderController::class,'delete'])->name('admin.slider_delete');


	// Authenticate Routes
	Route::get('login',[LoginController::class,'showLoginForm'])->name('admin.login');
	Route::post('login',[LoginController::class,'login'])->name('admin.login');
	Route::post("admin_logout",[LoginController::class,'logout'])->name('admin.logout');
});



/*
|--------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------
|
*/

Auth::routes();

Route::get('/',[HomeController::class, 'index'])->name('front.index');
Route::get('/product_detail/{slug}',[HomeController::class, 'product_detail'])->name('product.detail');
Route::get('product/whole_sale',[HomeController::class, 'whole_sale'])
->name('product.whole_sale');
Route::get('/api_callback',[HomeController::class, 'api_callback'])
->name('api_callback');

Route::get('/category_wise_product/{id}',[HomeController::class, 'category_product'])
->name('product.category_product');
Route::get('/subcategory_wise_product/{id}',[HomeController::class, 'subcategory_product'])
->name('product.subcategory_product');
Route::get('/childcategory_wise_product/{id}',[HomeController::class, 'childcategory_product'])->name('product.childcategory_product');
Route::get('/brand_wise_product/{id}',[HomeController::class, 'brand_wise_product'])->name('product.brand_wise_product');
Route::post('/find_color',[HomeController::class, 'find_color'])->name('find_color');
Route::post('/available_quantity',[HomeController::class, 'available_quantity'])->name('available_quantity');
Route::match(array('post','get'),'/search',[HomeController::class, 'search'])->name('product.search');
Route::match(array('post','get'),'/search_by_price',[HomeController::class, 'search_by_price'])->name('product.by.search');

// cart routes
Route::post('/add_to_cart',[CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/cart_view',[CartController::class, 'cart'])->name('view.cart');
Route::post('/cart_delete',[CartController::class, 'cart_delete'])->name('cart.delete');
Route::post('/cart_update',[CartController::class, 'cart_update'])->name('cart.update');
Route::post('/apply_coupon',[CartController::class, 'apply_coupon'])->name('apply_coupon');
Route::get('/checkout',[CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/submit_checkout',[CheckoutController::class, 'submit_checkout'])->name('submit.checkout');
Route::get('/success_checkout',[CheckoutController::class, 'success_checkout'])->name('success.checkout');
Route::get('/process_payment',[CheckoutController::class, 'process_payment'])->name('process_payment');
// Wishlist route
Route::post('/add_to_wishlist',[WishlistController::class, 'add_wishlist'])->name('add_to_wishlist');
Route::get('/wishlist',[WishlistController::class, 'wishlist'])->name('wishlist');
Route::post('/wishlist_delete',[WishlistController::class, 'delete'])->name('wishlist.delete');

// comparelist route
Route::post('/add_to_comparelist',[CompareListController::class, 'add_to_comparelist'])->name('add_to_comparelist');
Route::get('/view_comparelist',[CompareListController::class, 'view_comparelist'])->name('view.comparelist');
Route::get('/comparelist_delete/{id}',[CompareListController::class, 'delete_comparelist'])->name('delete.comparelist');


Route::group(['prefix'=>'customer'],function(){
	Route::get('/dashboard',[ProfileController::class, 'dashboard'])->name('customer.dashboard');
	Route::get('/password',[ProfileController::class, 'password'])->name('customer.password');
	Route::post('/password',[ProfileController::class, 'change_password'])->name('customer.change_password');
	Route::get('/order',[ProfileController::class, 'order_list'])->name('customer.order');
	Route::get('/order_track',[ProfileController::class, 'order_track'])->name('customer.order_track');
	Route::get('/profile',[ProfileController::class, 'profile'])->name('customer.profile');
	Route::post('/profile',[ProfileController::class, 'profile_update'])->name('customer.profile_update');
	Route::post('/track_order',[ProfileController::class, 'track_order'])->name('customer.track_order');
});

Route::get('/auth/redirect',[SocialiteController::class,'googleLogin'])->name('google.login');
Route::get('/auth/callback',[SocialiteController::class,'callback'])->name('social.callback');

Route::get('/auth/facebook/redirect',[SocialiteController::class,'facebookLogin'])->name('facebook.login');
Route::get('/auth/facebook/callback',[SocialiteController::class,'facebook_callback'])->name('social.facebook.callback');



