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

Route::get('/', function () {
    $products = \App\Product::all();
    return view('welcome', compact('products'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products', 'ProductController@index');
Route::get('/admin/products/create', 'ProductController@create');
Route::post('/admin/products', 'ProductController@store');
Route::get('/admin/products/{product}/edit', 'ProductController@edit');
Route::put('/admin/products/{product}', 'ProductController@update');
