<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $place->id !!}</p>
</div>

<!-- Place Name Field -->
<div class="form-group">
    {!! Form::label('Place_Name', 'Place Name:') !!}
    <p>{!! $place->Place_Name !!}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('Country_ID', 'Country:') !!}
    <p>{!! $place->country->Country_Name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('Description', 'Description:') !!}
    <p>{!! $place->Description !!}</p>
</div>

<!-- Place Image Field -->
<div class="form-group">
    {!! Form::label('Image', 'Image:') !!}
    <p>{!! $place->Place_IMG !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $place->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $place->updated_at !!}</p>
</div>

