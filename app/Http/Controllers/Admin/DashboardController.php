<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //


    public function index(){
    	 $page_data['role']=1;
          return view('admin.index',compact('page_data'));
    }
}
