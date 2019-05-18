<!-- Hotel Name Field -->
<div class="form-group">
    {!! Form::label('Hotel_Name', 'Hotel Name:') !!}
    <p>{!! $hotel->Hotel_Name !!}</p>
</div>

<!-- Hotel Img Field -->
<div class="form-group">
    {!! Form::label('Hotel_IMG', 'Hotel Img:') !!}
    <div><img src='{!! $hotel->Hotel_IMG !!}' width="50%"></div>
</div>

<!-- Place Id Field -->
<div class="form-group">
    {!! Form::label('Place_ID', 'Place:') !!}
    <p>{!! $hotel->place->Place_Name !!}</p>
</div>

<!-- Facility Id Field -->
<div class="form-group">
    {!! Form::label('Facility_ID', 'Facility:') !!}
    @php
    $facilities = \App\Models\Facility::findMany($hotel->Facility_ID);
    @endphp
    <div>
    @foreach($facilities as $facility)
    <button class="btn btn-info">{!! $facility->Facility_Name !!}</button>
    @endforeach
    </div>
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

