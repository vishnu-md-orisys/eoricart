<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;

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

// // Route::get('/productlist', function () {
// //     return view('admin.productlist');
// // });
// // Route::get('/product', function () {
// //     return view('admin.productform');
// // });
// // Route::post('/product', function () {
// //     return view('admin.productform');
// // });
// Route::get('/categorylist', function () {
//     return view('admin.categorylist');
// });
// Route::get('/category', function () {
//     return view('admin.categoryform');
// });
// Route::post('/category', function () {
//     return view('admin.categoryform');
// });