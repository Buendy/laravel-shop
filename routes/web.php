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

Route::middleware(['auth','admin'])->prefix('admin')->group( function(){
    Route::get('/products', 'ProductController@index');
    Route::get('/products/create', 'ProductController@create');
    Route::post('/products', 'ProductController@store');
    Route::get('/products/{product}/edit', 'ProductController@edit');
    Route::put('/products/{product}', 'ProductController@update');
    Route::delete('/products/{product}', 'ProductController@destroy');

    Route::get('/products/{product}/images', 'ImageController@index');
    Route::post('/producst/{product}/images', 'ImageController@store');
    Route::delete('/products/{product}/images/{product_image}', 'ImageController@destroy');

});

