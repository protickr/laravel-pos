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

//login page at front
Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'PagesController@dashboard')->middleware('auth');
Route::get('/sales', 'PagesController@sales')->middleware('auth');
Route::get('/products', 'PagesController@products')->middleware('auth');
Route::get('/customers', 'PagesController@customers')->middleware('auth');
Route::get('/user', 'PagesController@user')->middleware('auth');

Route::post('/customer/add', 'CustomersController@add')->middleware('auth');
Route::get('/product/delete/{id}', 'ProductsController@delete')->middleware('auth');

Route::get('/addproductForm', function () {
    return view('/pages.addproduct');
})->middleware('auth');

Route::post('/product/add', 'ProductsController@add')->middleware('auth');

Route::post('/cart/add', 'CartsController@add')->middleware('auth');
Route::get('/cart/delete/{id}', 'CartsController@delete')->middleware('auth');
Route::get('/cart/checkout', 'CartsController@checkout')->middleware('auth');
Route::post('/cart/invoice', 'CartsController@invoice')->middleware('auth');
