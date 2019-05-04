<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $country->id !!}</p>
</div>

<!-- Country Name Field -->
<div class="form-group">
    {!! Form::label('Country_Name', 'Country Name:') !!}
    <p>{!! $country->Country_Name !!}</p>
</div>

<!-- Country Img Field -->
<div class="form-group">
    {!! Form::label('Country_IMG', 'Country Img:') !!}
    <p>{!! $country->Country_IMG !!}</p>
</div>

<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('Region_ID', 'Region Id:') !!}
    <p>{!! $country->Region_ID !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $country->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $country->updated_at !!}</p>
</div>

