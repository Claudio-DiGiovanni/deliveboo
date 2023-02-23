<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
$user = Auth::user();
// Guest routes
Route::get('/', function () {
    return view('guest.home');
})->name('guest.home');

// Admin routes
Route::middleware(['auth', "check.owner:dish,user"])
    ->group(function () {
        Route::resource('dishes','Admin\RestaurantController');
    })->name('admin.dishes');

Route::middleware(['auth', 'check.owner:order,user'])->group(function () {
    Route::resource('orders', 'Admin\OrderController');
});

Route::get('/admin', function () {
    return view('admin.home');
})->name('admin.home');
