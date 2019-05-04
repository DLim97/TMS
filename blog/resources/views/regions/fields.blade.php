<!-- Region Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Region_Name', 'Region Name:') !!}
    {!! Form::text('Region_Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('regions.index') !!}" class="btn btn-default">Cancel</a>
</div>
