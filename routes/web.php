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

// Route::get('/home', 'HomeController@index')->name('home');




Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
    Route::resource('dishes','RestaurantController');
<<<<<<< HEAD
    Route::resource('orders', 'OrderController');
=======
>>>>>>> crud
});


Route::get('/admin',function(){
    return view('admin.home');
    })->name('home');


Route::get('{any?}', function () {
    return view('guest.home');
    })->where("any", ".*")->name('guest.home');

