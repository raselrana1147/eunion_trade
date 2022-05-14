<?php 


use App\Models\Admin\GeneralSetting;
use Illuminate\Support\Str;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Coupon;
use App\Models\User;
use App\Models\Admin\SocialLink;

function site_name()
{
	$data=GeneralSetting::first();
	return $data->site_name;
}

function site_tite()
{
	$data=GeneralSetting::first();
	return $data->title;
}

function copyright()
{
	$data=GeneralSetting::first();
	return $data->copyright;
}

function shipping_charge()
{
	$data=GeneralSetting::first();
	return $data->shipping_charge;
}
function tax()
{
	$data=GeneralSetting::first();
	return $data->tax;
}


function logo()
{
	$data=GeneralSetting::first();
	return $data->logo;
}

function favicon()
{
	$data=GeneralSetting::first();
	return $data->favicon;
}


function currency()
{
	$data=GeneralSetting::first();
	return $data->currency;
}


function default_image()
{
	$data=GeneralSetting::first();
	return $data->default_image;
}


function company_address()
{
	$data=GeneralSetting::first();
	return $data->company_address;
}


function description()
{
	$data=GeneralSetting::first();
	return $data->description;
}


function company_phone()
{
	$data=GeneralSetting::first();
	return $data->company_phone;
}


function company_email()
{
	$data=GeneralSetting::first();
	return $data->company_email;
}

function short_description($description)
{
	
	return Str::substr($description,200);

}

function carts()
{
	return Cart::carts();
}

function first_cart()
{
     return Cart::first_cart();
}

function total_item()
{
	return Cart::total_item();
}

function total_price()
{
	return Cart::total_price();
}

function sub_total()
{
	$data=GeneralSetting::first();
    $data->shipping_charge;
    $sub_price=Cart::total_price();
    if (Auth::check())
    {
       $cart=Cart::where('user_id',Auth::user()->id)->first();
    }else{
    	$ip=\Request::ip();
        $cart=Cart::where('ip_address',$ip)->first();    
    }
    if (!is_null($cart)) 
    {
    	if ($cart->coupon_id !=null) {
    		$coupon=Coupon::findOrFail($cart->coupon_id);
    		if ($coupon->type=="flat")
    		{
    			$total_remain=$sub_price-$coupon->discount;
    			return $total_remain;

    		}else{
    			$discount=($sub_price*$coupon->discount)/100;
    			$total_remain=$sub_price-$discount;
    			return $total_remain;
    		}
    	}else{
    		return $sub_price;
    	}
    }
	
}


function grand_total()
{
	$data=GeneralSetting::first();
    $data->shipping_charge;
    $total_price=Cart::total_price();
    if (Auth::check())
    {
       $cart=Cart::where('user_id',Auth::user()->id)->first();
    }else{
    	$ip=\Request::ip();
        $cart=Cart::where('ip_address',$ip)->first();    
    }
    if (!is_null($cart)) 
    {
    	if ($cart->coupon_id !=null) {
    		$coupon=Coupon::findOrFail($cart->coupon_id);
    		if ($coupon->type=="flat")
    		{
    			$total_remain=$total_price-$coupon->discount;
    			return $total_remain+$data->shipping_charge+$data->tax;

    		}else{
    			$discount=($total_price*$coupon->discount)/100;
    			$total_remain=$total_price-$discount;
    			return $total_remain+$data->shipping_charge+$data->tax;
    		}
    	}else{
    		return $total_price+$data->shipping_charge+$data->tax;
    	}
    }
	
}

function push_notification($title,$body)
{
    $data=GeneralSetting::first();
    $SERVER_API_KEY =$data->firebase_api_key;


       $device_token = [];
       $users=User::whereNotNull('firebase_token')->orderBy('id','DESC')->get();
      
       foreach ($users as $user) 
       {
           $device_token[] = $user->firebase_token;   
       }
       
       $data_info = [
           "registration_ids" =>$device_token,
           "priority" => "high",
           "notification" => [
               "title" => $title,
               'body' =>$body
           ]
       ];

       $dataString = json_encode($data_info);

       $headers = [
           'Authorization: key=' . $SERVER_API_KEY,
           'Content-Type: application/json',
       ];


       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
       $response = curl_exec($ch);
       curl_close($ch);
}

function social_link()
{
   $social=SocialLink::orderByDesc('id')->get();
   return $social;
}


