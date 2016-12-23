<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/orders');
    } else
        return redirect('login');
});

Auth::routes();

Route::get('/profile', ['middleware' => 'auth', 'uses' => 'ProfileController@dashboard']);

Route::get('/logout', 'ProfileController@logout');

Route::get('/orders', ['middleware' => 'auth', 'uses' => 'OrderController@view']);

Route::get('/orders/edit', ['middleware' => 'auth', 'uses' => 'OrderController@edit']);
Route::get('/orders/edit/new', ['middleware' => 'auth', 'uses' => 'OrderController@create']);
Route::post('/orders/edit', ['middleware' => 'auth', 'uses' => 'OrderController@save']);

Route::get('/orders/edit/object', ['middleware' => 'auth', 'uses' => 'OrderController@create_obj']);
Route::post('/orders/edit/object', ['middleware' => 'auth', 'uses' => 'OrderController@save_obj']);