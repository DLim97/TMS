<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $facility->id !!}</p>
</div>

<!-- Facility Name Field -->
<div class="form-group">
    {!! Form::label('Facility_Name', 'Facility Name:') !!}
    <p>{!! $facility->Facility_Name !!}</p>
</div>

<!-- Facility Img Field -->
<div class="form-group">
    {!! Form::label('Facility_IMG', 'Facility Img:') !!}
    <p>{!! $facility->Facility_IMG !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $facility->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $facility->updated_at !!}</p>
</div>

