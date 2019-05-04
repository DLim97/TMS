<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $region->id !!}</p>
</div>

<!-- Region Name Field -->
<div class="form-group">
    {!! Form::label('Region_Name', 'Region Name:') !!}
    <p>{!! $region->Region_Name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $region->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $region->updated_at !!}</p>
</div>

