<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class SliderController extends Controller
{
    public function index() {
    	return view('admin.add_slider');
    }
    public function save_slider(Request $request) {
    	$data = array();
    	$data['publication_status'] = $request->publication_status;
    	$image = $request->file('slider_image');
    	if ($image) {
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'slider/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if($success) {
    			$data['slider_image'] = $image_url;
    			DB::table('tbl_slider')
			    		->insert($data);
		    	Session::put('message','Slider added successfully');
		    	return Redirect::to('/add-slider');
    		}
    	}
    	else {
	    	$data['slider_image'] = '';
	    	DB::table('tbl_slider')
	    		->insert($data);
	    	Session::put('message','Slider added successfully without image');
	    	return Redirect::to('/add-slider');
	    }
    }
    public function all_slider() {
    	$all_slider = DB::table('tbl_slider')
    		->get();
    	return view('admin.all_slider')
    		->with('all_slider_info',$all_slider);
    }
    public function unactive_slider($slider_id) {
    	DB::table('tbl_slider')
    		->where('slider_id',$slider_id)
    		->update(['publication_status' => 0]);
    	return Redirect::to('/all-slider');
    }
    public function active_slider($slider_id) {
    	DB::table('tbl_slider')
    		->where('slider_id',$slider_id)
    		->update(['publication_status' => 1]);
    	return Redirect::to('/all-slider');
    }
    public function delete_slider($slider_id) {
    	DB::table('tbl_slider')
    		->where('slider_id',$slider_id)
    		->delete();
    	return Redirect::to('/all-slider');
    }
}
