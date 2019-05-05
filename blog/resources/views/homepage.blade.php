@extends('layouts.master')

@section('title','Homepage')

@section('css')

<style type="text/css">
.navbar{
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1030;
    background-size: 100% 200%;
    background-color: initial;
    background-image: linear-gradient(to bottom, transparent 50%, #41444A 50%);
    -webkit-transition: background-position 0.3s;
    -moz-transition: background-position 0.3s;
    transition: background-position 0.3s;
}

</style>

@endsection

@section('content')

<script type="text/javascript">
    $(document).ready(function(){
        $(document).scroll(function(){
            var top = $(document).scrollTop();
            if(top > 650){
                $(".navbar").css('background-position','0 -100%');
            }
            else{
                $(".navbar").css('background-position','initial');
            }
        });
    });
</script>

<div class="jumbotron jumbotron-fluid homepage_jumpborton">
    <div class="container">
    </div>
</div>

<div class="container tms_block">
    <div class="h1 text-center tms_block_title">
        <span>Where to travel</span>
    </div>
    <div class="row">

        @foreach($countries as $key => $country)
        <div class="col-4 text-center">
            <div class="country_card">
                <img src="{{$country->Country_IMG}}">
                <div class="country_overlay">
                    <a class="country_name" href="#">{{$country->Country_Name}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container tms_block">
    <div class="h1 text-center tms_block_title">
        <span>Travel Plans</span>
    </div>
    <div class="row">


        @foreach($travels as $travel)
        <div class="col-4 mb-5">
            <div class="travel_block shadow">
                <img src="{{ asset( $travel->roomType->hotel->place->Place_IMG ) }}">   
                <div class="travel_block_cover">
                    <a class="travel_block_button" href="{{ '/travel_item/' . $travel->id }}">Explore</a>
                </div>
                <div class="col-12 travel_block_product">
                    <div class="row py-3">
                        <div class="col-8 travel_block_product_title">
                            <div class="title_name">{{ $travel->Travel_Name }}</div>
                            <div class="title_country">{{ $travel->roomType->hotel->place->country->Country_Name}}</div>
                        </div>
                        <div class="col-4">
                            <div class="travel_block_product_price">
                                <span>{{ 'RM' . $travel->Price}}</span>
                            </div>
                        </div>
                        <div class="col-12 my-2">
                            <div class="travel_block_dates">
                                <span>{{$travel->Start_date->format('D d M y')}}</span> <i class="fas fa-arrow-right"></i> <span>{{$travel->End_date->format('D d M y')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 travel_block_product_description">
                            <div class="description_title">Description</div>
                            <div class="description_text">
                                {{ $travel->roomType->hotel->place->Description }}
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<div class="tms_block tms_custom_block text-center">
    <div class="row tms_custom_block_bg">
        <div class="tms_custom_block_cover">
            <div class="row h-100">
                <div class="col-12 my-auto">
                    <div class="tms_custom_block_title">
                        Create your own travel plan
                    </div>
                    <div class="tms_custom_block_description">
                        The travel plan doesn't suite you? No worries, be your own travel agent and build a fully customized travel packages that you'll like.
                    </div>
                    <div class="btn btn-primary tms_custom_block_button">Customize</div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
