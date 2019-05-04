<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Order_ID', 'Order Id:') !!}
    {!! Form::text('Order_ID', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Description', 'Description:') !!}
    {!! Form::textarea('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('itineraries.index') !!}" class="btn btn-default">Cancel</a>
</div>
