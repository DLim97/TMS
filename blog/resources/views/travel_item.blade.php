@extends('layouts.master')

@section('title','Travel Product')

@section('css')

<style type="text/css">


.product_details_block{
  min-height: 620px;
}

.travel_module{
  font-size: 14px;
  color: #969699;
  text-align: justify;
  font-style: italic;
}

.date_block{
  background-color: #87c0cd;
  display: inline-block;
  padding: 10px 15px;
  border-radius: 5px;
  font-weight: 600;
  color: #f7fff7;
}

.price_block{
    color: #87c0cd;
}

.place_description{
  text-align: justify;
}

.hotel_details i{
  width: 20px;
  text-align: center;
}

.btn_purchase{
  background-color: #87c0cd;
  color: #f7fff7;
  font-weight: 600;
}

.btn_purchase:hover{
  background-color: #fff;
  border: 1px solid #87c0cd;
  color: #87c0cd;
  font-weight: 600;
  cursor: pointer;
}

.btn_purchase:active{
  background-color: #87c0cd;
  color: #f7fff7;
}

.carousel-inner{
  border-radius: 5px;
}

.carousel-indicators{
  list-style: none;
  top: 520px;
}
.carousel-indicators li, .carousel-indicators li.active{
  width: 33.3333%;
  height: 70px;
  background-color: #fff;
  position: relative;
  margin: 10px;
}
.carousel-indicators img{
  position: absolute;
  width: 100%;
  border-radius: 5px;
  height: 100%;
  top: 0;
  left: 0;            
}

.activity_card .card{
  height: 100%;
}

.activity_card .card-title{
  display: inline-block;
  border-bottom: 1px solid #87c0cd;
  font-weight: 600;
  font-size: 24px;
}

.activity_card .card-text{
  font-size: 18px;
}


</style>

@endsection

@section('content')

<div class="container">


  <div class="travel_module my-2">{{$travel->roomType->hotel->place->country->regions->Region_Name . ' / ' . $travel->roomType->hotel->place->country->Country_Name . ' / ' . $travel->roomType->hotel->place->Place_Name}}</div>


  <div class="row product_details_block">

    <div id="product" class="col-md-7 carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#product" data-slide-to="0" class="active"><img src="{{$travel->roomType->hotel->place->Place_IMG}}"></li>
        <li data-target="#product" data-slide-to="1"><img src="{{$travel->roomType->hotel->Hotel_IMG}}"></li>
        <li data-target="#product" data-slide-to="2"><img src="{{$travel->roomType->RoomType_IMG}}"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{$travel->roomType->hotel->place->Place_IMG}}" alt="Los Angeles" width="1100" height="500">
          <div class="carousel-caption">
            <h3>{{$travel->roomType->hotel->place->Place_Name}}</h3>
          </div>   
        </div>
        <div class="carousel-item">
          <img src="{{$travel->roomType->hotel->Hotel_IMG}}"" alt="Chicago" width="1100" height="500">
          <div class="carousel-caption">
            <h3>{{$travel->roomType->hotel->Hotel_Name}}</h3>
          </div>   
        </div>
        <div class="carousel-item">
          <img src="{{$travel->roomType->RoomType_IMG}}"" alt="New York" width="1100" height="500">
          <div class="carousel-caption">
            <h3>{{$travel->roomType->RoomType_Name . ' Room'}}</h3>
          </div>   
        </div>
      </div>
      <a class="carousel-control-prev" href="#product" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#product" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>



<!--     <div class="col-md-7">
      <img class="img-fluid" src="{{ asset('image/France.jpg') }}">
    </div> -->


    <div class="col-md-5">
      <h3 class="my-3">{{$travel->Travel_Name}}</h3>
      <div class="my-2">
        <span class="date_block">{{$travel->Start_date->format('D d M Y')}}</span> <i class="fas fa-arrow-right"></i> <span class="date_block">{{$travel->End_date->format('D d M Y')}}</span>
      </div>
      <div class="my-3">
        <h3>Description</h3>
        <div class="place_description">{{$travel->roomType->hotel->place->Description}}</div>
      </div>
      <div class="my-3 hotel_details">
        <h3>Accomodation</h3>
        <div class="hotel_name"><i class="fas fa-hotel"></i> {{$travel->roomType->hotel->Hotel_Name}}</div>
        <div class="room_type"><i class="fas fa-bed"></i> {{$travel->roomType->RoomType_Name}}</div>
        <div class="person_allowed"><i class="fas fa-user"></i> {{$travel->pax}} People</div>
        <div class="facilies_available">
          <div><i class="fas fa-plus-square"></i> Facility Available</div>
          <ol>
            @foreach($travel->facilities as $facility)
            <li>{{ $facility->Facility_Name }}</li>
            @endforeach
          </ol>
        </div>
      </div>
      <h3 class="my-3">Price: <b class="price_block">RM{{$travel->Price}}</b></h3>
      <a href="/purchase/1/{{ $travel->id }}"><div class="btn btn-lg btn_purchase">Purchase</div></a>
    </div>

  </div>

  <div class="row my-4">
    <div class="col-12">
      <h1>Actvities Available in this area</h1>
    </div>
    

      @foreach($travel->roomType->hotel->place->activities as $activity)
      <div class="col-4 activity_card mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $activity->Activity_Name }}</h5>
            <p class="card-text lead" style="text-align: justify;">{{ $activity->Description}}</p>
            <div href="#" class="btn btn-primary">RM {{ $activity->Price }}</div>
          </div>
        </div>
      </div>
      @endforeach

      @if(sizeof($travel->roomType->hotel->place->activities) == 0)
        <div class="col-12">{{'No activities here'}}</div>
      @endif
    
  </div>

  <h3 class="my-4">You May also like</h3>

  <div class="row">

    @foreach($sorted_travel_suggestions as $sorted_travel_suggestion)
    <div class="col-4 mb-5">
      <div class="travel_block shadow">
        <img src="{{ asset( $sorted_travel_suggestion->roomType->hotel->place->Place_IMG ) }}">   
        <div class="travel_block_cover">
          <a class="travel_block_button" href="{{ '/travel_item/' . $sorted_travel_suggestion->id }}">Explore</a>
        </div>
        <div class="col-12 travel_block_product">
          <div class="row py-3">
            <div class="col-8 travel_block_product_title">
              <div class="title_name">{{ $sorted_travel_suggestion->Travel_Name }}</div>
              <div class="title_country">{{ $sorted_travel_suggestion->roomType->hotel->place->country->Country_Name}}</div>
            </div>
            <div class="col-4">
              <div class="travel_block_product_price">
                <span>{{ 'RM' . $sorted_travel_suggestion->Price}}</span>
              </div>
            </div>
            <div class="col-12 my-2">
              <div class="travel_block_dates">
                <span>{{$sorted_travel_suggestion->Start_date->format('D d M y')}}</span> <i class="fas fa-arrow-right"></i> <span>{{$sorted_travel_suggestion->End_date->format('D d M y')}}</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 travel_block_product_description">
              <div class="description_title">Description</div>
              <div class="description_text">
                {{ $sorted_travel_suggestion->roomType->hotel->place->Description }}
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>

</div>


@endsection