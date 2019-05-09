@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Staff
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($staff, ['route' => ['staffPage.update', $staff->id], 'method' => 'patch']) !!}

                        @include('staffs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection