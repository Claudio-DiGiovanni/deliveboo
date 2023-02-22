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
    Route::resource('orders', 'OrderController');
});


Route::get('/admin',function(){
    return view('admin.home');
    })->name('home');


Route::get('{any?}', function () {
    return view('guest.home');
    })->where("any", ".*")->name('guest.home');

    Route::get('/search', function(Request $request) {
        $searchTerm = $request->input('q');
        $route = $request->input('route');

        if ($searchTerm === '') {
            return redirect()->back();
        }

        $dishes = [];
        $orders = [];

        if ($route === 'dishes.index') {
            $dishes = App\Models\Dish::where('name', 'like', '%'.$searchTerm.'%')->get();
        } else if ($route === 'orders.index') {
            $orders = App\Models\Order::where('customer_name', 'like', '%'.$searchTerm.'%')->get();
        }

        return view($route, compact('dishes', 'orders', 'searchTerm'));
    })->name('search');
