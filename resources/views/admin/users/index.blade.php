@extends('admin.template.main')
@section('title','lista Usuarios')
@section('content')
    <a href="{{route('users.create')}}" class="btn btn-info">Registrar nuevo usuario</a>
    <table class="table table-striped w-75 mt-4">
<thead>
    <th>ID</th>
    <th>Nombre</th>
    <th>Tipo</th>
    <th>Accion</th>
</thead>
        <tbody>
      @foreach($users as $user)
          <tr>
              <td>
                  {{$user->id}}
              </td>
              <td>
                  {{$user->name}}
              </td>
              <td>
                  {{$user->email}}
              </td>
              <td>
                  @if($user->type=="admin")
                      <span class=" label btn-danger"> {{$user->type}}</span>
                  @elseif($user->type=="member")
                      <span class="label btn-primary"> {{$user->type}}</span>
                  @endif

              </td>
              <td>

                 <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span> </a>
                  <a href="{{route('users.destroy',$user->id)}}" onclick="return confirm('seguro que lo quieres borrar')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> </a>
              </td>
          </tr>
          @endforeach

        </tbody>
    </table>
   {!! $users->render() !!}
    @endsection