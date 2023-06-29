<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Admin\StoreController;

use Laravel\Sanctum;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Auth::routes();

/*Route::middleware('auth:sanctum')->group(function () {
    Route::group(['middleware' => ['isAdmin']], function () {
        Route::post('AdminLogin','App\Http\Controllers\Admin\logincontroller@AdminLogin');
        Route::post('Adminaddstore','App\Http\Controllers\Admin\StoreController@addstore');
        Route::post('Adminaddproduct','App\Http\Controllers\Admin\StoreController@addproduct');
        Route::delete('AdmindeleteproductById','App\Http\Controllers\Admin\StoreController@deleteproductById');
        Route::post('Admineditproductinfo','App\Http\Controllers\Admin\StoreController@editproductinfo');
        Route::post('AdmindeletstoreById','App\Http\Controllers\Admin\StoreController@deletstoreById');
        Route::post('adminaddcategory','App\Http\Controllers\Admin\depcontroller@addcategory');
        Route::post('AdminddeletcategoryById','App\Http\Controllers\Admin\depcontroller@deletcategoryById');

    }); 
    Route::post('addproduct','App\Http\Controllers\ProductController@addproduct');
    Route::post('addcategory','App\Http\Controllers\DepartmentController@addcategory');    
    Route::delete('deleteproductById','App\Http\Controllers\ProductController@deleteproductById');
    Route::post('editproductinfo','App\Http\Controllers\StoreController@editproductinfo');
    Route::delete('deletcategoryById','App\Http\Controllers\DepartmentController@deletcategoryById');
    Route::post('AddToCart','App\Http\Controllers\CartController@AddToCart');
    Route::get('showcustomercart','App\Http\Controllers\CartController@showcustomercart');
    Route::post('makeorder','App\Http\Controllers\OrderController@makeorder');

});*/
/*Route::post('addstore','App\Http\Controllers\StoreController@addstore');
Route::post('Addlocation','App\Http\Controllers\LocationController@Addlocation');
Route::post('register','App\Http\Controllers\CustomerController@UserRegister');
Route::post('UserLogin','App\Http\Controllers\CustomerController@UserLogin');
Route::get('Getstore','App\Http\Controllers\StoreController@Getstore');
Route::get('getstoreproductbyid','App\Http\Controllers\StoreController@getstoreproductbyid');
Route::post('addpayment','App\Http\Controllers\PaymentController@addpayment');
Route::get('getproductr','App\Http\Controllers\ProductController@getproductr');*/






