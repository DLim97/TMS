<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CustomController extends Controller
{
    //
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

    public function travel()
    {   
        $travels = \App\Models\travel::get();
        foreach ($travels as $travel) {
            $travel_block["Travel_Name"] = $travel->Travel_Name;
            $travel_block["Start_date"] = $travel->Start_date;
            $travel_block["End_date"] = $travel->End_date;
            $travel_block["Price"] = $travel->Price;
            $travel_block["Country"] = $travel->roomType->hotel->place->country->Country_Name;
            $travel_block["Region"] = $travel->roomType->hotel->place->country->regions->id;
            $travel_block["Description"] = $travel->roomType->hotel->place->Description;
            $travel_block["Image"] = $travel->roomType->hotel->place->Place_IMG;
            $travel_array[] = $travel_block; 
        }

        $region_array = \App\Models\region::get();

        return view('travel', compact('travels','travel_array', 'region_array'));
    }

    public function hotel()
    {   
        $hotels = \App\Models\hotel::get();

        foreach ($hotels as $hotel) {
            $hotel_block["Hotel_Name"] = $hotel->Hotel_Name;
            $hotel_block["Place"] = $hotel->place->Place_Name;
            $hotel_block["Country"] = $hotel->place->country->Country_Name;
            $hotel_block["Region"] = $hotel->place->country->regions->id;
            $hotel_block["RoomTypes"] = \App\Models\RoomType::where('Hotel_ID',$hotel->id)->get()->toArray();
            $hotel_block["Hotel_Image"] = $hotel->Hotel_IMG;
            $hotel_block["Facilities"] = \App\Models\Facility::findMany($hotel->Facility_ID)->toArray();

            $hotel_array[] = $hotel_block; 
        }

        $region_array = \App\Models\region::get();

        return view('hotel', compact('hotels', 'hotel_array', 'region_array'));
        
    }

    public function search_travel(Request $request, $keywords){

        // $str = $keywords 
        // preg_match_all('!\d+!', $str, $numbers);

        if($request->ajax()){

            $combined_table = DB::table('travels')
            ->join('room_types', 'travels.RoomType_ID', '=', 'room_types.id')
            ->join('hotels', 'room_types.Hotel_ID', '=', 'hotels.id')
            ->join('places', 'hotels.Place_ID', '=', 'places.id')
            ->join('countries', 'places.Country_ID', '=', 'countries.id')
            ->join('regions', 'countries.Region_ID', '=', 'regions.id')
            ->where('Travel_Name', 'LIKE', '%'.$keywords.'%')
            ->orWhere('RoomType_Name', 'LIKE', '%'.$keywords.'%')
            ->orWhere('Hotel_Name', 'LIKE', '%'.$keywords.'%')
            ->orWhere('Place_Name', 'LIKE', '%'.$keywords.'%')
            ->orWhere('Country_Name', 'LIKE', '%'.$keywords.'%')
            ->orWhere('Region_Name', 'LIKE', '%'.$keywords.'%')
            ->orWhere('places.Description', 'LIKE', '%'.$keywords.'%')
            ->get();

            return $combined_table;
        }
    }

    public function search_hotel(Request $request, $keywords){

        if($request->ajax()){

            $combined_table = DB::table('hotels')
            ->join('places', 'hotels.Place_ID', '=', 'places.id')
            ->join('countries', 'places.Country_ID', '=', 'countries.id')
            ->join('regions', 'countries.Region_ID', '=', 'regions.id')
            ->leftJoin('room_types', 'hotels.id', '=', 'room_types.Hotel_ID')
            ->orWhere('Hotel_Name', 'LIKE', '%'.$keywords.'%')
            ->orWhere('Place_Name', 'LIKE', '%'.$keywords.'%')
            ->orWhere('Country_Name', 'LIKE', '%'.$keywords.'%')
            ->orWhere('Region_Name', 'LIKE', '%'.$keywords.'%')
            ->select('hotels.id AS id', 'Hotel_Name','Place_Name','Country_Name','Region_ID',"room_types.id AS RoomTypes","Hotel_IMG","Facility_ID AS Facilities")
            ->get();

            foreach ($combined_table as $combined_table_item) {
                $combined_table_item->RoomTypes = \App\Models\RoomType::where('Hotel_ID',$combined_table_item->id)->get()->toArray();

                $combined_table_item->Facilities = \App\Models\Facility::findMany(json_decode($combined_table_item->Facilities))->toArray();
            }

            return $combined_table;
        }
    }
}
