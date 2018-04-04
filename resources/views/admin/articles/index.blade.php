@extends('admin.template.main')
@section('title','lista Usuarios')
@section('content')
    <!-- buscador-->
    {!!  Form::open(['route'=>'articles.index','method'=>'GET','class'=>'navbar-form ']) !!}
    <div class="input-group">
        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'buscar un articulo','aria-decribedly'=>'search']) !!}
        <span class="input-group-addon " id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
    </div>

    {!! Form::close() !!}
    <!-- fin-->
    <a href="{{route('articles.create')}}" class="btn btn-info">Registrar nueva categoria</a>
    <table class="table table-striped w-75 mt-4">
        <thead>
        <th>ID</th>
        <th>Titulo</th>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>
                    {{$article->id}}
                </td>
                <td>
                    {{$article->title}}
                </td>

                <td>

                    <a href="{{route('articles.edit',$article->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span> </a>
                    <a href="{{route('articles.destroy',$article->id)}}" onclick="return confirm('seguro que lo quieres borrar')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {!! $articles->render() !!}
@endsection