<?php

use Phpml\Classification\KNearestNeighbors;

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




Route::get('/', '\App\Http\Controllers\CustomController@index');

Route::get('/travel_item/{id}', '\App\Http\Controllers\CustomController@travel_page');

Route::get('/hotel_item/{id}', '\App\Http\Controllers\CustomController@hotel_page');

Route::get('/travel', '\App\Http\Controllers\CustomController@travel');

Route::get('/hotel', '\App\Http\Controllers\CustomController@hotel');

Route::get('/getTravel/{keywords}', '\App\Http\Controllers\CustomController@search_travel');

Route::get('/getHotel/{keywords}', '\App\Http\Controllers\CustomController@search_hotel');

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index');






Route::resource('regions', 'regionController');

Route::resource('countries', 'CountryController');

Route::resource('places', 'PlaceController');

Route::resource('activities', 'ActivityController');

Route::resource('hotels', 'HotelController');

Route::resource('hotels', 'HotelController');

Route::resource('travels', 'TravelController');

Route::resource('roomTypes', 'RoomTypeController');

Route::resource('travels', 'TravelController');



Route::resource('orders', 'OrderController');

Route::resource('itineraries', 'ItineraryController');

Route::resource('facilities', 'FacilityController');