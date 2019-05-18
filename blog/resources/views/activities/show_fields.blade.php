<!-- Activity Name Field -->
<div class="form-group">
    {!! Form::label('Activity_Name', 'Activity Name:') !!}
    <p>{!! $activity->Activity_Name !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('Price', 'Price:') !!}
    <p>{!! $activity->Price !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('Description', 'Description:') !!}
    <p>{!! $activity->Description !!}</p>
</div>

<!-- Place Id Field -->
<div class="form-group">
    {!! Form::label('Place_ID', 'Place:') !!}
    <p>{!! $activity->place->Place_Name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $activity->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $activity->updated_at !!}</p>
</div>

