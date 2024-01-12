<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\UserPanelController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\PaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('handelLogin.login');
    Route::get('register', [RegisterController::class, 'index'])->name('show.register');
    Route::post('register', [RegisterController::class, 'store'])->name('store.register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function () {
        Route::get('panel', [AdminPanelController::class, 'index'])->name('show.panel');
        Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::resource('category',CategoryController::class);
        Route::resource('subcategory',SubCategoryController::class);
        Route::resource('childcategory',ChildCategoryController::class);
        Route::delete('/product/{product}/images/{image}', [ProductController::class, 'removeImage'])->name('products.removeImage');
        Route::delete('/product/{product}/video/{video}', [ProductController::class, 'removeVideo'])->name('products.videoImage');
        Route::resource('product',ProductController::class);
    });
});

Route::group(['middleware' => ['auth','role:user']], function () {
    Route::group([
        'prefix' => 'user',
        'as' => 'user.'
    ], function () {
        Route::get('dashboard', [UserPanelController::class, 'index'])->name('show.dashboard');
        Route::get('profile/edit', [UserPanelController::class, 'edit'])->name('profile.edit');
        Route::put('profile/update', [UserPanelController::class, 'update'])->name('profile.update');
        Route::get('/verification', [PaymentController::class, 'verifyPayment'])->name('cart.index');
        Route::post('/create-payment', [PaymentController::class, 'createPayment'])->name('createPayment');
        Route::get('/verify-payment', [PaymentController::class, 'verifyPayment'])->name('verifyPayment');
    });
});

Route::get('products', [\App\Http\Controllers\Frontend\ShowProductController::class, 'index'])->name('show.products');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::patch('/cart/update/{cartId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{cartId}', [CartController::class, 'remove'])->name('cart.remove');






