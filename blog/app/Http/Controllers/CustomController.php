<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Classification\KNearestNeighbors;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Flash;


class CustomController extends Controller
{
    //
	public function index(){

		$countries = \App\Models\country::get()->take(3);
		$travels = \App\Models\travel::get();
		return view('homepage', compact('countries','travels'));

	}

    public function travel(){

        $travels = \App\Models\travel::get();
        foreach ($travels as $travel) {
            $travel_block["id"] = $travel->id;
            $travel_block["Travel_Name"] = $travel->Travel_Name;
            $travel_block["Start_date"] = $travel->Start_date;
            $travel_block["End_date"] = $travel->End_date;
            $travel_block["Price"] = $travel->Price;
            $travel_block["Country"] = $travel->roomType->hotel->place->country->Country_Name;
            $travel_block["Region"] = $travel->roomType->hotel->place->country->regions->id;
            $travel_block["Description"] = $travel->roomType->hotel->place->Description;
            $travel_block["Image"] = $travel->roomType->hotel->place->Place_IMG;
            

            switch ($travel->roomType->Bed_Size) {
                case "1": $pax = 2;break;
                case "2": $pax = 2;break;
                case "3": $pax = 1;break;
                case "4": $pax = 1;break;
            }

            $travel->pax = $travel->roomType->NBeds * $pax;
            $travel_block["pax"] = $travel->pax;
            $travel_array[] = $travel_block;

        }

        $region_array = \App\Models\region::get();

        return view('travel', compact('travels','travel_array', 'region_array'));

    }

    public function hotel(){

        $hotels = \App\Models\hotel::get();

        foreach ($hotels as $hotel) {
            $hotel_block["id"] = $hotel->id;
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

    public function requestPurchase($type, $data){

        if($type == 1){
            $user = \App\User::find(Auth::user()->id);

            $order = \App\Models\Travel::find($data);

            $type = 1;

            if(!$order){
                abort(500);
            }

            return view('purchase', compact('user', 'order','type'));
        }
        else if($type == 2){

            $user = \App\User::find(Auth::user()->id);

            $order = \App\Models\RoomType::find($data);

            $type = 2;

            return view('purchase', compact('user', 'order','type'));

        }
        else{
            abort(404);
        }

    }

    public function processPurchase(Request $request, $type, $order_id){
        
        if($type == 1){

            $order_details = \App\Models\Travel::findOrFail($order_id);

            $order = new \App\Models\Order;
            $order->User_ID = Auth::user()->id;
            $order->Travel_ID = $order_details->id;
            $order->RoomType_ID = $order_details->roomType->id;
            $order->Start_date = $order_details->Start_date;
            $order->End_date = $order_details->End_date;
            $order->Price = $order_details->Price;
            $order->save();

        }
        else if($type == 2){

            $order_details = \App\Models\RoomType::findOrFail($order_id);

            $order = new \App\Models\Order;
            $order->User_ID = Auth::user()->id;
            $order->RoomType_ID = $order_details->id;
            $order->Start_date = $request->start_date;
            $order->End_date = $request->end_date;
            $nDays = $order->Start_date->diffInDays($order->End_date);
            $order->Price = $order_details->Price * $nDays;
            $order->save();


        }
        else{
            abort(500);
        }

        return redirect('/');
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
            ->select('travels.id AS id', 'Travel_Name','Start_date','End_date','travels.Price',"Country_Name","regions.id AS Region_ID","places.Description AS Description", "Place_IMG", "travels.RoomType_ID AS RoomType_ID", 'Country_ID', 'Place_ID')
            ->get();

            foreach ($combined_table as $combined_table_item) {
                $combined_table_item->Start_date = \App\Models\Travel::select('Start_date')->where('id',$combined_table_item->id)->get()->first();
                $combined_table_item->End_date = \App\Models\Travel::select('End_date')->where('id',$combined_table_item->id)->get()->first();
                $combined_table_item->RoomTypes = \App\Models\RoomType::find($combined_table_item->RoomType_ID);


                switch ($combined_table_item->RoomTypes->Bed_Size) {
                    case "1": $pax = 2;break;
                    case "2": $pax = 2;break;
                    case "3": $pax = 1;break;
                    case "4": $pax = 1;break;
                }

                $combined_table_item->pax = $combined_table_item->RoomTypes->NBeds * $pax;
            }

            $results = [];


            if(Auth::check()){

                $userCheck = \App\Models\History::where('id', Auth::user()->id)->exists();

                foreach ($combined_table as $combined_table_item) {
                    $travel = \App\Models\Travel::find($combined_table_item->id);

                    if(!$userCheck){
                        $travel_data['id'] = $travel->id;
                        $travel_data['count'] = 1;
                        $travel_array[] = $travel_data;
                        $travel_type['travels'] = $travel_array;
                        $history = new \App\Models\history;
                        $history->User_ID = Auth::User()->id;
                        $history->search = $travel_type;
                        $history->save();
                        $currentUser = $history;
                    }
                    else
                    {
                        $user_history = \App\Models\History::find(Auth::user()->id);
                        $history = ($user_history->search) ? $user_history->search : [];
                        $recent = false;

                        if(!array_key_exists("travels", $history)){

                            $travel_data['id'] = $travel->id;
                            $travel_data['count'] = 1;
                            $travel_array[] = $travel_data;
                            $history['travels'] = $travel_array;
                            $user_history->search = $history;
                            $user_history->save();
                        }
                        else{
                            foreach ($history['travels'] as $key => $history_data) {
                                if($history_data['id'] == $travel->id){
                                    $recent = true;
                                    $history['travels'][$key]['count'] = $history_data['count'] + 1;
                                }

                            }
                            if(!$recent){
                                $travel_data['id'] = $travel->id;
                                $travel_data['count'] = 1;
                                array_push($history['travels'], $travel_data);
                            }

                            $user_history->search = $history;
                            $user_history->save();
                            $currentUser = $user_history;

                        }
                    }
                }


                $results = $this->personalize(1,$travel,$currentUser->search);

            }



            return [$combined_table,$results];
        }
    }

    public function search_hotel(Request $request, $keywords){

        if($request->ajax()){

            $combined_table = DB::table('hotels')
            ->join('places', 'hotels.Place_ID', '=', 'places.id')
            ->join('countries', 'places.Country_ID', '=', 'countries.id')
            ->join('regions', 'countries.Region_ID', '=', 'regions.id')
            ->orWhere('Hotel_Name', 'LIKE', '%'.$keywords.'%')
            ->orWhere('Place_Name', 'LIKE', '%'.$keywords.'%')
            ->orWhere('Country_Name', 'LIKE', '%'.$keywords.'%')
            ->orWhere('Region_Name', 'LIKE', '%'.$keywords.'%')
            ->select('hotels.id AS id', 'Hotel_Name','Place_Name','Country_Name','Region_ID',"Hotel_IMG","Facility_ID AS Facilities")
            ->get();

            foreach ($combined_table as $combined_table_item) {
                $combined_table_item->RoomTypes = \App\Models\RoomType::where('Hotel_ID',$combined_table_item->id)->get()->toArray();

                $combined_table_item->Facilities = \App\Models\Facility::findMany(json_decode($combined_table_item->Facilities))->toArray();
            }


            $results = [];


            if(Auth::check()){

                $userCheck = \App\Models\History::where('id', Auth::user()->id)->exists();

                foreach ($combined_table as $combined_table_item) {
                    $hotel = \App\Models\Hotel::find($combined_table_item->id);



                    if(!$userCheck){
                        $travel_data['id'] = $hotel->id;
                        $travel_data['count'] = 1;
                        $travel_array[] = $travel_data;
                        $travel_type['hotels'] = $travel_array;
                        $history = new \App\Models\history;
                        $history->User_ID = Auth::User()->id;
                        $history->search = $travel_type;
                        $history->save();
                        $currentUser = $history;
                    }
                    else
                    {
                        $user_history = \App\Models\History::find(Auth::user()->id);
                        $history = ($user_history->search) ? $user_history->search : [];
                        $recent = false;

                        if(!array_key_exists("hotels", $history)){
                            $travel_data['id'] = $hotel->id;
                            $travel_data['count'] = 1;
                            $travel_array[] = $travel_data;
                            $history['hotels'] = $travel_array;
                            $user_history->search = $history;
                            $user_history->save();
                        }
                        else{
                            foreach ($history['hotels'] as $key => $history_data) {
                                if($history_data['id'] == $hotel->id){
                                    $recent = true;
                                    $history['hotels'][$key]['count'] = $history_data['count'] + 1;
                                }

                            }
                            if(!$recent){
                                $travel_data['id'] = $hotel->id;
                                $travel_data['count'] = 1;
                                array_push($history['hotels'], $travel_data);
                            }

                            $user_history->search = $history;
                            $user_history->save();
                            $currentUser = $user_history;

                        }
                    }
                }


                $results = $this->personalize(2,$hotel,$currentUser->search);

            }




            return [$combined_table, $results];
        }

    }

    public function travel_page($id){

        $travel = \App\Models\Travel::findOrFail($id);


        switch ($travel->roomType->Bed_Size) {
            case "1": $pax = 2;break;
            case "2": $pax = 2;break;
            case "3": $pax = 1;break;
            case "4": $pax = 1;break;
        }

        $travel->pax = $travel->roomType->NBeds * $pax;

        $travel->facilities = \App\Models\Facility::findMany($travel->roomType->hotel->Facility_ID);

        $results = [];



        if(Auth::check()){

            $userCheck = \App\Models\History::where('id', Auth::user()->id)->exists();

            if(!$userCheck){
                $travel_data['id'] = $travel->id;
                $travel_data['count'] = 1;
                $travel_array[] = $travel_data;
                $travel_type['travels'] = $travel_array;
                $history = new \App\Models\history;
                $history->User_ID = Auth::User()->id;
                $history->visited = $travel_type;
                $history->save();
                $currentUser = $history;
            }
            else{
                $user_history = \App\Models\History::find(Auth::user()->id);
                $history = $user_history->visited;
                $recent = false;

                if(!array_key_exists("travels", $history)){

                    $travel_data['id'] = $travel->id;
                    $travel_data['count'] = 1;
                    $travel_array[] = $travel_data;
                    $history['travels'] = $travel_array;
                    $user_history->visited = $history;
                    $user_history->save();
                }
                else{
                    foreach ($history['travels'] as $key => $history_data) {
                        if($history_data['id'] == $travel->id){
                            $recent = true;
                            $history['travels'][$key]['count'] = $history_data['count'] + 1;
                        }
                    }
                    if(!$recent){
                        $travel_data['id'] = $travel->id;
                        $travel_data['count'] = 1;
                        array_push($history['travels'], $travel_data);
                    }

                    $user_history->visited = $history;
                    $user_history->save();
                    $currentUser = $user_history;

                }
            }

            $results = $this->personalize(1,$travel,$currentUser->visited);

        }

        if(sizeof($results) == 0){
            $sorted_travel_suggestions = \App\Models\Travel::take(3)->get();
        }
        else{
            $nop = $results[0];
            $budget = $results[1];
            $location = $results[2];


            $travel_suggestions = \App\Models\Travel::get();

            $filtered_travel_suggestions = $travel_suggestions->filter(function($travel_suggestion,$key) use ($nop,$budget,$location,$pax){

                switch ($travel_suggestion->roomType->Bed_Size) {
                    case "1": $pax = 2;break;
                    case "2": $pax = 2;break;
                    case "3": $pax = 1;break;
                    case "4": $pax = 1;break;
                }
                $travel_suggestion->pax =  $travel_suggestion->roomType->NBeds * $pax;

                return $travel_suggestion->Price <= $budget || $travel_suggestion->pax == $nop || $travel_suggestion->roomType->hotel->place->country->id == $location->country->id || $travel_suggestion->roomType->hotel->place->country->regions->id == $location->country->regions->id;
            });



            $processed_travel_suggestions = $this->sortTravel(1, $nop, $budget, $location, $filtered_travel_suggestions);

            $sorted_travel_suggestions = $processed_travel_suggestions->take(3);

        }


        return view('travel_item',compact('travel', 'sorted_travel_suggestions'));

    }

    public function hotel_page($id){

        $hotel = \App\Models\Hotel::findOrFail($id);

        $hotel->facilities = \App\Models\Facility::findMany($hotel->Facility_ID);

        $hotel->rooms = \App\Models\RoomType::where('Hotel_ID', $hotel->id)->get();

        foreach ($hotel->rooms as $room) {
            switch ($room->Bed_Size) {
                case "1": $pax = 2;break;
                case "2": $pax = 2;break;
                case "3": $pax = 1;break;
                case "4": $pax = 1;break;
            }
            $room->pax = $room->NBeds * $pax;
        }

        $results = [];

        if(Auth::check()){

            $userCheck = \App\Models\History::where('id', Auth::user()->id)->exists();

            if(!$userCheck){
                $hotel_data['id'] = $hotel->id;
                $hotel_data['count'] = 1;
                $hotel_array[] = $hotel_data;
                $travel_type['hotels'] = $hotel_array;
                $history = new \App\Models\history;
                $history->User_ID = Auth::User()->id;
                $history->visited = $travel_type;
                $history->save();
                $currentUser = $history;
            }
            else{
                $user_history = \App\Models\History::find(Auth::user()->id);
                $history = $user_history->visited;
                $recent = false;



                if(!array_key_exists("hotels", $history)){

                    $hotel_data['id'] = $hotel->id;
                    $hotel_data['count'] = 1;
                    $hotel_array[] = $hotel_data;
                    $history['hotels'] = $hotel_array;
                    $user_history->visited = $history;
                    $user_history->save();
                }
                else{
                    foreach ($history['hotels'] as $key => $history_data) {
                        if($history_data['id'] == $hotel->id){
                            $recent = true;
                            $history['hotels'][$key]['count'] = $history_data['count'] + 1;
                        }

                    }
                    if(!$recent){
                        $travel_data['id'] = $hotel->id;
                        $travel_data['count'] = 1;
                        array_push($history['hotels'], $travel_data);
                    }

                    $user_history->visited = $history;
                    $user_history->save();
                    $currentUser = $user_history;

                }

            }

            $results = $this->personalize(2,$hotel,$currentUser->search);

        }

        if(sizeof($results) == 0){
            $sorted_travel_suggestions = \App\Models\Travel::take(3)->get();
        }
        else{
            $nop = $results[0];
            $budget = $results[1];
            $location = $results[2];


            $travel_suggestions = \App\Models\Travel::get();

            $filtered_travel_suggestions = $travel_suggestions->filter(function($travel_suggestion,$key) use ($nop,$budget,$location,$pax){

                switch ($travel_suggestion->roomType->Bed_Size) {
                    case "1": $pax = 2;break;
                    case "2": $pax = 2;break;
                    case "3": $pax = 1;break;
                    case "4": $pax = 1;break;
                }
                $travel_suggestion->pax =  $travel_suggestion->roomType->NBeds * $pax;

                return $travel_suggestion->Price <= $budget || $travel_suggestion->pax == $nop || $travel_suggestion->roomType->hotel->place->country->id == $location->country->id || $travel_suggestion->roomType->hotel->place->country->regions->id == $location->country->regions->id;
            });



            $processed_travel_suggestions = $this->sortTravel(2, $nop, $budget, $location, $filtered_travel_suggestions);

            $sorted_travel_suggestions = $processed_travel_suggestions->take(3);

        }

        return view('hotel_item',compact('hotel','sorted_travel_suggestions'));

    }

    private function personalize($page, $current, $data){

        $nop = [];
        $nop_labels = [];
        $budget = [];
        $budget_labels = [];
        $location = [];
        $location_labels = [];

        if($page == 1){
            $histories = $data['travels'];

            foreach ($histories as $history) {
                for($i = 0; $i < $history['count']; $i++){

                    if(\App\Models\Travel::where('id', '=', $history['id'])->exists()){
                        $travel_item = \App\Models\Travel::findOrFail($history['id']);
                    }
                    else{
                        continue;
                    }


                    $travel_room = \App\Models\RoomType::findOrFail($travel_item->RoomType_ID);

                    array_push($nop, [$travel_item->RoomType_ID]);

                    switch ($travel_room->Bed_Size) {
                        case "1": $pax = 2;break;
                        case "2": $pax = 2;break;
                        case "3": $pax = 1;break;
                        case "4": $pax = 1;break;
                    }
                    $travel_room->pax = $travel_room->NBeds * $pax;

                    array_push($nop_labels, $travel_room->pax);
                }
            }

            $nop_class = new KNearestNeighbors($k=30);
            $nop_class->train($nop, $nop_labels);
            $nop_results = $nop_class->predict([$current->roomType->id]);




            foreach ($histories as $history) {
                for($i = 0; $i < $history['count']; $i++){

                    $travel_item = \App\Models\Travel::findOrFail($history['id']);

                    array_push($budget, [$travel_item->Price]);

                    array_push($budget_labels, $travel_item->Price);

                }
            }

            $budget_class = new KNearestNeighbors($k=30);
            $budget_class->train($budget, $budget_labels);
            $budget_results = $budget_class->predict([$current->Price]);

            foreach ($histories as $history) {
                for($i = 0; $i < $history['count']; $i++){

                    $travel_item = \App\Models\Travel::findOrFail($history['id']);

                    array_push($location, [$travel_item->roomType->hotel->place->id]);

                    array_push($location_labels, $travel_item->roomType->hotel->place->id);
                }
            }

            $location_class = new KNearestNeighbors($k=30);
            $location_class->train($location, $location_labels);
            $location_results = $location_class->predict([$current->roomType->hotel->place->id]);
            $location_results = \App\Models\Place::findOrFail($location_results);



            return [$nop_results, $budget_results, $location_results];
        }
        else if($page == 2){
            $histories = $data['hotels'];

            foreach ($histories as $history) {
                for($i = 0; $i < $history['count']; $i++){

                    if(\App\Models\Travel::where('id', '=', $history['id'])->exists()){
                        $travel_item = \App\Models\Hotel::findOrFail($history['id']);
                    }
                    else{
                        continue;
                    }

                    $travel_room = \App\Models\RoomType::where('Hotel_ID',$travel_item->id)->get();

                    foreach ($travel_room as $travel_room_data) {
                        array_push($nop, [$travel_item->id]);

                        switch ($travel_room_data->Bed_Size) {
                            case "1": $pax = 2;break;
                            case "2": $pax = 2;break;
                            case "3": $pax = 1;break;
                            case "4": $pax = 1;break;
                        }
                        $travel_room_data->pax = $travel_room_data->NBeds * $pax;

                        array_push($nop_labels, $travel_room_data->pax);
                    }
                }
            }

            $nop_class = new KNearestNeighbors($k=30);
            $nop_class->train($nop, $nop_labels);
            $nop_results = $nop_class->predict([$current->id]);


            foreach ($histories as $history) {
                for($i = 0; $i < $history['count']; $i++){

                    $travel_item = \App\Models\Hotel::findOrFail($history['id']);

                    $travel_room = \App\Models\RoomType::where('Hotel_ID',$travel_item->id)->get();

                    foreach ($travel_room as $travel_room_data) {
                        array_push($budget, [$travel_item->id]);

                        array_push($budget_labels, $travel_room_data->Price);
                    }
                }
            }

            $budget_class = new KNearestNeighbors($k=30);
            $budget_class->train($budget, $budget_labels);
            $budget_results = $budget_class->predict([$current->id]);


            foreach ($histories as $history) {
                for($i = 0; $i < $history['count']; $i++){

                    $travel_item = \App\Models\Hotel::findOrFail($history['id']);

                    array_push($location, [$travel_item->place->id]);

                    array_push($location_labels, $travel_item->place->id);
                }
            }

            $location_class = new KNearestNeighbors($k=30);
            $location_class->train($location, $location_labels);
            $location_results = $location_class->predict([$current->place->id]);
            $location_results = \App\Models\Place::findOrFail($location_results);

            return [$nop_results, $budget_results, $location_results];
        }

    }

    private function sortTravel($type, $nop, $budget, $location, $suggestions){

        $unsorted = $suggestions;
        $sorted = collect();

        if($type == 1){
            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->pax == $nop && $suggestion->Price <= $budget && $suggestion->roomType->hotel->place->country->id == $location->country->id){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->pax == $nop && $suggestion->Price <= $budget){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }


            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->Price <= $budget && $suggestion->roomType->hotel->place->country->id == $location->country->id){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->pax == $nop  && $suggestion->roomType->hotel->place->country->id == $location->country->id){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->pax == $nop){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->Price <= $budget){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->roomType->hotel->place->country->id == $location->country->id){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->roomType->hotel->place->country->regions->id == $location->country->regions->id){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }
        }
        else{
            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->pax == $nop && $suggestion->Price <= $budget && $suggestion->roomType->hotel->place->id == $location->id){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->pax == $nop && $suggestion->Price <= $budget && $suggestion->roomType->hotel->place->country->id == $location->country->id){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->pax == $nop && $suggestion->Price <= $budget){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }


            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->Price <= $budget && $suggestion->roomType->hotel->place->country->id == $location->country->id){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->pax == $nop  && $suggestion->roomType->hotel->place->country->id == $location->country->id){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->pax == $nop){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->Price <= $budget){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->roomType->hotel->place->country->id == $location->country->id){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

            foreach ($suggestions as $key => $suggestion) {
                if($suggestion->roomType->hotel->place->country->regions->id == $location->country->regions->id){
                    $sorted->push($suggestion);
                    $suggestions->forget($key);
                }
            }

        }


        return $sorted;

    }

    public function clearHistory(){
        $userCheck = \App\Models\History::where('id', Auth::user()->id)->exists();

        $user_history = \App\Models\History::find(Auth::user()->id);

        if($userCheck){
           $user_history->search = null;
           $user_history->visited = null;
           $user_history->save();

        }

        return redirect()->back();
    }

    public function viewOrder(){


        if(Auth::check()){
            $userCheck = \App\Models\Order::where('User_ID', Auth::user()->id)->exists();

            if($userCheck){
                $order = \App\Models\Order::where('User_ID', Auth::user()->id)->get();
            }
            else{
                $order = collect();
            }
        }
        else{
            abort(403);
        }


       return view('order',compact('orders'));
   }
}
