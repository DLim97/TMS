<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $itinerary->id !!}</p>
</div>

<!-- Order Id Field -->
<div class="form-group">
    {!! Form::label('Order_ID', 'Order Id:') !!}
    <p>{!! $itinerary->Order_ID !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('Description', 'Description:') !!}
    <p>{!! $itinerary->Description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $itinerary->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $itinerary->updated_at !!}</p>
</div>

