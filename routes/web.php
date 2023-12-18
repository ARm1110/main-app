<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\UserPanelController;
use App\Http\Controllers\Backend\CategoryController;
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




//Route::get('/', function () {
//    return redirect()->route('home');
//});
Route::get('/home', function () {
    return view('home');
})->name('home');

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

//TODO: impalement this section



