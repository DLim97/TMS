<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('User_ID', 'User Id:') !!}
    {!! Form::text('User_ID', null, ['class' => 'form-control']) !!}
</div>

<!-- Travel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Travel_ID', 'Travel Id:') !!}
    {!! Form::text('Travel_ID', null, ['class' => 'form-control']) !!}
</div>

<!-- Roomtype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('RoomType_ID', 'Roomtype Id:') !!}
    {!! Form::text('RoomType_ID', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Start_date', 'Start Date:') !!}
    {!! Form::date('Start_date', null, ['class' => 'form-control','id'=>'Start_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#Start_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('End_date', 'End Date:') !!}
    {!! Form::date('End_date', null, ['class' => 'form-control','id'=>'End_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#End_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Price', 'Price:') !!}
    {!! Form::text('Price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancel</a>
</div>
