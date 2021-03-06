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

Route::get('/', 'ProductController@index')->name('home');

Auth::routes();

Route::resource('customer', 'CustomerController');
Route::resource('cart', 'ShoppingCartController');
Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');
Route::resource('order', 'OrderController');

