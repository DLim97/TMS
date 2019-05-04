<!-- Facility Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Facility_Name', 'Facility Name:') !!}
    {!! Form::text('Facility_Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Facility Img Field -->
<div class="form-group col-sm-6">
	{!! Form::label('Facility_IMG', 'Facility Img:') !!}
	{!! Form::file('Facility_IMG', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('facilities.index') !!}" class="btn btn-default">Cancel</a>
</div>
