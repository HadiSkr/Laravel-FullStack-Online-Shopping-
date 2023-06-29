<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\dashboardcontroller;
use App\Http\Controllers\Admin\depcontroller;
use App\Http\Controllers\Admin\productcontroller;
use App\Http\Controllers\Admin\BalanceController;
use App\Http\Controllers\frontend\frontendcontroller;
use App\Http\Controllers\frontend\checkoutcontroller;
use App\Http\Controllers\frontend\cartcontroller;
use App\Http\Controllers\frontend\usercontroller;
use App\Http\Controllers\Admin\ordercontroller;
use Inertia\Inertia;

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
/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/
 Route::get('/', [frontendcontroller::class,'index']);
 Route::get('category', [frontendcontroller::class,'category']);
 Route::get('view-category/{department_id}', [frontendcontroller::class,'viewcategory']);
 Route::get('view-category/{department_id}/{productid}', [frontendcontroller::class,'productview']);


 
Auth::routes();

Route::get('/home',[App\Http\Controllers\frontend\frontendcontroller::class,'index'])->name('home');


/*Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::post('delete-cart-item', [cartcontroller::class,'deleteprod']);
Route::post('update-cart', [cartcontroller::class,'updatecart']);


Route::middleware('auth')->group(function () {
    Route::post('addtocart', [cartcontroller::class,'AddToCart']);
    Route::get('cart', [cartcontroller::class,'viewcart']);
    Route::get('checkout', [checkoutcontroller::class,'index']);
    Route::post('place-order', [checkoutcontroller::class,'placeorder']);
    Route::get('myorder', [usercontroller::class,'index']);
    Route::get('view-order/{orders_id}', [usercontroller::class,'view']);

   
});
Route::group(['middleware' => ['auth','isAdmin']], function () {

   Route::get('dashboard', 'App\Http\Controllers\Admin\FrontendController@index');
   Route::get('categories', 'App\Http\Controllers\Admin\depcontroller@index');
   Route::get('add-category', 'App\Http\Controllers\Admin\depcontroller@add');
   Route::post('insert-category', 'App\Http\Controllers\Admin\depcontroller@addcategory');
   Route::get('edit-category/{department_id}', [depcontroller::class,'edit']);
   Route::get('update-category/{department_id}', [depcontroller::class,'update']);
   Route::get('delete-category/{department_id}', [depcontroller::class,'destroy']);
   Route::get('products', [productcontroller::class,'index']);
   Route::get('add-product', [productcontroller::class,'add']);
   Route::post('insert-product', [productcontroller::class,'insert']);
   Route::get('edit-prod/{productid}', [productcontroller::class,'edit']);
   Route::put('update-product/{productid}', [productcontroller::class,'update']);
   Route::get('delete-prod/{productid}', [productcontroller::class,'destroy']);
   Route::get('orders', [ordercontroller::class,'index']); 
   Route::get('admin/view-order/{orders_id}', [ordercontroller::class,'view']);
   Route::put('update-order/{orders_id}', [ordercontroller::class,'updateorder']);
   Route::get('order-history', [ordercontroller::class,'orderhistory']);
   Route::get('users', [dashboardcontroller::class,'users']);

    // View user balances
    Route::get('/balance', [App\Http\Controllers\Admin\BalanceController::class,'index'])->name('balance.index');        //Route::get('/balance', [BalanceController::class,'index'])->name('balance.index');

    // Edit user balances
    Route::get('/balance/edit', [App\Http\Controllers\Admin\BalanceController::class,'edit'])->name('balance.edit');        //Route::get('/balance', [BalanceController::class,'index'])->name('balance.index');

   //Route::get('/balance/edit', 'BalanceController@edit')->name('balance.edit');
   Route::post('/balance/update', [App\Http\Controllers\Admin\BalanceController::class,'update'])->name('balance.update');        //Route::get('/balance', [BalanceController::class,'index'])->name('balance.index');

    //Route::post('/balance/update', 'BalanceController@update')->name('balance.update');
   
   
 });
require __DIR__.'/auth.php';
