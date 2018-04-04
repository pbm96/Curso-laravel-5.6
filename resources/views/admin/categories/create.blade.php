
@extends('admin/template.main')
        @section('title','categoria')
@section('content')
    @include('admin.template.partials.errors')
    {!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
    <div class="form-group">
        {!!Form::label('name','Nombre')!!}
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'nombre categoria','required']) !!}
    </div>

    <div class="form-group">
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}

    </div>

    {!! Form::close() !!}




    @endsection
