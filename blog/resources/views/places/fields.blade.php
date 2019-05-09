<!-- Place Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Place_Name', 'Place Name:') !!}
    {!! Form::text('Place_Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Country_ID', 'Country Id:') !!}
    @php
    $countries = \App\Models\Country::select('id','Country_Name')->get();
    foreach($countries as $country)
        $array[$country->id] = $country->Country_Name; 
    @endphp
    {!! Form::select('Country_ID', $array, null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Description', 'Description:') !!}
    {!! Form::textarea('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Place Image Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Place_IMG', 'Place_IMG:') !!}
    @if(isset($place))
    <img src="{{ $place->Place_IMG }}" width="100%">
    @endif
    {!! Form::file('Place_IMG', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('places.index') !!}" class="btn btn-default">Cancel</a>
</div>
