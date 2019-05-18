<!-- Country Name Field -->
<div class="form-group">
    {!! Form::label('Country_Name', 'Country Name:') !!}
    <p>{!! $country->Country_Name !!}</p>
</div>

<!-- Country Img Field -->
<div class="form-group">
    {!! Form::label('Country_IMG', 'Country Img:') !!}
    <div><img src='{!! $country->Country_IMG !!}' width="50%"></div>
</div>

<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('Region_ID', 'Region:') !!}
    <p>{!! $country->regions->Region_Name !!}</p>
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

