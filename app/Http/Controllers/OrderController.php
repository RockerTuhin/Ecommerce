<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class OrderController extends Controller
{
    public function manage_order() {
		$all_order_info = DB::table('tbl_order')
				    	->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
				    	->select('tbl_order.*','tbl_customer.customer_name')
				    	->get();
    	return view('admin.manage_order')
    			->with('all_order_info',$all_order_info);
    }

    public function view_order($order_id) {
    	$view_order = DB::table('tbl_order')
			    	->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
			    	->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
			    	->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
			    	->select('tbl_order.*','tbl_customer.*','tbl_shipping.*','tbl_order_details.*')
			    	->get();
    	return view('admin.view_order')
    			->with('view_order',$view_order);
    }
}
