
@extends('admin.template.main')
@section('title','Crear Usuario')

@section('content')
@include('admin.template.partials.errors')



    <div class="form-group">
        {!!Form::label('name','Nombre')!!}
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'nombre','required']) !!}
    </div>
    <div class="form-group">
        {!!Form::label('email','Email')!!}
        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Email','required']) !!}
    </div>
    <div class="form-group">
        {!!Form::label('password','Contraseña')!!}
        {!! Form::password('password',['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!!Form::label('type','Tipo')!!}
        {!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],null,['class'=>'form-control','placeholder'=>'---Seleccionar una Opcion']) !!}
    </div>
    <div class="form-group">
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}

    </div>


    {!! Form::close() !!}


    @endsection
