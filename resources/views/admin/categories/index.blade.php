@extends('admin.template.main')
@section('title','lista Usuarios')
@section('content')
    <a href="{{route('categories.create')}}" class="btn btn-info">Registrar nueva categoria</a>
    <table class="table table-striped w-75 mt-4">
        <thead>
        <th>ID</th>
        <th>Nombre</th>
        </thead>
        <tbody>
        @foreach($categoria as $cat)
            <tr>
                <td>
                    {{$cat->id}}
                </td>
                <td>
                    {{$cat->name}}
                </td>

                <td>

                    <a href="{{route('categories.edit',$cat->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span> </a>
                    <a href="{{route('categories.destroy',$cat->id)}}" onclick="return confirm('seguro que lo quieres borrar')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {!! $categoria->render() !!}
@endsection