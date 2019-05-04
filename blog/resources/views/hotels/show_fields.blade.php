<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $hotel->id !!}</p>
</div>

<!-- Hotel Name Field -->
<div class="form-group">
    {!! Form::label('Hotel_Name', 'Hotel Name:') !!}
    <p>{!! $hotel->Hotel_Name !!}</p>
</div>

<!-- Hotel Img Field -->
<div class="form-group">
    {!! Form::label('Hotel_IMG', 'Hotel Img:') !!}
    <p>{!! $hotel->Hotel_IMG !!}</p>
</div>

<!-- Place Id Field -->
<div class="form-group">
    {!! Form::label('Place_ID', 'Place Id:') !!}
    <p>{!! $hotel->Place_ID !!}</p>
</div>

<!-- Facility Id Field -->
<div class="form-group">
    {!! Form::label('Facility_ID', 'Facility Id:') !!}
    <p>{!! $hotel->Facility_ID !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $hotel->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $hotel->updated_at !!}</p>
</div>

