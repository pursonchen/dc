<?php

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
Route::get('/', 'PagesController@root')->name('root');

// create order
Route::post('/', 'PagesController@orders')->name('orders.store');
Route::get('/orders', 'PagesController@orderslist')->name('orders.list');
Route::get('orders/{order}', 'PagesController@ordershow')->name('orders.show');
Route::get('close/{order}','PagesController@orderclose')->name('orders.close');

Route::get('reception', 'ReceptionController@reception')->name('reception');
Route::post('reception', 'ReceptionController@store')->name('reception.store');
Route::get('reception/list','ReceptionController@list')->name('reception.list');
Route::get('receptionclose/{reception}','ReceptionController@close')->name('reception.close');

// ajax get dishes
Route::post('/getdish', 'PagesController@getdish');

// 导出订单
Route::get('/orderxls', 'PagesController@export')->name('order.export');;

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

Route::get('permission-denied', 'PagesController@permissionDenied')->name('permission-denied');


 

