<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckOwner;

Auth::routes();

Route::middleware('auth')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function () {
    Route::middleware(['auth', CheckOwner::class . ':dish'])->group(function () {
        Route::resource('dishes', 'DishController');
    });
    Route::middleware(['auth', CheckOwner::class . ':order'])->group(function () {
        Route::resource('orders', 'OrderController');
    });
    Route::get('/', function () {
        return view('admin.home');
    })->name('home');
});

Route::get('/', function () {
    return view('guest.home');
})->name('home');
