<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class HomeController extends Controller
{
    public function index() {
    	$all_product = DB::table('tbl_products')
    		->join('tbl_brands','tbl_products.brand_id','=','tbl_brands.brand_id')
    		->select('tbl_products.*','tbl_brands.brand_name')
    		->where('tbl_products.publication_status',1)
    		->limit(9)
    		->get();
    	return view('pages.home_content')
    		->with('all_product_info',$all_product);
    }
    public function show_product_by_category($category_id) {
    	$all_product_by_category = DB::table('tbl_products')
    		->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    		->select('tbl_products.*','tbl_category.category_name')
    		->where('tbl_products.category_id',$category_id)
    		->where('tbl_products.publication_status',1)
    		->limit(18)
    		->get();

    	return view('pages.all_product_by_category')
    		->with('all_product_by_category_info',$all_product_by_category);
    }
    public function show_product_by_brand($brand_id) {
    	$all_product_by_brand = DB::table('tbl_products')
    		->join('tbl_brands','tbl_products.brand_id','=','tbl_brands.brand_id')
    		->select('tbl_products.*','tbl_brands.brand_name')
    		->where('tbl_products.brand_id',$brand_id)
    		->where('tbl_products.publication_status',1)
    		->limit(18)
    		->get();

    	return view('pages.all_product_by_brand')
    		->with('all_product_by_brand_info',$all_product_by_brand);
    }
    public function details_of_product($product_id) {
    	$details_of_product = DB::table('tbl_products')
    		->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    		->join('tbl_brands','tbl_products.brand_id','=','tbl_brands.brand_id')
    		->select('tbl_products.*','tbl_brands.brand_name','tbl_category.category_name')
    		->where('tbl_products.product_id',$product_id)
    		->where('tbl_products.publication_status',1)
    		->first();

    	return view('pages.details_of_product')
    		->with('details_of_product_info',$details_of_product);
    }
}
