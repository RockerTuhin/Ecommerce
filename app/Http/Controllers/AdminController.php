<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class AdminController extends Controller
{
    public function index(){
    	return view('admin_login');
    }
    // public function show_dashboard(){
    // 	return view('admin.dashboard');
    // }
    public function dashboard(Request $request){
    	$admin_email = $request->admin_email;
    	$admin_password = $request->admin_password;

    	$result = DB::table('tbl_admin')
			    	->where('admin_email',$admin_email)
			    	->where('admin_password',md5($admin_password))
			    	->first();
		if ($result) {
			Session::put('adminName',$result->admin_name);
			Session::put('adminId',$result->admin_id);

			return Redirect::to('/dashboard');
		}
		else
		{
			Session::put('message','Invalid Username or Password');
			return Redirect::to('/admin');
		}
    }

}
