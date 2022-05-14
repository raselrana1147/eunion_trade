<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Coupon;

class CartController extends Controller
{
    


    public function add_to_cart(Request $request)
    {

    
	    	if (Auth::check()) 
	    	{
	    		$cart=Cart::where('product_id','=',$request->product_id)
	    		->where('user_id',Auth::user()->id)->first();
	    	}else{
	    	   	
			   $cart=Cart::where('product_id','=',$request->product_id)
			   ->where('ip_address',$request->ip())->first();
	          }
	          if (is_null($cart)) {
	          	$cart            =new Cart();
	          	$cart->product_id=$request->product_id;
	          	$cart->quantity  =$request->quantity;
              $cart->ip_address=$request->ip();
	          	if (Auth::check()) 
	          	{
	          		$cart->user_id=Auth::user()->id;
	          	}

	          	$cart->save();
	          }else
	          {
	          	$cart->increment('quantity');
	          }

	           $total_item=total_item();
	           $cart_items=$this->cart_items();
             $total_price=total_price();
	          
	             $notification=['status'=>'200', 'type'=>'success','message'=>'Succeddfully added to cart','total_item'=>$total_item,'carts'=>$cart_items,'total_price'=>number_format(total_price(),2)];
        

         echo json_encode($notification);
    }

    public function cart()
    {
    	$carts=carts();
    	$total_price=Cart::total_price();
      $brands=DB::table('brands')->get();
    	return view('front.cart',compact('carts','total_price','brands'));
    }


  

    public function cart_delete(Request $request)
    {
      
    	$cart=Cart::findOrFail($request->cart_id);
	    $cart->delete();
	    $total_item =total_item();
		  $total_price=total_price();
		  $grand_total=grand_total();

    	$notification=['status'=>'200', 'type'=>'success','message'=>'Succeddfully deleted','total_item'=>$total_item,'carts'=>$this->cart_items(),'total_price'=>$total_price,'grand_total'=>currency().number_format($this->grand_total(),2)];

    	echo json_encode($notification);
    }



    public  function cart_update(Request $request)
    {
    	
    	   //return $check_stock;
    			$cart=Cart::findOrFail($request->cart_id);
    			$cart->quantity=$request->quantity;
    			$cart->save();
          $each_cart_price=0;
          if ($cart->product->flash_deal==0) {
            $each_cart_price=($cart->product->current_price-($cart->product->current_price*$cart->product->discount)/100)*($cart->quantity);
          }else{
            $each_cart_price=$cart->quantity*$cart->product->current_price;
          }

    			

    			$notification=['status'=>'200', 'type'=>'success','message'=>'Succeddfully updated','total_price'=>currency().number_format(total_price(),2),'grand_total'=>currency().number_format(grand_total(),2),'each_cart_price'=>currency().number_format($each_cart_price,2),'carts'=>$this->cart_items(),];
    		
    	echo json_encode($notification);

    }





    public function grand_total()
    {
    	$total_price=Cart::total_price();
    	$grand_total=$total_price+shipping_charge()+tax();
    	return $grand_total;
    }


      public function cart_items()
    {
    	   $cart_items=carts();
    	   $total_price=total_price();
           $setProduct='';
       	    foreach ($cart_items as $cart) 
       	    {
                  $setProduct.='<div class="cart-item product-summary">
                  <div class="row" style="padding-bottom: 8px">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="'.asset('assets/backend/image/product/small/'.$cart->product->thumbnail).'" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index8a95.html?page-detail">'.$cart->product->name.'</a></h3>
                      <div class="price">'.currency().number_format($cart->product->current_price,2).'<span class="pl-5"> X '.$cart->quantity.'</span></div>
                    </div>
                    <div class="col-xs-1 action"> <a href="javascript:;"><i class="fa fa-trash delete_cart" cart_id="'.$cart->id.'" data-action="'.route('cart.delete').'"></i></a> </div>
                  </div>
                </div>';
             }

             if (count($cart_items)>0)
             {
               $setProduct.='<div class="clearfix"></div>
                   <hr>
                   <div class="clearfix cart-total">
                     <div class="pull-right"> <span class="text">Sub Total :</span><span class="price">'.currency().number_format(total_price(),2).'</span> </div>
                     <div class="clearfix"></div>
                     <a href="'.route('checkout').'" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>';
             }else{
                  $setProduct.='<h4>Empty Cart</h4>';  
              }

              return $setProduct;
    }


    public function apply_coupon(Request $request)
    {
        $coupon=Coupon::where('coupon_code',$request->coupon_code)->first();
        if (!is_null($coupon)) 
        {
           $today=strtotime(date('Y-m-d'));
           $start_date=strtotime($coupon->start_date);
           $end_date=strtotime($coupon->end_date);
           if ($today<$start_date)
           {
             $notification=['status'=>'401', 'type'=>'error','message'=>'Coupon is not started yet'];
           }elseif ($today>$end_date) 
           {
            $notification=['status'=>'402', 'type'=>'error','message'=>'Coupon has been expired'];
           }else
           {
             if (Auth::check())
             {
                $cart=Cart::where(['user_id'=>Auth::user()->id,'coupon_id'=>$coupon->id])->first();

             }else{
                 $cart=Cart::where(['ip_address'=>$request->ip(),'coupon_id'=>$coupon->id])->first();    
             }

             if (!is_null($cart)) 
             {
                 $notification=['status'=>'403', 'type'=>'error','message'=>'Coupon already used'];
             }else{

                  if ($coupon->shopping_amount>total_price())
                  {

                    $notification=['status'=>'403', 'success'=>'error','message'=>'Minimum shopping amount '.currency().$coupon->shopping_amount];
                  }else{
                    foreach (carts() as $cart) 
                    {
                      $cart->coupon_id=$coupon->id;
                      $cart->save();
                    }
                    $notification=['status'=>'200', 'success'=>'sucess','message'=>'Coupoun successfully applied','grand_total'=>currency().number_format(grand_total(),2)];
                  }   
             }
           }
          
        }else{
          $notification=['status'=>'400', 'type'=>'error','message'=>'Invalid coupon'];
        }


        echo json_encode($notification);
    }

}
