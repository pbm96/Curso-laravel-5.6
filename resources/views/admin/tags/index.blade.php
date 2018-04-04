@extends('admin.template.main')
@section('title','lista Usuarios')
@section('content')
    <!-- buscador-->
    {!!  Form::open(['route'=>'tags.index','method'=>'GET','class'=>'navbar-form ']) !!}
    <div class="input-group">
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'buscar un tag','aria-decribedly'=>'search']) !!}
        <span class="input-group-addon " id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
    </div>

    {!! Form::close() !!}
    <!-- fin-->
    <hr>
    <a href="{{route('tags.create')}}" class="btn btn-info">Registrar nuevo tag</a>
    <table class="table table-striped w-75 mt-4">
        <thead>
        <th>ID</th>
        <th>Nombre</th>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>
                    {{$tag->id}}
                </td>
                <td>
                    {{$tag->name}}
                </td>

                <td>

                    <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span> </a>
                    <a href="{{route('tags.destroy',$tag->id)}}" onclick="return confirm('seguro que lo quieres borrar')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {!! $tags->render() !!}
@endsection