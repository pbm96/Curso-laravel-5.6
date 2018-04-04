
@extends('admin/template.main')
@section('title','editar Usuario')

@section('content')


    {!! Form::open(array('route' => ['users.update',$user->id], 'method' => 'put')) !!}﻿
    <div class="form-group">
        {!!Form::label('name','Nombre')!!}
        {!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'nombre','required']) !!}
    </div>
    <div class="form-group">
        {!!Form::label('email','Email')!!}
        {!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'Email','required']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('type','Tipo')!!}
        {!! Form::select('type',[''=>'---Seleccionar---','member'=>'Miembro','admin'=>'Administrador'],$user->type,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}

    </div>


    {!! Form::close() !!}


@endsection
