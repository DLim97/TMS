<!-- Travel Name Field -->
<div class="form-group">
    {!! Form::label('Travel_Name', 'Travel Name:') !!}
    <p>{!! $travel->Travel_Name !!}</p>
</div>

<!-- Roomtype Id Field -->
<div class="form-group">
    {!! Form::label('RoomType_ID', 'Type of Room:') !!}
    <p>{!! $travel->roomType->RoomType_Name !!}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('Start_date', 'Start Date:') !!}
    <p>{!! $travel->Start_date->format('D d M Y') !!}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('End_date', 'End Date:') !!}
    <p>{!! $travel->End_date->format('D d M Y') !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('Price', 'Price:') !!}
    <p>{!! $travel->Price !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $travel->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $travel->updated_at !!}</p>
</div>

