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

Route::get('/product/{id}', function ($id) {
	$travel = \App\Models\travel::get()->where('id', $id)->first();;
	$favorite = null;
	if(Auth::check()){
		$history = new \App\Models\history;
		$history->user_id = Auth::user()->id;
		$history->country_id = $travel->country_id;
		// $history->save();


		// Asia, Middle-East, Europe
		$samples = [];
		$labels = [];
		$fulls = \App\Models\history::get();
		foreach ($fulls as $full) {
			array_push($samples, [$full->country_id]);
			array_push($labels, $full->country_id);
		}


		$classifier = new KNearestNeighbors($k=5);
		$classifier->train($samples, $labels);
		$favorites = \App\Models\travel::get()->where('country_id',$classifier->predict([$id]));

	}
	return view('product',compact('travel','favorites'));
});

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