<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Classification\KNearestNeighbors;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $regions = \App\Models\Region::get();
        $countries = \App\Models\Country::get();
        $places = \App\Models\Place::get();
        $travels = \App\Models\Travel::get();
        $hotels = \App\Models\Hotel::get();
        $orders = \App\Models\Hotel::get();
        $activities = \App\Models\Hotel::get();

        return view('home', compact('countries','travels', 'places', 'travels', 'hotels', 'orders', 'regions', 'activities'));
    }
}
