<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/contact', function () {
    return view('frontend.Contact_us');
});

Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/post', function () {
    return view('frontend.single');
});


//admin


Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('/category', CategoryController::class);
Route::get('/category.create', [CategoryController::class, 'create']);
Route::post('/category.store', [CategoryController::class, 'store']);





