<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Authcontroller;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware; // Đảm bảo middleware này đã được định nghĩa
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Ajax\LocationController;

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
    return view('welcome');
});

Route::group(['prefix'=> 'user'],function(){
    Route::get('index',[UserController::class,'index'])->name('user.index')->middleware('admin');
    Route::get('create', [UserController::class, 'create'])->name('user.create')->middleware('admin');
    Route::post('store', [UserController::class, 'store'])->name('user.store')->middleware('admin');
});
/*ajax*/
Route::get('ajax/location/getLocation',[LocationController::class,'getLocation'])->name('ajax/location/getLocation')->middleware('admin');
Route::get('dashboard/index',[DashboardController::class,'index'])->name('dashboard.index')->middleware('admin');

Route::get('admin', [Authcontroller::class,'index'])->name('auth.admin')->middleware('login');

Route::post('login', [Authcontroller::class,'login'])->name('auth.login');
Route::get('logout', [Authcontroller::class,'logout'])->name('auth.logout');
