<!-- Staff Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Staff Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Staff Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Staff Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Staff Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::select('gender', [ 'Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control']) !!}
</div>

<!-- Staff Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ic', 'IC No:') !!}
    {!! Form::text('ic', null, ['class' => 'form-control']) !!}
</div>

<!-- Staff Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marital', 'Marital Status:') !!}
    {!! Form::select('marital', [ 'Single' => 'Single', 'Married' => 'Married'], null, ['class' => 'form-control']) !!}
</div>

<!-- Staff Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('job_title', 'Job Title:') !!}
    {!! Form::select('job_title', [ 'Admin' => 'Admin', 'Staff' => 'Staff'], null, ['class' => 'form-control']) !!}
</div>

<!-- Staff Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Staff Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('DOB', 'DOB:') !!}
    {{ Form::date('DOB', null, ['class' => 'form-control']) }}  
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('staffPage.index') !!}" class="btn btn-default">Cancel</a>
</div>
