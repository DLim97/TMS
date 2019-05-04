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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $countries = \App\Models\country::get()->take(3);
        $travels = \App\Models\travel::get();
        return view('homepage', compact('countries','travels'));
        
        //Asia, Middle-East, Europe
        // $samples = [];
        // array_push($samples, [1]);
        // array_push($samples, [1]);
        // array_push($samples, [2]);
        // array_push($samples, [3]);
        // array_push($samples, [3]);


        // $labels = ['Asia','Asia','Middle-East','Europe','Europe'];

        // $classifier = new KNearestNeighbors($k=3);
        // $classifier->train($samples, $labels);

        // dd($classifier->predict([1]));

        // return view('home');
    }
}
