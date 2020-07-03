<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController@index');
Route::get('/products/{product}/add', 'ProductController@addToCart');
Route::post('/products/add', 'ProductController@addNewProduct');
Route::get('/products/{product}/remove', 'ProductController@removeFromCart');
Route::get('/products/{product}/delete', 'ProductController@deleteProduct');
Route::get('/products/checkout', 'ProductController@checkout');
Route::get('/products/search', 'ProductController@search');
Route::get('/cart', 'ProductController@getCart');
Route::post('/login', 'UserController@login');

