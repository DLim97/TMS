@extends('layouts.master')

@section('title','Hotel Product')

@section('css')

<style type="text/css">

.hotel_details_block{
  min-height: 620px;
}

.hotel_module{
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

</style>

@endsection

@section('content')

<div class="container hotel_page_block">


  <div class="hotel_module my-2">{{$hotel->place->country->regions->Region_Name . ' / ' . $hotel->place->country->Country_Name . ' / ' . $hotel->place->Place_Name}}</div>


  <div class="row hotel_details_block">
    <div id="product" class="col-md-7 carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#product" data-slide-to="0"><img src="{{$hotel->Hotel_IMG}}"></li>
        @foreach($hotel->rooms as $key => $room)
        <li data-target="#product" data-slide-to="{{ $key + 1}}"><img src="{{$room->RoomType_IMG}}"></li>
        @endforeach
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{$hotel->Hotel_IMG}}"" alt="{{ $hotel->Hotel_Name }}" width="1100" height="500">
          <div class="carousel-caption">
            <h3>{{$hotel->Hotel_Name}}</h3>
          </div>   
        </div>
        @foreach($hotel->rooms as $key => $room)
        <div class="carousel-item">
          <img src="{{$room->RoomType_IMG}}"" alt="{{$room->RoomType_Name . ' Room'}}" width="1100" height="500">
          <div class="carousel-caption">
            <h3>{{$room->RoomType_Name . ' Room'}}</h3>
          </div>
        </div>
        @endforeach   
      </div>
      <a class="carousel-control-prev" href="#product" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#product" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>


    <div class="col-md-5">
      <h3 class="my-3">{{$hotel->Hotel_Name}}</h3>
      <div class="my-3">
        <h3>Available Room</h3>
        <select class="form-control room_options" data-bind="options: rooms,
        optionsText: 'name',
        value: selectedRoom"></select>
        <div class="room_description">
          <div class="my-3 room_description_text">
            <h3>Description</h3>
            <div data-bind="text: selectedRoom().description"></div>
            <div class="person_allowed"><i class="fas fa-user"></i> <span data-bind="text: selectedRoom().pax"></span> People</div>
            <div class="bed_size"><i class="fas fa-bed"></i> <span data-bind="text: selectedRoom().nbeds"></span> <span data-bind="text: selectedRoom().bed_size"></span> Size Bed</div>
            <div></div>
          </div>
          <h3 class="my-3">Price: <b class="price_block">RM<span data-bind="text: selectedRoom().price"></span></b></h3>
          <div class="btn btn-lg btn_purchase">Customize</div>
        </div>
      </div>
    </div>

  </div>

  <h3 class="my-4">Available Packages</h3>

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

@section('scripts')
<script type="text/javascript">

  var hotel = {!! json_encode($hotel) !!};

  function HotelRoomBlock(id,name,price,pax,description,bed_size,nbeds){
    var self = this;
    self.id = id;
    self.name = name;
    self.price = price;
    self.pax = pax;
    self.description = description;
    self.bed_size = bed_size;
    self.nbeds = nbeds;
  }

  function AppViewModel() {
    var self = this;
    self.rooms = ko.observableArray([]);
   

    $(hotel.rooms).each(function(index){

      switch(this.Bed_Size){
        case "1": this.Bed_Size = "King";break;
        case "2": this.Bed_Size = "Queen";break;
        case "3": this.Bed_Size = "Super Single";break;
        case "4": this.Bed_Size = "Single";break;
      }

      self.rooms.push(new HotelRoomBlock(this.id, this.RoomType_Name, this.Price, this.pax, this.Description, this.Bed_Size, this.NBeds))
    });


    self.selectedRoom = ko.observable(self.rooms()[0]);

  }

  ko.applyBindings(new AppViewModel());


</script>
@endsection
