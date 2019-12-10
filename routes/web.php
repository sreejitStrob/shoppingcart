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
    return view('welcome');
});

Auth::routes();
Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
 });

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/Products', 'ShopListsController@index')->name('Productline');
Route::get('/shopping_cart', 'ShopListsController@showcart')->name('cart_list');
Route::get('/product_details/{id}', 'ShopListsController@productdetails')->name('product_description');

Route::get('/Add_Product', 'ProductsController@index')->name('add_product_true');
Route::get('/product_list', 'ProductsController@show')->name('prodcut_list');
Route::get('/abandoned_cart', 'ProductsController@abandonedcart')->name('cart_list');



Route::post('/add_product_store', 'ProductsController@store');
Route::post('/add_product_to_cart', 'CartsController@store');

