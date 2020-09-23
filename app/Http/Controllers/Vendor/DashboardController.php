<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
     public function index(){
    	 $page_data['role']=2;
          return view('vendor.index',compact('page_data'));
    }
}
