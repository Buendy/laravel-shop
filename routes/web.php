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
    $products = \App\Product::paginate(9);
    return view('welcome', compact('products'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/{product}', 'ProductController@show');

Route::post('/cart', 'CartDetailController@store');
Route::post('/cart', 'CartDetailController@destroy');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group( function(){
    Route::get('/products', 'ProductController@index');
    Route::get('/products/create', 'ProductController@create');
    Route::post('/products', 'ProductController@store');
    Route::get('/products/{product}/edit', 'ProductController@edit');
    Route::put('/products/{product}', 'ProductController@update');
    Route::delete('/products/{product}', 'ProductController@destroy');

    Route::get('/products/{product}/images', 'ImageController@index');
    Route::post('/products/{product}/images', 'ImageController@store');
    Route::delete('/products/{product}/images/{product_image}', 'ImageController@destroy');
    Route::post('/products/{product}/images/{product_image}', 'ImageController@select');

});

