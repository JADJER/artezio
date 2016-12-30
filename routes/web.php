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

Route::get('/logout', 'ProfileController@logout');

Route::get('/orders', ['middleware' => 'auth', 'uses' => 'OrderController@view']);

Route::get('/search', ['middleware' => 'auth', 'uses' => 'OrderController@search']);
Route::post('/search', ['middleware' => 'auth', 'uses' => 'OrderController@search_result']);

Route::get('/handbook', ['middleware' => 'auth', 'uses' => 'HandbookController@handbook']);
Route::get('/handbook/edit/{key}', ['middleware' => 'auth', 'uses' => 'HandbookController@edit']);
Route::get('/handbook/edit/{key}/add', ['middleware' => 'auth', 'uses' => 'HandbookController@create']);
Route::get('/handbook/edit/{key}/edit/{id}', ['middleware' => 'auth', 'uses' => 'HandbookController@edit_row']);
Route::get('/handbook/edit/{key}/delete/{id}', ['middleware' => 'auth', 'uses' => 'HandbookController@delete']);
Route::post('/handbook/edit/{key}/update/{id}', ['middleware' => 'auth', 'uses' => 'HandbookController@update']);
Route::post('/handbook/edit/{key}/save', ['middleware' => 'auth', 'uses' => 'HandbookController@save']);

Route::get('/order/create', ['middleware' => 'auth', 'uses' => 'OrderController@create']);
Route::post('/order/save', ['middleware' => 'auth', 'uses' => 'OrderController@save']);\
Route::post('/order/update/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@update']);
Route::get('/order/sign/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@sign']);
Route::get('/order/edit/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@edit']);
Route::get('/order/delete/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@delete']);

Route::get('/object/create/{id}', ['middleware' => 'auth', 'uses' => 'ObjectController@create']);
Route::post('/object/save/{id}', ['middleware' => 'auth', 'uses' => 'ObjectController@save']);
Route::post('/object/update/{or}/{ob}', ['middleware' => 'auth', 'uses' => 'ObjectController@update']);
Route::get('/object/edit/{or}/{ob}', ['middleware' => 'auth', 'uses' => 'ObjectController@edit']);
Route::get('/object/delete/{id}/{ob}', ['middleware' => 'auth', 'uses' => 'ObjectController@delete']);