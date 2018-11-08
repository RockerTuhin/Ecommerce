<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ProductController extends Controller
{
    public function index(){
    	return view('admin.add_product');
    }
    public function save_product(Request $request){
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['category_id'] = $request->category_id;
    	$data['brand_id'] = $request->brand_id;
    	$data['product_short_description'] = $request->product_short_description;
    	$data['product_long_description'] = $request->product_long_description;
    	$data['product_price'] = $request->product_price;
    	//$data['product_image'] = $request->product_image;
    	$data['product_size'] = $request->product_size;
    	$data['product_color'] = $request->product_color;
    	$data['publication_status'] = $request->publication_status;
    	$image = $request->file('product_image');
    	if ($image) {
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if($success) {
    			$data['product_image'] = $image_url;
    			DB::table('tbl_products')
			    		->insert($data);
		    	Session::put('message','Product added successfully');
		    	return Redirect::to('/add-product');
    		}
    	}
    	else {
	    	$data['product_image'] = '';
	    	DB::table('tbl_products')
	    		->insert($data);
	    	Session::put('message','Product added successfully without image');
	    	return Redirect::to('/add-product');
	    }
    }
    public function all_product(){
    	$all_product = DB::table('tbl_products')
    		->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    		->join('tbl_brands','tbl_products.brand_id','=','tbl_brands.brand_id')
    		->select('tbl_products.*','tbl_category.category_name','tbl_brands.brand_name')
    		->get();

    	return view('admin.all_product')
    		->with('all_product_info',$all_product);
    }
    public function unactive_product($product_id){
    	DB::table('tbl_products')
    		->where('product_id',$product_id)
    		->update(['publication_status' => 0]);

    	Session::put('message','Product unactivated successfully');

    	return Redirect::to('/all-product');
    }
    public function active_product($product_id){
    	DB::table('tbl_products')
    		->where('product_id',$product_id)
    		->update(['publication_status' => 1]);

    	Session::put('message','Product activated successfully');

    	return Redirect::to('/all-product');
    }
    public function delete_product($product_id){
    	DB::table('tbl_products')
    		->where('product_id',$product_id)
    		->delete();

    	Session::put('message','Product deleted successfully');

    	return Redirect::to('/all-product');
    }
    public function edit_product($product_id){
    	$single_product = DB::table('tbl_products')
    		->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    		->join('tbl_brands','tbl_products.brand_id','=','tbl_brands.brand_id')
    		->where('product_id',$product_id)
    		->first();
    	return view('admin.edit_product')
    		->with('single_product_info',$single_product);
    }
     public function update_product(Request $request, $product_id){

     	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['category_id'] = $request->category_id;
    	$data['brand_id'] = $request->brand_id;
    	$data['product_short_description'] = $request->product_short_description;
    	$data['product_long_description'] = $request->product_long_description;
    	$data['product_price'] = $request->product_price;
    	//$data['product_image'] = $request->product_image;
    	$data['product_size'] = $request->product_size;
    	$data['product_color'] = $request->product_color;
    	$image = $request->file('product_image');
    	if ($image) {
    	 	$image_name = str_random(20);
    	 	$ext = strtolower($image->getClientOriginalExtension());
    	 	$image_full_name = $image_name.'.'.$ext;
    	 	$upload_path = 'image/';
    	 	$image_url = $upload_path.$image_full_name;
    	 	$success = $image->move($upload_path,$image_full_name);
    	 	if($success) {
    	 		$data['product_image'] = $image_url;
    	 	}
    	}
    	else {
	     	$data['product_image'] = '';
	    }
     
     DB::table('tbl_products')
     	->where('product_id',$product_id)
     	->update($data);
     Session::put('message','Product updated successfully without image');

	 return Redirect::to('/all-product');
	}
	    
}
