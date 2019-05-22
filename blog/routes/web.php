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

Route::get('/purchase/{type}/{data}', '\App\Http\Controllers\CustomController@requestPurchase')->middleware('auth');

Route::post('/purchase/{type}/{order}', '\App\Http\Controllers\CustomController@processPurchase');

Route::get('/getTravel/{keywords}', '\App\Http\Controllers\CustomController@search_travel');

Route::get('/getHotel/{keywords}', '\App\Http\Controllers\CustomController@search_hotel');

Route::get('/clearHistory', '\App\Http\Controllers\CustomController@clearHistory');

Route::get('/order', '\App\Http\Controllers\CustomController@viewOrder');

Route::get('/itinerary/{order}', '\App\Http\Controllers\CustomController@viewItinerary');

Route::post('/itinerary/{order}', '\App\Http\Controllers\CustomController@saveItinerary');

Route::get('/about', '\App\Http\Controllers\CustomController@aboutPage');

Route::get('/contact', '\App\Http\Controllers\CustomController@contactPage');

Route::get('/staff/login', 'Auth\StaffLoginController@showLoginForm')->name('staff.login');

Route::post('/staff/login', 'Auth\StaffLoginController@login')->name('staff.login.submit');

Route::get('/staff', 'StaffController@home')->name('staff.dashboard');

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'StaffController@index');

Route::resource('staffPage', 'StaffController');

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