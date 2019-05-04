<!-- Activity Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Activity_Name', 'Activity Name:') !!}
    {!! Form::text('Activity_Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Price', 'Price:') !!}
    {!! Form::text('Price', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Description', 'Description:') !!}
    {!! Form::textarea('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Place Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Place_ID', 'Place Id:') !!}
    @php
    $places = \App\Models\Place::select('id','Place_Name')->get();
    foreach($places as $place)
        $array[$place->id] = $place->Place_Name; 
    @endphp
    {!! Form::select('Place_ID', $array, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('activities.index') !!}" class="btn btn-default">Cancel</a>
</div>
