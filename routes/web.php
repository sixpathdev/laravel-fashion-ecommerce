<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Cartcount;

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


//USER PROFILE ROUTES
Route::get('/account/edit', 'UserController@index');
Route::put('/account/update', 'UserController@update');

Route::get('/account/changepassword', function () {
    return view('change_password');
});
Route::patch('/account/changepassword', 'UserController@changePassword');


Route::get('/account/customer/address', 'UserController@shippingAddress');
Route::patch('/account/customer/address', 'UserController@updateShippingAddress');

Route::get('/account/customer/orders', function () {
    return view('orders');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@store')->name('cartdetails');
Route::patch('/cart', 'CartController@update')->name('cartupdate');
Route::delete('/cart', 'CartController@destroy')->name('cartitemdelete');
Route::get('/products', 'ProductsController@index');
Route::post('/product', 'ProductsController@store')->name('product');
Route::get('/account', function () {
    return view('account');
});
Route::get('/categories', 'CategoriesController@index');
Route::post('/categories', 'CategoriesController@store')->name('addCategory');
Route::patch('/categories/{catid}', 'CategoriesController@update');

Route::get('/product/{id}', 'ProductsController@show');
Route::patch('/product/{id}', 'ProductsController@update');
Route::delete('/categories/{id}', 'CategoriesController@destroy');
Route::delete('/product/{id}', 'ProductsController@destroy');
