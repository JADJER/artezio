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

Route::get('/order/create', ['middleware' => 'auth', 'uses' => 'OrderController@create']);
Route::post('/order/save', ['middleware' => 'auth', 'uses' => 'OrderController@save']);
Route::get('/order/sign/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@sign']);
Route::get('/order/edit/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@edit']);
Route::get('/order/delete/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@delete']);

Route::get('/object/create/{id}', ['middleware' => 'auth', 'uses' => 'ObjectController@create']);
Route::post('/object/save', ['middleware' => 'auth', 'uses' => 'ObjectController@save']);
Route::get('/object/sign/{id}', ['middleware' => 'auth', 'uses' => 'ObjectController@sign']);
Route::get('/object/edit/{id}', ['middleware' => 'auth', 'uses' => 'ObjectController@edit']);
Route::get('/object/delete/{id}', ['middleware' => 'auth', 'uses' => 'ObjectController@delete']);