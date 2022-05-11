<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DeliveryaddressController;
use App\Http\Controllers\OrderController;

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
 
Route::resource('product',ProductController::class);
Route::resource('category',CategoryController::class);
Route::get('images/{filename}', [ImageController::class,'displayImage'])->name('image.displayImage');
Route::resource('users',UserController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

Route::post('/add_to_cart',[ProductController::class,'addToCart']);
Route::get('/mycart',[ProductController::class,'myCartList'])->name('mycart');
Route::delete('/cart_products/{product}', [ProductController::class,'cartdestroy']);

Route::get('/ordernow',[ProductController::class,'orderNow']);
Route::post('/order',[OrderController::class,'store']);

Route::get('/rating/{product}', [ProductController::class,'ratingindex']);

Route::get('/deliveryaddress',[DeliveryaddressController::class,'create'])->name('deliveryaddress');
Route::post('/deliveryaddress',[DeliveryaddressController::class,'store']);

Route::get('/orderedlist',[OrderController::class,'index'])->name('orderedlist');

Route::get('/payment/{order_id}',[PaymentController::class,'update'])->name('payment');
Route::get('/search',[ProductController::class,'search']);
