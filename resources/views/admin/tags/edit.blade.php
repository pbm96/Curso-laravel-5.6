@extends('admin/template.main')
@section('title','editar Usuario')

@section('content')


    {!! Form::open(array('route' => ['tags.update',$tags->id], 'method' => 'put')) !!}﻿
    <div class="form-group">
        {!!Form::label('name','Nombre')!!}
        {!! Form::text('name',$tags->name,['class'=>'form-control','placeholder'=>'nombre','required']) !!}
    </div>

    <div class="form-group">
        {!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}

    </div>


    {!! Form::close() !!}


@endsection