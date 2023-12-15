<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('home');
})->name('home');

Route::get('admin/panel', function () {
    return view('admin.panel');
})->name('admin-panel');

//Route::group(['middleware' => 'guest'], function () {
//    Route::group([
//        'prefix' => 'home',
//        'as' => 'home.'
//    ], function () {
//        Route::get('login', [AuthController::class, 'login'])->name('show.login');
//        Route::post('login', [AuthController::class, 'postLogin'])->name('login');
//        Route::get('register', [AuthController::class, 'register'])->name('show.register');
//        Route::post('register', [AuthController::class, 'postRegister'])->name('register');
//    });
//});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [LoginController::class, 'index'])->name('show.login');
    Route::post('login', [LoginController::class, 'login'])->name('handelLogin.login');
    Route::get('register', [RegisterController::class, 'index'])->name('show.register');
    Route::post('register', [RegisterController::class, 'store'])->name('store.register');

});
