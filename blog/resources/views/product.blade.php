@extends('layouts.master')

@section('content')
<script type="text/javascript">

</script>

<div class="container">

  <!-- Portfolio Item Heading -->
  <h1 class="my-4">{{$travel->country->name}}</h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8">
      <img class="img-fluid" src="{{ asset('image/France.jpg') }}">
    </div>

    <div class="col-md-4">
      <h3 class="my-3">Travel Package Description</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
      <h3 class="my-3">Price: <b>RM{{$travel->price}}</b></h3>
    </div>

  </div>
  <!-- /.row -->

  <!-- Related Projects Row -->
  <h3 class="my-4">You May also like</h3>

  <div class="row">
    @if(auth()->check())
    @if(!empty( $favorites ))
    @foreach($favorites as $favorite)
    <div class="col-4 text-center" style="margin-bottom: 30px;">
      <div class="card">
        <img class="card-img-top" src="{{ asset('image/France.jpg') }}" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">3 Days 2 Night {{$favorite->country->name}}</h4>
          <p class="card-text">Enjoy a wonderful trip in one of the Malaysia's landmark.</p>
          <h2>RM{{$favorite->price}}</h2>
          <a href="/travel/{{$travel->id}}" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>
    @endforeach 
    @endif
    @else
    @php
    $newTravels = \App\Models\travel::get()->take(3);
    $items[] = asset('image/Langkawi.jpeg');
    $items[] = asset('image/Singapore.jpeg');
    $items[] = asset('image/New York.jpeg');
    @endphp
    @foreach($newTravels as $key => $newTravel)

        <div class="col-4 mb-5">
            <div class="travel_block shadow">
                <img src="{{ $items[$key] }}">   
                <div class="travel_block_cover">
                    <a class="travel_block_button" href="#">Explore</a>
                </div>
                <div class="col-12 travel_block_product">
                    <div class="row py-3">
                        <div class="col-8 travel_block_product_title">
                            <div class="title_name">Langkawi Island</div>
                            <div class="title_country">Malaysia</div>
                        </div>
                        <div class="col-4 travel_block_product_price">
                            <span>RM 558</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 travel_block_product_description">
                            <div class="description_title">Description</div>
                            <div class="description_text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

    @endforeach 
    @endif
  </div>
</div>
@endsection