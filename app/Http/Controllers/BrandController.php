<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class BrandController extends Controller
{
    public function index() {
    	return view('admin.add_brand');
    }
    public function save_brand(Request $request) {
    	$data = array();
    	$data['brand_name'] = $request->brand_name;
    	$data['brand_description'] = $request->brand_description;
    	$data['publication_status'] = $request->publication_status;
    	DB::table('tbl_brands')
    		->insert($data);

    	Session::put('message','Brand added successfully');

    	return Redirect::to('/add-brand');
    }
    public function all_brand(Request $request) {
    	$all_brand = DB::table('tbl_brands')
    		->get();
    	return view('admin.all_brand')
    		->with('all_brand_info',$all_brand);
    }
    public function delete_brand($brand_id) {
    	DB::table('tbl_brands')
    		->where('brand_id',$brand_id)
    		->delete();

    	Session::put('message','Brand deleted successfully');

    	return Redirect::to('/all-brand');
    }
    public function unactive_brand($brand_id) {
    	DB::table('tbl_brands')
    		->where('brand_id',$brand_id)
    		->update(['publication_status' => 0]);

    	Session::put('message','Brand unactivated successfully');

    	return Redirect::to('/all-brand');
    }
    public function active_brand($brand_id) {
    	DB::table('tbl_brands')
    		->where('brand_id',$brand_id)
    		->update(['publication_status' => 1]);

    	Session::put('message','Brand activated successfully');

    	return Redirect::to('/all-brand');
    }
    public function edit_brand($brand_id) {
    	$single_brand = DB::table('tbl_brands')
    		->where('brand_id',$brand_id)
    		->first();
    	return view('admin.edit_brand')
    		->with('single_brand_info',$single_brand);
    }
    public function update_brand(Request $request,$brand_id) {
    	$data = array();
    	$data['brand_name'] = $request->brand_name;
    	$data['brand_description'] = $request->brand_description;
    	DB::table('tbl_brands')
    		->where('brand_id',$brand_id)
    		->update($data);
    	return Redirect::to('/all-brand');
    }
}
