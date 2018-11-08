<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CategoryController extends Controller
{
    public function index(){
    	return view('admin.add-category');
    }
    public function all_category(){

    	$allCategory = DB::table('tbl_category')->get();

    	$manageCategory = view('admin.all-category')
    		->with('all_category_info',$allCategory);

    	return view('admin_layout')
    		->with('admin.all-category',$manageCategory);
    	//return view('admin.all-category');
    }
    public function save_category(Request $request){
    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tbl_category')->insert($data);

    	Session::put('message','Category added successfully.');

    	return Redirect::to('/add-category');
    }
    public function unactive_category($category_id){
    	DB::table('tbl_category')
    		->where('category_id',$category_id)
    		->update(['publication_status' => 0]);
    	Session::put('message','Category unactivated successfully.');

    	return Redirect::to('/all-category');
    }
    public function active_category($category_id){
    	DB::table('tbl_category')
    		->where('category_id',$category_id)
    		->update(['publication_status' => 1]);
    	Session::put('message','Category activated successfully.');

    	return Redirect::to('/all-category');
    }
    public function edit_category($category_id){

    	$single_category_info = DB::table('tbl_category')
    		->where('category_id',$category_id)
    		->first();

    	return view('admin.edit_category')
    		->with('single_category_info',$single_category_info);
    }
     public function update_category(Request $request, $category_id){
     		$data = array();
     		$data['category_name'] = $request->category_name;
     		$data['category_description'] = $request->category_description;
			DB::table('tbl_category')
				->where('category_id',$category_id)
				->update($data);

			Session::put('message','Category Updated Successfully');
			return Redirect::to('/all-category');
    }
    public function delete_category($category_id){
     		DB::table('tbl_category')
     			->where('category_id',$category_id)
     			->delete();

     		Session::put('message','Category deleted successfully');

     		return Redirect::to('/all-category');
    }
}
