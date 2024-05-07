<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;

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

// Admin login route
Route::get('/', function () {
    return view('welcome');
});



// Product routes
Route::get('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete.product');
Route::get('/upload-form', [ProductController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [ProductController::class, 'upload'])->name('upload.submit');
Route::get('/upload', [ProductController::class, 'upload'])->name('upload.submit');



// Cart routes
Route::get('/', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.updateCart');
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
Route::get('/delete-all', [CartController::class, 'deleteAll'])->name('cart.deleteAll');
Route::get('/logout', [CartController::class, 'logout'])->name('cart.logout');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');