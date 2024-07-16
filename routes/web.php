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
use App\Http\Controllers\Backend\ForgotPasswordController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\SpecialOfferController;
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
    });
});

Route::get('products', [\App\Http\Controllers\Frontend\ShowProductController::class, 'index'])->name('show.products');


Route::group(['middleware' => ['auth','role:user']], function () {
    Route::post('/create-payment', [PaymentController::class, 'createPayment'])->name('createPayment');
    Route::get('/verify-payment', [PaymentController::class, 'verifyPayment'])->name('verifyPayment');
    Route::get('/payment-ok', [PaymentController::class, 'paymentOk'])->name('paymentOk');
    Route::get('/payment-failed', [PaymentController::class, 'paymentFailed'])->name('payment_failed');
});




Route::group(['middleware' => ['guest']], function () {
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'getResetLinkEmail'])->name('password.reset');
    Route::post('/reset-password/{token}', [ForgotPasswordController::class, 'postResetLinkEmail'])->name('post_password.reset');
});

Route::group(['middleware' => ['auth','role:user']], function () {
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout.index');
    Route::post('/checkout', [PaymentController::class, 'postCheckout'])->name('checkout.post');
    Route::get('/get-cities/{province}', [PaymentController::class, 'getCities']);
});

Route::group(['middleware' => ['auth','role:user']], function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove-product/{cartProduct}', [CartController::class, 'removeProduct'])->name('cart.remove-product');
    Route::patch('/cart/update-quantity/{cartProduct}', [CartController::class, 'updateQuantity'])->name('cart.update-quantity');
});

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function () {
        Route::get('order', [OrderController::class, 'index'])->name('order.index');
        Route::patch('order/{order_id}', [OrderController::class, 'update'])->name('order.update');
        Route::get('/print-invoice/{id}', [OrderController::class, 'printInvoice'])->name('invoice.index');
    });
});

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function () {
        Route::get('Uipayments', [\App\Http\Controllers\Backend\UiPaymentsController::class, 'index'])->name('Uipayments.index');
        Route::patch('Uipayments/{payments_id}', [\App\Http\Controllers\Backend\UiPaymentsController::class, 'update'])->name('Uipayments.update');

    });
});

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function () {
        Route::resource('special_offers', SpecialOfferController::class);
    });
});

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function () {
        Route::resource('brands', \App\Http\Controllers\Backend\BrandController::class);
    });
});


