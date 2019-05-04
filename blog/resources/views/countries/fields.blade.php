<!-- Country Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Country_Name', 'Country Name:') !!}
    {!! Form::text('Country_Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Country_IMG', 'Country Img:') !!}
    {!! Form::file('Country_IMG', ['class' => 'form-control']) !!}
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Region_ID', 'Region Id:') !!}
    @php
    $regions = \App\Models\Region::select('id','Region_Name')->get();
    foreach($regions as $region)
        $array[$region->id] = $region->Region_Name; 
    @endphp

    {!! Form::select('Region_ID', $array, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('countries.index') !!}" class="btn btn-default">Cancel</a>
</div>
