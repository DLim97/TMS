<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $order->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('User_ID', 'User Id:') !!}
    <p>{!! $order->User_ID !!}</p>
</div>

<!-- Travel Id Field -->
<div class="form-group">
    {!! Form::label('Travel_ID', 'Travel Id:') !!}
    <p>{!! $order->Travel_ID !!}</p>
</div>

<!-- Roomtype Id Field -->
<div class="form-group">
    {!! Form::label('RoomType_ID', 'Roomtype Id:') !!}
    <p>{!! $order->RoomType_ID !!}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('Start_date', 'Start Date:') !!}
    <p>{!! $order->Start_date !!}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('End_date', 'End Date:') !!}
    <p>{!! $order->End_date !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('Price', 'Price:') !!}
    <p>{!! $order->Price !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $order->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $order->updated_at !!}</p>
</div>

