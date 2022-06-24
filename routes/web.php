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

Auth::routes();

Route::get('register', 'Auth\RegisterController@chooseType')->name('register');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('dishes', 'DishController');
    Route::get('/orders', 'OrderController@index')->name('orders');
});

Route::get('/', 'GuestController@index');
Route::get('/cerca', 'SearchController@index');
Route::get('/ristoranti', 'GuestController@restaurants');
Route::post('/update', 'SearchController@update')->name('search.update');
Route::get('/{id}', 'GuestController@show');
Route::post('/checkout', 'GuestController@checkout');