<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group(array('middleware' => 'auth','middleware' => 'is_admin','prefix'=>'admin','namespace'=>'Admin'), function()
{   
    Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
    Route::resource('product','ProductController');
    Route::resource('product-category','ProductCategoryController');
   



	});


Route::group(array('middleware' => 'auth','middleware' => 'is_vendor','prefix'=>'vendor','namespace'=>'Vendor'), function()
{ 

Route::get('/', 'DashboardController@index')->name('vendor.dashboard.index');

 

  

	});



Route::get('assets/image/category/{filename}', function ($filename)
{
    $path = storage_path('app/category/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});


Route::get('assets/image/product/{filename}', function ($filename)
{
    $path = storage_path('app/product/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});





















