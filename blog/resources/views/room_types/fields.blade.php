<!-- Roomtype Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('RoomType_Name', 'Roomtype Name:') !!}
    {!! Form::text('RoomType_Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Hotel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Hotel', 'Hotel:') !!}
    @php
    $hotels = \App\Models\Hotel::select('id','Hotel_Name')->get();
    foreach($hotels as $hotel)
        $array[$hotel->id] = $hotel->Hotel_Name; 
    @endphp
    {!! Form::select('Hotel_ID', $array, null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Price', 'Price per night:') !!}
    {!! Form::text('Price', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Description', 'Description:') !!}
    {!! Form::textarea('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Roomtype Img Field -->
<div class="form-group col-sm-12">
    {!! Form::label('RoomType_IMG', 'Roomtype Img:') !!}
    @if(isset($roomType))
    <img src="{{ $roomType->RoomType_IMG }}" width="100%">
    @endif
    {!! Form::File('RoomType_IMG', ['class' => 'form-control']) !!}
</div>

<!-- Nbeds Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NBeds', 'Number of Beds:') !!}
    {!! Form::Number('NBeds', 1, ['class' => 'form-control']) !!}
</div>

<!-- Bed Size Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Bed_Size', 'Bed Size:') !!}
    {!! Form::select('Bed_Size', [ '1'=> 'King', '2'=>'Queen', '3'=>'Super Single', '4'=>'Single'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roomTypes.index') !!}" class="btn btn-default">Cancel</a>
</div>
