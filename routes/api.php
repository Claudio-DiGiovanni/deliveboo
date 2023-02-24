<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

 Route::get('/', 'Api\UserController@index')->name('users.index');
 Route::get('/dishes/user/{userId}', 'Api\UserController@getDishesByUser');

