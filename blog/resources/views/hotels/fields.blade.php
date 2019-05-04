<!-- Hotel Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Hotel_Name', 'Hotel Name:') !!}
    {!! Form::text('Hotel_Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Hotel Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Hotel_IMG', 'Hotel Img:') !!}
    {!! Form::file('Hotel_IMG', ['class' => 'form-control']) !!}
</div>

<!-- Place Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Place_ID', 'Place Id:') !!}
    @php
    $places = \App\Models\Place::select('id','Place_Name')->get();
    foreach($places as $place)
        $array[$place->id] = $place->Place_Name; 
    @endphp
    {!! Form::select('Place_ID', $array, null, ['class' => 'form-control']) !!}
</div>

<!-- Facility Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Facility', 'Facility', ['class' => 'checkbox']) !!}
    @php
    $facilities = \App\Models\Facility::select('id','Facility_Name')->get();
    @endphp
    @foreach($facilities as $facility)
    <div class="checkbox">
        @if(isset($hotel))
        <label>
            <input name="Facility_ID[]" type="checkbox" value="{{  $facility->id }}"
            {{ (in_array($facility->id, $hotel->Facility_ID)) ? 'checked' : '' }}>{{ $facility->Facility_Name }}
        </label>
        @else
        <label>
            <input name="Facility_ID[]" type="checkbox" value="{{  $facility->id }}">{{ $facility->Facility_Name }}
        </label>
        @endif
    </div>
    @endforeach
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('hotels.index') !!}" class="btn btn-default">Cancel</a>
</div>
