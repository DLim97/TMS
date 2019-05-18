<!-- Staff Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Staff Name:') !!}
    <p>{!! $staff->name !!}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{!! $staff->gender !!}</p>
</div>

<!-- Region Name Field -->
<div class="form-group">
    {!! Form::label('ic', 'IC:') !!}
    <p>{!! $staff->ic !!}</p>
</div>

<!-- Region Name Field -->
<div class="form-group">
    {!! Form::label('job_title', 'Job Title:') !!}
    <p>{!! $staff->job_title !!}</p>
</div>

<!-- Region Name Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $staff->address !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $staff->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $staff->updated_at !!}</p>
</div>

