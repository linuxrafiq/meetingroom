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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('bookingCategory', 'BookingCategoryController');
Route::resource('client', 'ClientController');
Route::resource('booking', 'BookingController');
Route::resource('roomCategory', 'RoomCategoryController');
Route::resource('room', 'RoomController');



Route::get('/home', 'HomeController@index')->name('home');
