@extends('admin.template.main')
@section('title','Crear Usuario')

@section('content')
    @include('admin.template.partials.errors')
    {!! Form::open(array('route' => ['articles.update',$article->id], 'method' => 'put')) !!}﻿

    <div class="form-group">
        {!! Form::label('title','Titulo') !!}
        {!! Form::Text('title',$article->title,['class'=>'form-control','required','placeholder'=>'titulo Articulo']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id','Categoria') !!}
        {!! Form::select('category_id',$categories,$article->category->id,['class'=>'form-control h-25 selected-categoria','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content','Contenido') !!}
        {!! Form::textarea('content',$article->content,['class'=>'form-control a-content ','required','placeholder'=>'contenido Articulo']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tags','Tags') !!}
        {!! Form::select('tags[]',$tags,$my_tags,['class'=>'form-control h-25 select-tag','required','multiple']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image','Imagen') !!}
        {!! Form::File('image',['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!!Form::submit('Agregar articulo',['class'=>'btn btn-primary'])!!}

    </div>
    {!! Form::close() !!}
@endsection
@section('js')


    <script>
        $('.select-tag').chosen({
            placeholder_text_multiple:'seleccionar maximo 3 tags',
            max_selected_options:3,
            search_contains:true
        });
        $('.selected-categoria').chosen({

        });

        $('.a-content').trumbowyg(

        )


    </script>
@endsection