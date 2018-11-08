<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CheckoutController extends Controller
{
    public function login_check() {
    	return view('pages.login_check');
    }

    public function customer_registration(Request $request) {
    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_email'] = $request->customer_email;
    	$data['password'] = $request->password;
    	$data['mobile_number'] = $request->mobile_number;

    	$customer_id = DB::table('tbl_customer')
    					->insertGetId($data);

    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);

    	return Redirect::to('/checkout');
    }

    public function customer_login(Request $request) {
    	$customer_email = $request->customer_email;
    	$password = $request->password;
    	$result = DB::table('tbl_customer')
			    	->where('customer_email',$customer_email)
			    	->where('password',$password)
			    	->first();
		Session::put('customer_id',$result->customer_id);
		if($result) {
			return Redirect::to('/checkout');
		}
		else {
			return Redirect::to('/login-check');
		}
    }

    public function checkout() {
    	return view('pages.checkout');
    }

    public function save_shipping_details(Request $request) {
    	$data = array();
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_first_name'] = $request->shipping_first_name;
    	$data['shipping_last_name'] = $request->shipping_last_name;
    	$data['shipping_address'] = $request->shipping_address;
    	$data['shipping_mobile_number'] = $request->shipping_mobile_number;
    	$data['shipping_city'] = $request->shipping_city;
    	$shipping_id = DB::table('tbl_shipping')
    					->insertGetId($data);
    	Session::put('shipping_id',$shipping_id);
    	return Redirect::to('/payment');
    }

    public function payment() {
    	return view('pages.payment');
    }

    public function shipping_logout() {
    	Session::flush();
    	Cart::clear();
    	return Redirect::to('/');
    }

    public function order_place(Request $request) {
    	$payment_method = $request->payment_method;
    	$pdata = array();
    	$pdata['payment_method'] = $payment_method;
    	$pdata['payment_status'] = 'pending';
    	$payment_id = DB::table('tbl_payment')
    				  ->insertGetId($pdata);

    	$odata = array();	
    	$odata['customer_id'] = Session::get('customer_id');	  
    	$odata['shipping_id'] = Session::get('shipping_id');
    	$odata['payment_id'] = $payment_id;
    	$odata['order_total'] = Cart::getTotal();
    	$odata['order_status'] = 'pending';

    	$order_id = DB::table('tbl_order')
    				->insertGetId($odata);

    	$contents = Cart::getContent();

    	$oddata = array();

    	foreach ($contents as $item) {
    		$oddata['order_id'] = $order_id;
    		$oddata['product_id'] = $item->id;
    		$oddata['product_name'] = $item->name;
    		$oddata['product_price'] = $item->price;
    		$oddata['product_sales_quantity'] = $item->quantity;
    		
    		DB::table('tbl_order_details')
    		->insert($oddata);
    	}

    	if($payment_method == 'handcash') {
    		Cart::clear();
    		return view('pages.handcash');
    	}
    	elseif($payment_method == 'card') {
    		echo "Card";
    	}
    	elseif($payment_method == 'paypal') {
    		echo "Paypal";
    	}
    	else {
    		echo "Not selected";
    	}
    }



}
